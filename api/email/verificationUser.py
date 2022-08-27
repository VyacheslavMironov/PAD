import asyncio
from ssl import create_default_context
from smtplib import SMTP_SSL, SMTPRecipientsRefused
from xml.dom import minidom
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

import sqlalchemy
import pymysql
from flask import jsonify

from core.model.email import send_verification
from core.db.dbo import engine, User
from core.exeption.emailExeption import (
    ExeptionEmailSend,
    ExeptionEmailNotNone,
    ExeptionEmailTemplateNonFound
)


class Api(send_verification.AbstractSendVerification):
    def __init__(self, email, password, first_name=""):
        self.email = email
        self.subject = "PAD активация аккаунта!"
        self.first_name = "" if len(first_name) == 0 else first_name
        self.password = password
        self.html = f"""
        <html>
            <body>
                <p>
                    Здравствуйте {self.first_name}, спасибо что зарегистрировались в нашем электронном журнале.<br />
                    Ссылка для активации аккаунта:
                </p>
                <a href='#'>http://localhost:5000/</a>
                <br />
                <hr />
                <h4>Ваши данные для входа:</h4>
                <p>
                    <b>Логин:</b> {self.email}
                </p>
                <p>
                    <b>Пароль:</b> {self.password}
                </p>
            </body>
        </html>
        """

    def abstratct_email(self):
        return self.email if self.email is not None else ExeptionEmailSend().error()

    def send(self):
        email = self.abstratct_email()
        context_ssl = create_default_context()

        # ======================================================================
        # ================== Данные подключения к Базе Данных ==================
        # ======================================================================
        context = minidom.parse("api/settings.xml")
        SENDER = context.getElementsByTagName("email").item(0).attributes["from"].value
        PASSWORD = context.getElementsByTagName("email").item(0).attributes["password"].value
        PORT = int(context.getElementsByTagName("email").item(0).attributes["port"].value)
        HOST = context.getElementsByTagName("email").item(0).attributes["host"].value

        # ======================================================================
        # ====================== Формирование сообщения ========================
        # ======================================================================
        message = MIMEMultipart("alternative")
        message["Subject"] = self.subject
        message["From"] = SENDER
        message["To"] = email

        message.attach(MIMEText(self.html, "html"))

        try:
            with SMTP_SSL(HOST, PORT, context=context_ssl) as server:
                server.login(SENDER, PASSWORD)
                server.sendmail(
                    SENDER, email, message.as_string()
                )
            return jsonify({"response": True}, 200)
        except SMTPRecipientsRefused:
            return ExeptionEmailSend().error()
