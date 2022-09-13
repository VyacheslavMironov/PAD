import asyncio
from xml.dom import minidom

import pymysql
import sqlalchemy
from flask import jsonify, make_response

from api.email import verificationUser
from core.model.user import parentUser
from core.db.dbo import session, ParentUser
from core.exeption.userExeption import (
    ExeptionUserRegistration,
    ExeptionUserFindNotFound
)


class Api(parentUser.AbstractParent):
    def __init__(self, student_id, user_id):
        self.api_student_id = student_id
        self.api_user_id = user_id
        self.data = {}

    def abstract_user_id(self):
        return self.api_user_id if self.api_user_id else ExeptionUserFindNotFound('user_id').error()

    def abstract_student_id(self):
        return self.api_student_id if self.api_student_id else ExeptionUserFindNotFound('student_id').error()


    def add(self):
        try:
            session.add(
                ParentUser(
                    user_id = self.abstract_user_id(),
                    student_id = self.abstract_student_id()
                )
            )
            session.commit()
            return jsonify({"response": True, "message": "Данные внесены успешно!"}, 200)
        except (sqlalchemy.exc.IntegrityError, pymysql.err.IntegrityError):
            ExeptionUserRegistration().error()
            return jsonify({"response": "Ошибка сервера!"}, 500)
