import pymysql
import sqlalchemy
from flask import jsonify

from core.model.lesson import lesson_base
from core.db.dbo import engine, session, Lesson
from core.exeption.lessonExeption import ExeptionLessonFindNotFound, ExeptionLessonDouble


class Api(lesson_base.AbstractLesson):
    def __init__(self, id, organization_id, lesson=''):
        self.api_id = id
        self.api_organization_id = organization_id
        self.api_lesson = lesson
        self.data = {}


    def abstract_id(self):
        return self.api_id if self.api_id is not None else ExeptionLessonFindNotFound('id').error()

    def abstract_organization_id(self):
        return self.api_organization_id if self.api_organization_id is not None else ExeptionLessonFindNotFound('organization_id').error()


    def abstract_lesson(self):
        return self.api_lesson if self.api_lesson is not None else ExeptionLessonFindNotFound('lesson').error()


    def drop(self):
        drop_lesson = engine.execute(
            f"DELETE FROM lessons WHERE organization_id={self.abstract_organization_id()} AND id={self.abstract_id()};"
        )
        if drop_lesson:
            return jsonify({"response": True}, 200)
