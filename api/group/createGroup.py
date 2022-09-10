import asyncio
from xml.dom import minidom

import pymysql
import sqlalchemy
from flask import jsonify

from api.email import verificationUser
from core.model.group import group_base
from core.db.dbo import session, Group
from core.exeption.groupExeption import (
    ExeptionGroupFindNotFound,
    ExeptionGroupRegistration,
    ExeptionGroupDouble
)


#======================================================================
# =========================== Данные хоста ============================
#======================================================================
context = minidom.parse("api/settings.xml")
HOST = context.getElementsByTagName("host").item(0).attributes["host"].value
PORT = context.getElementsByTagName("host").item(0).attributes["port"].value

class Api(group_base.AbstractGroup):
    def __init__(self, name, organization_id=-1, user_id=-1, group_id=-1):
        self.api_name = name
        self.api_organization_id = organization_id
        self.api_group_id = group_id
        self.api_user_id = user_id
        self.data = {}

    def abstract_organization_id(self):
        return self.api_organization_id if self.api_organization_id else ExeptionGroupFindNotFound('organization_id').error()

    def abstract_user_id(self):
        return self.api_user_id if self.api_user_id is not None else ExeptionGroupFindNotFound('user_id').error()

    def abstract_group_id(self):
        return self.api_group_id if self.api_group_id is not None else ExeptionGroupFindNotFound('group_id').error()


    def abstract_name(self):
        return self.api_name if self.api_name is not None else ExeptionGroupFindNotFound('name').error()


    def save(self):
        try:
            # Сохранение данных организации
            session.add(
                Group(
                    organization_id=self.abstract_organization_id(),
                    user_id=self.abstract_user_id(),
                    name=self.abstract_name()
                )
            )
            session.commit()

            return jsonify({"response": True}, 200)

        except (sqlalchemy.exc.IntegrityError, pymysql.err.IntegrityError):
            return jsonify({"response": False, "message": "Такая группа уже существует"}, 500)
        except Exception:
            ExeptionGroupRegistration().error()
            return jsonify({"response": False, "message": "Ошибка  сохранения"}, 500)
