import pymysql
import sqlalchemy
from flask import jsonify

from core.model.timetable import showTeacherTimetable
from core.db.dbo import engine, session, Timetable, UserLesson, Lesson, Group
from core.exeption.timetableExeption import (
    ExeptionTimetableFindNotFound
)


class Api(showTeacherTimetable.AbstractShowTeacherTimetable):
    def __init__(self, organization_id, user_id):
        self.api_organization_id = organization_id
        self.api_user_id = user_id
        self.data = {}

    def abstract_organization_id(self):
        return self.api_organization_id if self.api_organization_id is not None else ExeptionTimetableFindNotFound('organization_id').error()

    def abstract_user_id(self):
        return self.api_user_id if self.api_user_id is not None else ExeptionTimetableFindNotFound('user_id').error()

    def show(self):
        self.data['list'] = []
        # try:
        for i in session.query(UserLesson).filter(UserLesson.user_id == self.abstract_user_id()):
            for x in session.query(Timetable).filter(Timetable.lesson_id == i.lesson_id):
                lesson_name = session.query(Lesson).filter(Lesson.id == i.lesson_id).one()
                group_name = session.query(Group).filter(Group.id == x.groups_id).one()
                time_start = f"{x.time_start.hour}:{x.time_start.minute}"
                if len(time_start) == 3 and x.time_start.hour == 9 or x.time_start.hour == 8:
                    time_start = time_start + "0"
                else:
                    if len(time_start) == 5:
                        pass
                    else:
                        time_start = time_start + "0"

                self.data['list'].append({
                    "lesson": lesson_name.lesson,
                    "group": group_name.name,
                    "day": x.day,
                    "time_start": time_start
                })
        print(self.data)
        return jsonify({"response": True, "message": self.data}, 200)
        # except:
        #     return jsonify({"response": False, "message": "Что то пошло не так!"}, 500)
