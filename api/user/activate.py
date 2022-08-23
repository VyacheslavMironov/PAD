import pymysql
import sqlalchemy
from flask import jsonify

from core.model.user import activate
from sqlalchemy import update
from core.db.dbo import engine, User
from core.exeption.userExeption import ExeptionUserFindNotFound


class Api(activate.AbstractUserActivate):
    def __init__(self, user_id):
        self.api_user_id = user_id


    def abstract_user_id(self):
        return self.api_user_id if self.api_user_id is not None else ExeptionUserFindNotFound('user_id').error()

    def activate(self):
        user_activate = engine.execute(
            "UPDATE user SET is_active=true WHERE user_id=" + self.api_user_id + ";"
        )

        if user_activate:
            return jsonify({"response": True, "message": "Аккаунт активирован!"}, 200)
