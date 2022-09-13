from calendar import monthrange
from datetime import datetime

import pymysql
import sqlalchemy
from flask import jsonify

from core.model.user import show
from core.db.dbo import session, engine, User, AccessToken, UserGroups, ParentUser
from core.exeption.userExeption import ExeptionUserFindNotFound


class Api(show.AbstractUserInfo):
    def __init__(
            self,
            access_token='',
            role='',
            organization_id=0,
            group_id=None,
            lesson_id=None,
            year=None,
            month=None,
            mode=None
    ):
        self.api_access_token = access_token
        self.api_role = role
        self.api_group_id = group_id
        self.api_organization_id = organization_id
        self.user_token = None
        self.api_lesson_id = lesson_id
        self.api_month = month
        self.api_year = year
        self.api_mode = mode
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
            # Подтягивание ID группы
            if self.data["role"] == "Студент":
                group = session.query(UserGroups).filter(UserGroups.user_id == self.data["user_id"]).one()
                if 'groups_id' in dir(group):
                    self.data['group_id'] = group.groups_id

            # Если это родитель добавить 2 свойства Id ребёнка и Id группы
            if self.data["role"] == "Родитель":
                try:
                    user = session.query(ParentUser).filter(ParentUser.user_id == self.data["user_id"]).one()
                    user_data = session.query(User).filter(User.user_id == user.student_id).one()
                    self.data['child_id'] = user_data.user_id
                    group = session.query(UserGroups).filter(UserGroups.user_id == self.data['child_id']).one()
                    self.data["group_id"] = group.groups_id
                except:
                    pass
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
                max_day = monthrange(datetime.now().year, datetime.now().month)[1]
                group_user = engine.execute(f"SELECT user_id FROM user_groups WHERE groups_id={self.api_group_id}").fetchall()
                for j in group_user:
                    if j[0] == i.user_id:
                        if self.api_mode == 'journal':
                            if self.api_year:
                                if self.api_month:
                                    # Список для записи значений
                                    value_list = []
                                    query_date = engine.execute(f'''
                                        SELECT * FROM journal 
                                            WHERE 
                                                user_id = {i.user_id} AND 
                                                organization_id = {self.abstract_organization_id()} AND 
                                                groups_id = {self.api_group_id} AND 
                                                `month` = '{self.api_month}' AND 
                                                `year` = '{self.api_year}' AND
                                                lesson_id = {self.api_lesson_id};
                                    ''')
                                    # Привязка оценки ко дню
                                    days = [{"day": x, "value": None} for x in range(1, max_day + 1)]
                                    for count, x in enumerate(query_date.fetchall()):
                                        try:
                                            days[int(x[6]) - 1]["value"] = x[5]
                                        except IndexError:
                                            pass
                                    value_list = days
                                    # Формирование ответа
                                    self.data["users"].append(
                                        {
                                            "user_id": i.user_id,
                                            "first_name": i.firstName,
                                            "last_name": i.lastName,
                                            "email": i.email,
                                            "role": i.role,
                                            "value_list": value_list
                                        }
                                    )
                                    print(self.data)
                                else:
                                    ExeptionUserFindNotFound('month').error()
                            else:
                                ExeptionUserFindNotFound('year').error()
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
