from xml.dom import minidom
from datetime import datetime

from sqlalchemy.orm import Session
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
sessionDb = Session(bind=engine)

Base = declarative_base()


Organization = Table('organization', metadata,
    Column('id', BigInteger(), primary_key=True, autoincrement=True),
    Column('name', CHAR(120), unique=True)
)
'''
Создавая нового пользователя Администратор указывает все данные кроме
organization_id, он записывается автоматически.
'''
User = Table('user', metadata,
    Column('user_id', BigInteger(), primary_key=True, autoincrement=True),
    Column('firstName', CHAR(30)),
    Column('lastName', CHAR(40)),
    Column('email', CHAR(120), unique=True),
    Column('password', CHAR(120)),
    Column('role', CHAR(25)),
    Column('is_active', Boolean(), default=False),
    Column('is_admin', Boolean(), default=False),
    Column('create_at', DATETIME(), default=datetime.now()),
    Column('organization_id', ForeignKey('organization.id'), unique=True)
)


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