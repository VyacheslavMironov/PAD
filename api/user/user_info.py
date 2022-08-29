import pymysql
import sqlalchemy
from flask import jsonify

from core.model.user import show
from core.db.dbo import session, engine, User, AccessToken
from core.exeption.userExeption import ExeptionUserFindNotFound


class Api(show.AbstractUserInfo):
    def __init__(self, access_token):
        self.api_access_token = access_token
        self.user_token = None
        self.data = {}


    def abstract_access_token(self):
        return self.api_access_token if self.api_access_token is not None else ExeptionUserFindNotFound('api_access_token').error()

    def show(self):
        for i in session.query(AccessToken):
            if str(i.token).strip() == str(self.abstract_access_token()).strip():
                self.user_token = i.user_id

        user = session.query(User).filter(User.user_id == self.user_token)

        self.data["user_id"] = user[0].user_id
        self.data["organization_id"] = user[0].organization_id
        self.data["first_name"] = user[0].firstName
        self.data["last_name"] = user[0].lastName
        self.data["email"] = user[0].email
        self.data["role"] = user[0].role
        self.data["is_active"] = user[0].is_active
        self.data["is_admin"] = user[0].is_admin

        if "user_id" in self.data:
            return jsonify({"response": True, "message": self.data}, 200)
