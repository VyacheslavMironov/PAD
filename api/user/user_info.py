import pymysql
import sqlalchemy
from flask import jsonify

from core.model.user import show
from core.db.dbo import session, engine, User, AccessToken, UserGroups
from core.exeption.userExeption import ExeptionUserFindNotFound


class Api(show.AbstractUserInfo):
    def __init__(self, access_token='', role='', organization_id=0, group_id=None):
        self.api_access_token = access_token
        self.api_role = role
        self.api_group_id = group_id
        self.api_organization_id = organization_id
        self.user_token = None
        self.data = {}

    def abstract_access_token(self):
        return self.api_access_token if self.api_access_token is not None else ExeptionUserFindNotFound('access_token').error()

    def abstract_role(self):
        return self.api_role if self.api_role is not None else ExeptionUserFindNotFound('role').error()

    def abstract_organization_id(self):
        return self.api_organization_id if self.api_organization_id is not None else ExeptionUserFindNotFound('organization_id').error()

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

    def all(self):
        users = session.query(User).where(
                User.organization_id == self.abstract_organization_id(),
                User.role == self.abstract_role()
        )
        # Формирование списка
        self.data["users"] = []
        for i in users:
            if self.api_group_id:
                group_user = engine.execute(f"SELECT user_id FROM user_groups WHERE groups_id={self.api_group_id}").fetchall()
                for j in group_user:
                    if j[0] == i.user_id:
                        self.data["users"].append(
                            {
                                "user_id": i.user_id,
                                "first_name": i.firstName,
                                "last_name": i.lastName,
                                "email": i.email,
                                "role": i.role,
                            }
                        )
            else:
                self.data["users"].append(
                    {
                        "user_id": i.user_id,
                        "first_name": i.firstName,
                        "last_name": i.lastName,
                        "email": i.email,
                        "role": i.role,
                    }
                )

        return jsonify({"response": True, "message": self.data}, 200)
