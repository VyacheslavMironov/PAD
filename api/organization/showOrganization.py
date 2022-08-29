import sqlalchemy
import pymysql
from flask import jsonify

from core.model.organization import show
from core.db.dbo import session, Organization
from core.exeption.organizationExeption import (
    ExeptionOrganizationNone,
    ExeptionOrganizationFindNotFound
)


class Api(show.AbstractShowOrganization):
    def __init__(self, organization_id):
        self.api_organization_id = organization_id
        self.data = {}

    def abstratct_organization_id(self):
        return self.api_organization_id if self.api_organization_id is not None else ExeptionOrganizationFindNotFound(find="api_organization_id").error()

    def show(self):
        for i in session.query(Organization).all():
            if i.id == int(self.abstratct_organization_id()):
                self.data["id"] = i.id
                self.data["name"] = i.name

        if "id" in self.data and "name" in self.data:
            pass
        else:
            ExeptionOrganizationNone().error()
            return jsonify({"response": "Ошибка сервера!"}, 500)
        return jsonify({"response": True, "message": self.data}, 200)
