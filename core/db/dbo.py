from xml.dom import minidom
from datetime import datetime, timedelta

from flask_jwt_extended import create_access_token
from sqlalchemy.orm import sessionmaker, scoped_session
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy import (
    create_engine,
    MetaData,
    BigInteger,
    Table,
    Column,
    DATETIME,
    Integer,
    CHAR,
    String,
    CheckConstraint,
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

session = scoped_session(sessionmaker(
    autocommit=False, autoflush=False, bind=engine))

Base = declarative_base()
Base.query = session.query_property()

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
    organization_id = Column(ForeignKey('organizations.id'), unique=True)

"""
"""
class AccessToken(Base):
    __tablename__ = 'access_tokens'
    id = Column(BigInteger(), primary_key=True, autoincrement=True)
    user_id = Column(ForeignKey('users.user_id'), unique=True)
    token = Column(String(1000))
    created_at = Column(DATETIME(), default=datetime.now())
"""
# class Journal(BaseModel):
#     '''
#     При создании журнала, администратор должен выбрать студентов, которые
#     не записаны ни в какой другой журнал.
#     '''
#     id = BigIntegerField(primary_key=True, unique=True, constraints=[SQL('AUTO_INCREMENT')])
#     name = CharField(max_length=150)
#     # value = CharField(max_length=150, null=True)
#     # value_per_semester = CharField(max_length=150, null=True)
#     # value_per_year = CharField(max_length=150, null=True)
#     create_at = DateField(default=datetime.now())
#     user_id = ForeignKeyField(User, backref="user_id")
#     organization_id = ForeignKeyField(Organization, backref="id")
"""