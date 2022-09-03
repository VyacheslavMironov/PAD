import pymysql
import sqlalchemy
from flask import jsonify

from core.model.group import group_base
from core.db.dbo import session, User, UserGroups
from core.exeption.groupExeption import (
    ExeptionGroupFindNotFound,
    ExeptionGroupDouble,
    ExeptionGroupRegistration,
    ExeptionGroupNone
)


class Api(group_base.AbstractGroup):
    def __init__(self, organization_id, group_id, user_id, name=''):
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
    def save(self):
        # Сохранение данных организации
        try:
            session.add(
                UserGroups(
                    groups_id=self.abstract_group_id(),
                    organization_id=self.abstract_organization_id(),
                    user_id=self.abstract_user_id()
                )
            )
            session.commit()
            self.data['group_id'] = self.abstract_group_id()
            self.data['organization_id'] = self.abstract_organization_id()
            self.data['user_id'] = self.abstract_user_id()

            return jsonify({"response": True, "message": self.data}, 200)
        except (sqlalchemy.exc.IntegrityError, pymysql.err.IntegrityError):
            return jsonify({"response": False, "message": "Ошибка сохранения в группу, обратитесь в поддержку."}, 500)
        except TypeError:
            ExeptionGroupDouble().error()
            return jsonify({"response": False, "message": "Пользователь уже состоит в группе."}, 500)

