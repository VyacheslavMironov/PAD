import asyncio
from xml.dom import minidom

import pymysql
import sqlalchemy
from flask import jsonify, make_response

from api.email import verificationUser
from core.model.user import registration
from core.db.dbo import session, User, UserGroups, UserLesson
from core.exeption.userExeption import (
    ExeptionUserRegistration,
    ExeptionUserDouble,
    ExeptionUserFindNotFound
)


#======================================================================
# =========================== Данные хоста ============================
#======================================================================
context = minidom.parse("api/settings.xml")
HOST = context.getElementsByTagName("host").item(0).attributes["host"].value
PORT = context.getElementsByTagName("host").item(0).attributes["port"].value

class Api(registration.AbstractRegistration):
    def __init__(self, organization_name, first_name, last_name, email, role, password, group=None, lesson_up=None):
        self.api_organization_name = organization_name
        self.api_first_name = first_name
        self.api_last_name = last_name
        self.api_email = email
        self.api_role = role
        self.api_group = group
        self.api_lesson_up = lesson_up
        self.api_password = password
        self.data = {}

    def abstract_organization_name(self):
        return self.api_organization_name if self.api_organization_name else ExeptionUserFindNotFound('organization_name').error()

    def abstract_first_name(self):
        return self.api_first_name if self.api_first_name is not None else ExeptionUserFindNotFound('first_name').error()

    def abstract_last_name(self):
        return self.api_last_name if self.api_last_name is not None else ExeptionUserFindNotFound('last_name').error()

    def abstract_email(self):
        return self.api_email if self.api_email is not None else ExeptionUserFindNotFound('email').error()

    def abstract_role(self):
        return self.api_role if self.api_role is not None else ExeptionUserFindNotFound('role').error()

    def abstract_password(self):
        return self.api_password if self.api_password is not None else ExeptionUserFindNotFound('password').error()

    def save(self):
        """
        Сохранение юзера
        :return:
        """
        try:
            # Сохранение данных организации
            session.add(
                User(
                    firstName=self.abstract_first_name(),
                    lastName=self.abstract_last_name(),
                    email=self.abstract_email(),
                    role=self.abstract_role(),
                    password=self.abstract_password(),
                    organization_id=self.abstract_organization_name()
                )
            )
            session.commit()

            for i in session.query(User).filter(User.email == self.abstract_email()):
                if i.email == self.abstract_email():
                    self.data["id"] = i.user_id
                    self.data["first_name"] = i.firstName
                    self.data["last_name"] = i.lastName
                    self.data["email"] = i.email
                    self.data["password"] = i.password
                    self.data["role"] = i.role
                    self.data["is_active"] = i.is_active
                    self.data["is_admin"] = i.is_admin
                    self.data["created_at"] = i.created_at
                    self.data["organization_id"] = i.organization_id

            if "id" in self.data and "email" in self.data and "role" in self.data and "organization_id" in self.data:
                if self.api_group != None:
                    try:
                        # Сохранение данных организации
                        session.add(
                            UserGroups(
                                groups_id=self.api_group,
                                organization_id=self.data["organization_id"],
                                user_id=self.data["id"]
                            )
                        )
                        session.commit()
                        self.data['group'] = self.api_group
                    except (sqlalchemy.exc.IntegrityError, pymysql.err.IntegrityError):
                        jsonify({"response": "Ошибка сохранения в группу, обратитесь в поддержку."}, 500)

                if self.api_lesson_up != None:
                    for i in self.api_lesson_up.split(','):
                        if i != '':
                            session.add(
                                UserLesson(
                                    lesson_id=int(i),
                                    user_id=int(self.data["id"])
                                )
                            )
                            session.commit()
            else:
                return jsonify({"response": "Ошибка сервера!"}, 500)

        except (sqlalchemy.exc.IntegrityError, pymysql.err.IntegrityError):
            ExeptionUserDouble().error()
            return make_response(
                jsonify({"response": "Пользователь уже зарегистрирован в системе.."}, 500)
            )

        if "id" in self.data:
            try:
                verificationUser.Api(
                    email=self.data["email"],
                    first_name=self.data["first_name"],
                    password=self.data["password"]
                ).send()
                return make_response(
                    jsonify({"response": True, "message": self.data}, 200)
                )
            except ImportError:
                pass
        else:
            return ExeptionUserRegistration().error()
