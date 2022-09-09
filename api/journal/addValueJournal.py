import pymysql
import sqlalchemy
from flask import jsonify

from core.model.journal import add
from core.db.dbo import engine, session, Journal
from core.exeption.journalExeption import (
    ExeptionJournalNone,
    ExeptionJournalFindNotFound,
    ExeptionJournal
)


class Api(add.AbstractJournalAdd):
    def __init__(self, lesson_id, organization_id, user_id, groups_id, day, month, year, value=None):
        self.api_lesson_id = lesson_id
        self.api_organization_id = organization_id
        self.api_user_id = user_id
        self.api_groups_id = groups_id
        self.api_day = day
        self.api_month = month
        self.api_year = year
        self.api_value = value
        self.data = {}

    def abstract_organization_id(self):
        return self.api_organization_id if self.api_organization_id else ExeptionJournalFindNotFound('organization_id').error()

    def abstract_lesson_id(self):
        return self.api_lesson_id if self.api_lesson_id is not None else ExeptionJournalFindNotFound('lesson_id').error()

    def abstract_user_id(self):
        return self.api_user_id if self.api_user_id is not None else ExeptionJournalFindNotFound('user_id').error()

    def abstract_groups_id(self):
        return self.api_groups_id if self.api_groups_id is not None else ExeptionJournalFindNotFound('groups_id').error()

    def abstract_day(self):
        return self.api_day if self.api_day is not None else ExeptionJournalFindNotFound('day').error()

    def abstract_month(self):
        return self.api_month if self.api_month is not None else ExeptionJournalFindNotFound('month').error()

    def abstract_year(self):
        return self.api_year if self.api_year is not None else ExeptionJournalFindNotFound('year').error()


    def add(self):
        try:
            value = session.query(
                Journal
            ).where(
                Journal.organization_id == self.abstract_organization_id(),
                Journal.groups_id == self.abstract_groups_id(),
                Journal.user_id == self.abstract_user_id(),
                Journal.day == self.abstract_day(),
                Journal.month == self.abstract_month(),
                Journal.year == self.abstract_year(),
            ).filter(
                Journal.lesson_id == self.abstract_lesson_id()
            ).one()

            if value.value != self.api_value:
                engine.execute(f"""
                    UPDATE journal SET value='{self.api_value}'
                    WHERE organization_id={self.abstract_organization_id()} AND
                      groups_id={self.abstract_groups_id()} AND
                      user_id={self.abstract_user_id()} AND
                      day={self.abstract_day()} AND
                      month={self.abstract_month()} AND
                      year={self.abstract_year()} AND
                      lesson_id={self.abstract_lesson_id()};
                """)

            return jsonify({"response": True}, 200)
        except (sqlalchemy.exc.NoResultFound):
            # Сохранение данных организации
            session.add(
                Journal(
                    organization_id=self.abstract_organization_id(),
                    user_id=self.abstract_user_id(),
                    groups_id=self.abstract_groups_id(),
                    lesson_id=self.abstract_lesson_id(),
                    value=self.api_value,
                    day=self.abstract_day(),
                    month=self.abstract_month(),
                    year=self.abstract_year()
                )
            )
            session.commit()

            return jsonify({"response": True}, 200)

        except (sqlalchemy.exc.IntegrityError, pymysql.err.IntegrityError):
            return jsonify({"response": False, "message": "Такая группа уже существует"}, 500)
        except Exception:
            ExeptionJournal().error()
            return jsonify({"response": False, "message": "Ошибка  сохранения"}, 500)
