import pymysql
import sqlalchemy
from flask import jsonify

from core.model.timetable import dropTimetable
from core.db.dbo import engine, session, Timetable
from core.exeption.timetableExeption import (
    ExeptionTimetableFindNotFound,
    ExeptionTimetableNone
)


class Api(dropTimetable.AbstractDropTimetable):
    def __init__(self, id):
        self.api_id = id
        self.data = {}

    def abstract_id(self):
        return self.api_id if self.api_id is not None else ExeptionTimetableFindNotFound('id').error()

    def drop(self):
        try:
            # Конечно лучше рассмотреть подобный вариант
            # session.query(Timetable).filter(Timetable.id == self.abstract_id()).delete()
            engine.execute(f"DELETE FROM timetables WHERE id={self.abstract_id()};")
            return jsonify({"response": True}, 200)

        except (sqlalchemy.exc.IntegrityError, pymysql.err.IntegrityError):
            ExeptionTimetableNone().error()
            return jsonify({"response": False, "message": "Такая группа уже существует"}, 500)
