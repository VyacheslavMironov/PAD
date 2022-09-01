import pymysql
import sqlalchemy
from flask import jsonify

from core.model.lesson import lesson_base
from sqlalchemy import update
from core.db.dbo import session, Lesson
from core.exeption.lessonExeption import ExeptionLessonFindNotFound, ExeptionLessonDouble


class Api(lesson_base.AbstractLesson):
    def __init__(self, organization_id, lesson=''):
        self.api_organization_id = organization_id
        self.api_lesson = lesson
        self.data = {}


    def abstract_organization_id(self):
        return self.api_organization_id if self.api_organization_id is not None else ExeptionLessonFindNotFound('organization_id').error()


    def abstract_lesson(self):
        return self.api_lesson if self.api_lesson is not None else ExeptionLessonFindNotFound('lesson').error()


    def show(self):
        self.data['list'] = []
        # Выборка данных
        for i in session.query(Lesson).where(Lesson.organization_id == self.abstract_organization_id()):
            self.data['list'].append({"id": i.id, "lesson": i.lesson})

        return jsonify({"response": True, "message": self.data}, 200)
