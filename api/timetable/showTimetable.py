import pymysql
import sqlalchemy
from flask import jsonify

from core.model.timetable import showTimetable
from core.db.dbo import session, Timetable, Lesson
from core.exeption.timetableExeption import (
    ExeptionTimetableFindNotFound,
    ExeptionTimetableNone
)


class Api(showTimetable.AbstractShowTimetable):
    def __init__(self, organization_id, groups_id):
        self.api_organization_id = organization_id
        self.api_groups_id = groups_id
        self.data = {}

    def abstract_organization_id(self):
        return self.api_organization_id if self.api_organization_id is not None else ExeptionTimetableFindNotFound('organization_id').error()

    def abstract_groups_id(self):
        return self.api_groups_id if self.api_groups_id is not None else ExeptionTimetableFindNotFound('groups_id').error()

    def show(self):
        self.data['list'] = []
        try:
            query = session.query(Timetable).where(
                        Timetable.organization_id == self.abstract_organization_id()
                    ).filter(Timetable.groups_id == self.abstract_groups_id())
            # Выборка расписания для конкретной группы
            for i in query:
                # Забор предмета
                lesson = session.query(Lesson).where(
                    Lesson.organization_id == self.abstract_organization_id()
                ).filter(Lesson.id == i.lesson_id).one().lesson
                # Формирование времени
                start_hour = i.time_start.hour if i.time_start.hour >= 10 else f'0{i.time_start.hour}'
                start_minute = i.time_start.minute if i.time_start.minute >= 10 else f'0{i.time_start.minute}'
                start = f'{start_hour}:{start_minute}'

                end_hour = i.time_end.hour if i.time_end.hour >= 10 else f'0{i.time_end.hour}'
                end_minute = i.time_end.minute if i.time_end.minute >= 10 else f'0{i.time_end.minute}'
                end = f'{end_hour}:{end_minute}'

                # Запись данных
                self.data['list'].append({
                    'id': i.id,
                    'lesson': lesson,
                    'day': i.day,
                    'time_start': start,
                    'time_end': end
                })
                # Сортировка списка словарей по дню и дате
                self.data['list'].sort(key=lambda dictionary: dictionary['day'])
            return jsonify({"response": True, "message": self.data}, 200)

        except (sqlalchemy.exc.IntegrityError, pymysql.err.IntegrityError):
            return jsonify({"response": False, "message": "Такая группа уже существует"}, 500)

    def all(self):
        pass
