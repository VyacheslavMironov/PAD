import pymysql
import sqlalchemy
from flask import jsonify

from core.model.group import group_base
from core.db.dbo import session, UserGroups
from core.exeption.groupExeption import (
    ExeptionGroupFindNotFound,
    ExeptionGroupNone
)


class Api(group_base.AbstractGroup):
    def __init__(self, user_id, organization_id='', group_id='', name=''):
        self.api_organization_id = organization_id
        self.api_group_id = group_id
        self.api_user_id = user_id
        self.api_name = name
        self.data = {}

    def abstract_organization_id(self):
        return self.api_organization_id if self.api_organization_id else ExeptionGroupFindNotFound('organization_id').error()

    def abstract_group_id(self):
        return self.api_group_id if self.api_group_id is not None else ExeptionGroupFindNotFound('group_id').error()

    def abstract_user_id(self):
        return self.api_user_id if self.api_user_id is not None else ExeptionGroupFindNotFound('user_id').error()

    def abstract_name(self):
        return self.api_name if self.api_name is not None else ExeptionGroupFindNotFound('name').error()

    def remove(self):
        # Удаление данных организации
        try:
            session.query(UserGroups).filter(UserGroups.user_id == self.abstract_user_id()).delete()
            session.commit()

            return jsonify({"response": True}, 200)
        except (sqlalchemy.exc.IntegrityError, pymysql.err.IntegrityError):
            return jsonify({"response": False, "message": "Ошибка сохранения в группу, обратитесь в поддержку."}, 500)

