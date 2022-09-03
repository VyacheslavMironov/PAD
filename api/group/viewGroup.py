import pymysql
import sqlalchemy
from flask import jsonify

from core.model.group import group_base
from core.db.dbo import engine, session, User, Group, UserGroups
from core.exeption.groupExeption import ExeptionGroupFindNotFound


class Api(group_base.AbstractGroup):
    def __init__(self, name='', organization_id=-1, user_id=-1, group_id=-1):
        self.api_name = name
        self.api_organization_id = organization_id
        self.api_user_id = user_id
        self.api_group_id = group_id
        self.data = {}

    def abstract_organization_id(self):
        return self.api_organization_id if self.api_organization_id else ExeptionGroupFindNotFound(
            'organization_id').error()

    def abstract_user_id(self):
        return self.api_user_id if self.api_user_id is not None else ExeptionGroupFindNotFound('user_id').error()

    def abstract_group_id(self):
        return self.api_group_id if self.api_group_id is not None else ExeptionGroupFindNotFound('group_id').error()


    def abstract_name(self):
        return self.api_name if self.api_name is not None else ExeptionGroupFindNotFound('name').error()

    def all(self):
        self.data['list'] = []
        # Выборка данных
        for i in session.query(Group).where(Group.organization_id == self.abstract_organization_id()):
            self.data['list'].append({
                "id": i.id,
                "organization_id": i.organization_id,
                "user_id": i.user_id,
                "name": i.name
            })

        return jsonify({"response": True, "message": self.data}, 200)

    def show(self):
        self.data['list_belongs'] = []
        self.data['user_list'] = []

        # Выборка присутствующих в таблице
        for y in session.query(User).filter(User.user_id == UserGroups.user_id):
            if int(y.organization_id) == int(self.abstract_organization_id()):
                belongs = {}
                belongs['user_id'] = y.user_id
                belongs['first_name'] = y.firstName
                belongs['last_name'] = y.lastName

                self.data['list_belongs'].append(belongs)

        # Надо найти способ того как этот запрос переделать под sqlalchemy
        for x in engine.execute("""
                        SELECT u.user_id, u.firstName, u.lastName FROM users u
                        LEFT JOIN user_groups gr
                            ON u.user_id = gr.user_id
                        WHERE gr.user_id IS NULL 
                            AND u.role = 'Студент'
                    """).fetchall():
            no_user = {}
            no_user['user_id'] = x[0]
            no_user['first_name'] = x[1]
            no_user['last_name'] = x[2]

            self.data['user_list'].append(no_user)


        return jsonify({"response": True, "message": self.data}, 200)