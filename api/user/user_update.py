import pymysql
import sqlalchemy
from flask import jsonify

from core.model.user import update
from core.db.dbo import session, engine, User, AccessToken
from core.exeption.userExeption import ExeptionUserFindNotFound


class Api(update.AbstractUserUpdate):
    def __init__(self, user_id, first_name, last_name, role, email):
        self.api_user_id = user_id
        self.api_first_name = first_name
        self.api_last_name = last_name
        self.api_role = role
        self.api_email = email
        self.data = {}

    def abstract_user_id(self):
        return self.api_user_id if self.api_user_id is not None else ExeptionUserFindNotFound('user_id').error()

    def abstract_first_name(self):
        return self.api_first_name if self.api_first_name is not None else ExeptionUserFindNotFound('first_name').error()

    def abstract_last_name(self):
        return self.api_last_name if self.api_last_name is not None else ExeptionUserFindNotFound('last_name').error()

    def abstract_role(self):
        return self.api_role if self.api_role is not None else ExeptionUserFindNotFound('role').error()

    def abstract_email(self):
        return self.api_email if self.api_email is not None else ExeptionUserFindNotFound('email').error()

    def update(self):


        query = "UPDATE users SET "
        query += f"firstName='{self.abstract_first_name()}', " if self.abstract_first_name() else ""
        query += f"lastName='{self.abstract_last_name()}', " if self.abstract_last_name() else ""
        query += f"role='{self.abstract_role()}', " if self.abstract_role() else ""
        query += f"email='{self.abstract_email()}', " if self.abstract_email() else ""
        query += f"WHERE user_id={self.abstract_user_id()};"
        query = query.replace(', WHERE', ' WHERE')
        update = engine.execute(query)

        if update:
            return jsonify({"response": True, "message": self.data}, 200)
