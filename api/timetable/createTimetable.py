import pymysql
import sqlalchemy
from flask import jsonify

from core.model.timetable import createTimetable
from core.db.dbo import session, Timetable
from core.exeption.timetableExeption import (
    ExeptionTimetableFindNotFound,
    ExeptionTimetableRegistration
)


class Api(createTimetable.AbstractCreateTimetable):
    def __init__(self, organization_id, groups_id, lesson_id, day, time_start, time_end):
        self.api_organization_id = organization_id
        self.api_groups_id = groups_id
        self.api_lesson_id = lesson_id
        self.api_day = day
        self.api_time_start = time_start
        self.api_time_end = time_end
        self.data = {}

    def abstract_organization_id(self):
        return self.api_organization_id if self.api_organization_id is not None else ExeptionTimetableFindNotFound('organization_id').error()

    def abstract_groups_id(self):
        return self.api_groups_id if self.api_groups_id is not None else ExeptionTimetableFindNotFound('groups_id').error()

    def abstract_lesson_id(self):
        return self.api_lesson_id if self.api_lesson_id is not None else ExeptionTimetableFindNotFound('lesson_id').error()

    def abstract_time_start(self):
        return self.api_time_start if self.api_time_start is not None else ExeptionTimetableFindNotFound('time_start').error()

    def abstract_day(self):
        return self.api_day if self.api_day is not None else ExeptionTimetableFindNotFound('day').error()

    def abstract_time_end(self):
        return self.api_time_end if self.api_time_end is not None else ExeptionTimetableFindNotFound('time_end').error()

    def save(self):
        try:
            # Сохранение данных организации
            session.add(
                Timetable(
                    organization_id=self.abstract_organization_id(),
                    groups_id=self.abstract_groups_id(),
                    lesson_id=self.abstract_lesson_id(),
                    day=self.abstract_day(),
                    time_start=self.abstract_time_start(),
                    time_end=self.abstract_time_end(),
                )
            )
            session.commit()

            return jsonify({"response": True}, 200)

        except (sqlalchemy.exc.IntegrityError, pymysql.err.IntegrityError):
            return jsonify({"response": False, "message": "Такая группа уже существует"}, 500)

