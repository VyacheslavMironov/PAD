from xml.dom import minidom
from datetime import datetime, timedelta

from flask_jwt_extended import create_access_token
from sqlalchemy.orm import sessionmaker, scoped_session
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy import (
    create_engine,
    MetaData,
    BigInteger,
    Column,
    DATETIME,
    Integer,
    CHAR,
    String,
    TIME,
    Boolean,
    ForeignKey
)


#======================================================================
# ================= Данные подключения к Базе Данных ==================
#======================================================================
context = minidom.parse("core/db/settings.xml")
NAME = context.getElementsByTagName("Resource").item(0).attributes["name"].value
HOST = context.getElementsByTagName("Resource").item(0).attributes["host"].value
PORT = context.getElementsByTagName("Resource").item(0).attributes["port"].value
USERNAME = context.getElementsByTagName("Resource").item(0).attributes["username"].value
PASSWORD = context.getElementsByTagName("Resource").item(0).attributes["password"].value

engine = create_engine(f"mysql+pymysql://{USERNAME}:{PASSWORD}@{HOST}/{NAME}", echo=True)
engine.connect()
metadata = MetaData()

session = scoped_session(sessionmaker(autocommit=False, autoflush=False, bind=engine))

Base = declarative_base()
Base.query = session.query_property()


"""
"""
class Organization(Base):
    __tablename__ = 'organizations'
    id = Column(BigInteger(), primary_key=True, autoincrement=True)
    name = Column(CHAR(120), unique=True)


'''
Создавая нового пользователя Администратор указывает все данные кроме
organization_id, он записывается автоматически.
'''
class User(Base):
    __tablename__ = 'users'
    user_id = Column(BigInteger(), primary_key=True, autoincrement=True)
    firstName = Column(CHAR(30))
    lastName = Column(CHAR(40))
    email = Column(CHAR(120), unique=True)
    password = Column(CHAR(120))
    role = Column(CHAR(25))
    is_active = Column(Boolean(), default=False)
    is_admin = Column(Boolean(), default=False)
    created_at = Column(DATETIME(), default=datetime.now())
    organization_id = Column(ForeignKey('organizations.id'))


"""
"""
class AccessToken(Base):
    __tablename__ = 'access_tokens'
    id = Column(BigInteger(), primary_key=True, autoincrement=True)
    user_id = Column(ForeignKey('users.user_id'), unique=True)
    token = Column(String(1000))
    created_at = Column(DATETIME(), default=datetime.now())


"""
"""
class Lesson(Base):
    __tablename__ = 'lessons'
    id = Column(BigInteger(), primary_key=True, autoincrement=True)
    lesson = Column(CHAR(60), unique=True)
    organization_id = Column(ForeignKey('organizations.id'))


"""
"""
class UserLesson(Base):
    __tablename__ = 'user-lessons'
    id = Column(BigInteger(), primary_key=True, autoincrement=True)
    lesson_id = Column(ForeignKey('lessons.id'))
    user_id = Column(ForeignKey('users.user_id'))



"""
"""
class Group(Base):
    __tablename__ = 'groups'
    id = Column(BigInteger(), primary_key=True, autoincrement=True)
    organization_id = Column(ForeignKey('organizations.id'))
    user_id = Column(ForeignKey('users.user_id'))
    name = Column(CHAR(180))


"""
"""
class UserGroups(Base):
    __tablename__ = 'user_groups'
    id = Column(BigInteger(), primary_key=True, autoincrement=True)
    groups_id = Column(ForeignKey('groups.id'))
    organization_id = Column(ForeignKey('organizations.id'))
    user_id = Column(ForeignKey('users.user_id'), unique=True)
    created_at = Column(DATETIME(), default=datetime.now())


"""
"""
class Timetable(Base):
    __tablename__ = 'timetables'
    id = Column(BigInteger(), primary_key=True, autoincrement=True)
    organization_id = Column(ForeignKey('organizations.id'))
    groups_id = Column(ForeignKey('groups.id'))
    lesson_id = Column(ForeignKey('lessons.id'))
    day = Column(Integer())
    time_start = Column(TIME())
    time_end = Column(TIME())


"""
"""
class Journal(Base):
    __tablename__ = 'journal'
    id = Column(BigInteger(), primary_key=True, autoincrement=True)
    organization_id = Column(ForeignKey('organizations.id'))
    lesson_id = Column(ForeignKey('lessons.id'))
    user_id = Column(ForeignKey('users.user_id'))
    groups_id = Column(ForeignKey('groups.id'))
    value = Column(CHAR(6), nullable=True)
    day = Column(CHAR(2), nullable=True)
    month = Column(CHAR(2), nullable=True)
    year = Column(CHAR(5), nullable=True)
    semester = Column(CHAR(6), nullable=True)
    years = Column(CHAR(6), nullable=True)
