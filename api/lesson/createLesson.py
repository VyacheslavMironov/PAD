import pymysql
import sqlalchemy
from flask import jsonify

from core.model.lesson import lesson_base
from sqlalchemy import update
from core.db.dbo import session, Lesson
from core.exeption.lessonExeption import ExeptionLessonFindNotFound, ExeptionLessonDouble


class Api(lesson_base.AbstractLesson):
    def __init__(self, organization_id, lesson):
        self.api_organization_id = organization_id
        self.api_lesson = lesson
        self.data = {}


    def abstract_organization_id(self):
        return self.api_organization_id if self.api_organization_id is not None else ExeptionLessonFindNotFound('organization_id').error()


    def abstract_lesson(self):
        return self.api_lesson if self.api_lesson is not None else ExeptionLessonFindNotFound('lesson').error()


    def add(self):
        try:
            # Сохранение данных организации
            session.add(
                Lesson(
                    organization_id=self.abstract_organization_id(),
                    lesson=self.abstract_lesson()
                )
            )
            session.commit()

        except (sqlalchemy.exc.IntegrityError, pymysql.err.IntegrityError):
            ExeptionLessonDouble().error()
            return jsonify({"response": "Пользователь уже зарегистрирован в системе.."}, 500)

        return jsonify({"response": True, "message": self.api_lesson}, 200)
