import asyncio
from random import choice
from string import ascii_lowercase
from ssl import create_default_context
from smtplib import SMTP_SSL, SMTPRecipientsRefused
from xml.dom import minidom
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

import sqlalchemy
import pymysql
from flask import jsonify

from core.model.user import reset
from core.db.dbo import engine, User
from core.exeption.emailExeption import (
    ExeptionEmailSend,
    ExeptionEmailNotNone,
    ExeptionEmailTemplateNonFound
)


class Api(reset.AbstractConfirmationReset):
    def __init__(self, email):
        self.email = email

    def abstract_new_password(self):
        rand_string = ''.join(choice(ascii_lowercase) for i in range(12))
        new_password = engine.execute(
            f"UPDATE users SET password='{rand_string}' WHERE email='{self.email}';"
        )

        if new_password:
            return jsonify({"response": True, "message": rand_string}, 200)
