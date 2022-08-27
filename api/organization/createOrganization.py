import sqlalchemy
import pymysql
from flask import jsonify, make_response

from core.model.organization import create
from core.db.dbo import session, Organization
from core.exeption.organizationExeption import (
    ExeptionOrganizationNone,
    ExeptionOrganizationDouble,
    ExeptionOrganizationFindNotFound,
    ExeptionOrganizationRegistration
)


class Api(create.AbstractCreateOrganization):
    def __init__(self, organization_name):
        self.api_organization_name = organization_name
        self.data = {}

    def abstratct_organization_name(self):
        return self.api_organization_name if self.api_organization_name is not None else ExeptionOrganizationFindNotFound(find="organization_name").error()

    def save(self):
        try:
            # Сохранение данных организации
            session.add(
                Organization(name=self.abstratct_organization_name())
            )
            session.commit()

            for i in session.query(Organization).all():
                if i.name == self.abstratct_organization_name():
                    self.data["id"] = i.id
                    self.data["name"] = i.name

            if "id" in self.data and "name" in self.data:
                pass
            else:
                return jsonify({"response": "Ошибка сервера!"}, 500)

        except (sqlalchemy.exc.IntegrityError, pymysql.err.IntegrityError):
            return make_response(
                jsonify({"response": "Такая организация уже зарегистрированна."}, 500)
            )

        if "id" in self.data:
            return make_response(
                jsonify({"response": True, "message": self.data}, 200)
            )
        else:
            return ExeptionOrganizationRegistration().error()
