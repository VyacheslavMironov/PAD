

import pymysql
import sqlalchemy
from flask import jsonify

from core.model.journal import show
from core.db.dbo import (
    engine,
    session,
    Journal,
    Lesson,
    Timetable,
    UserGroups
)
from core.exeption.journalExeption import (
    ExeptionJournalNone,
    ExeptionJournalFindNotFound,
    ExeptionJournal
)


class Api(show.AbstractJournalShow):
    def __init__(self, organization_id, user_id, group_id, role):
        self.api_organization_id = organization_id
        self.api_user_id = user_id
        self.api_group_id = group_id
        self.api_role = role
        self.data = {}

    def abstract_organization_id(self):
        return self.api_organization_id if self.api_organization_id else ExeptionJournalFindNotFound('organization_id').error()

    def abstract_role(self):
        return self.api_role if self.api_role is not None else ExeptionJournalFindNotFound('lesson_id').error()

    def abstract_user_id(self):
        return self.api_user_id if self.api_user_id is not None else ExeptionJournalFindNotFound('user_id').error()

    def abstract_group_id(self):
        return self.api_group_id if self.api_group_id is not None else ExeptionJournalFindNotFound('group_id').error()

    def all(self):
        self.data['list'] = []
        lessons = []
        for i in session.query(Lesson).filter(Lesson.organization_id == self.abstract_organization_id()):
            journal = session.query(Journal).where(
                Journal.user_id == self.abstract_user_id()
            ).filter(Journal.lesson_id == i.id)
            for x in journal:
                self.data['list'].append({
                    "lesson_id": x.lesson_id,
                    "lesson_name": session.query(Lesson).filter(Lesson.id == x.lesson_id).one().lesson,
                    "day": x.day,
                    "month": x.month,
                    "year": x.year,
                    "value": x.value
                })
        return jsonify({"response": True, "message": self.data}, 200)