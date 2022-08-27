import asyncio
from xml.dom import minidom
from datetime import timedelta, datetime

import pymysql
import sqlalchemy
from sqlalchemy import update
from passlib.hash import bcrypt
from flask import jsonify
from flask_jwt_extended import create_access_token

from core.model.user import login
from core.db.dbo import engine, session, User, AccessToken
from core.exeption.userExeption import (
    ExeptionUserNone,
    ExeptionUserDouble,
    ExeptionUserFindNotFound
)


class Api(login.AbstractLogin):
    def __init__(self, email, password):
        self.api_email = email
        self.api_password = password

    def abstract_email(self):
        return self.api_email if self.api_email is not None else ExeptionUserFindNotFound('email').error()

    def abstract_password(self):
        return self.api_password if self.api_password is not None else ExeptionUserFindNotFound('password').error()

    def get_token(self, user_id):
        token = create_access_token(
            identity=user_id, expires_delta=timedelta(300)
        )
        try:
            # Сохранение токена в базе
            session.add(
                AccessToken(
                    user_id=user_id,
                    token=token
                )
            )
            session.commit()
        except sqlalchemy.exc.IntegrityError:
            engine.execute(
                update(AccessToken).where(
                    AccessToken.user_id == user_id
                ).values(
                    token=token,
                    created_at=datetime.now()
                )
            )
        return token
    def auth(self):
        user = session.query(User).filter(User.email == self.abstract_email()).one()

        if user.password != self.abstract_password():
            return jsonify({"response": False, "message": "Не верный логин или пароль!"}, 500)
        else:
            token = self.get_token(user.user_id)
            return jsonify({"response": True, "message": {"access_token": token}}, 200)
