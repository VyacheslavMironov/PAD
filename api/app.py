# !/usr/bin/python
# -*- coding: utf-8 -*-
from configparser import ConfigParser
from datetime import timedelta
from json import loads, dumps

from flask import Flask, request
from flask_cors import CORS, cross_origin
from flask_jwt_extended import JWTManager

from api.organization import createOrganization
from api.user import createUser, activate
from api.email import verificationUser
from core.db.dbo import engine, metadata


#======================================================================
#===================== Извлечение данных конфига ======================
#======================================================================
conf = ConfigParser()
conf.read(filenames='settings.ini')
DEBUG = conf['WEB']['debug']
HOST = conf['WEB']['host']
PORT = conf['WEB']['port']
#======================================================================
#======================= Создание точки входа =========================
#======================================================================
app = Flask(__name__)
#======================================================================
#========================= Создание миграций ==========================
#======================================================================
metadata.create_all(engine)
#======================================================================
#=========================== Настройка CORS ===========================
#======================================================================
cors = CORS(app, resources={r"/*": {"origins": "*"}}, headers='Content-Type')
app.config['CORS_HEADERS'] = 'Content-Type'
#======================================================================
#====================== Настройка генератора JWT ======================
#======================================================================
app.config["JWT_SECRET_KEY"] = "super-secret"  # Change this!
jwt = JWTManager(app)
app.config["JWT_COOKIE_SECURE"] = False
app.config["JWT_TOKEN_LOCATION"] = ["cookies"]
app.config["JWT_SECRET_KEY"] = "super-secret"
app.config["JWT_ACCESS_TOKEN_EXPIRES"] = timedelta(hours=1)

#======================================================================
#======================= URL маршрутизация API ========================
#======================================================================
@app.route('/api', methods=["GET"])
def api_index():
    pass

@app.route('/api/organization/create-organization', methods=["POST"])
def api_create_organization():
    return createOrganization.Api(organization_name=request.form.get('name')).save()

@app.route('/api/user/create-user', methods=["POST"])
def api_create_user():
    with createOrganization.Api(organization_name=request.form.get('organization_name')).save() as obj:
        data = loads(obj.data.decode('utf-8'))
        obj.close()

    organization_id = data[0]["message"]["id"]

    return createUser.Api(
        organization_name=organization_id,
        first_name=request.form.get('first_name'),
        last_name=request.form.get('last_name'),
        email=request.form.get('email'),
        role=request.form.get('role'),
        password=request.form.get('password')
    ).save()

@app.route('/api/user/activate', methods=["PUT"])
def api_activate():
    return activate.Api(user_id=request.args.get('id')).activate()

@app.route('/api/user/update-user', methods=["PUT"])
def api_update_user():
    pass

@app.route('/api/user/user-info', methods=["GET"])
def api_user_info():
    pass

@app.route('/api/user/all-user', methods=["GET"])
def api_all_user():
    pass

@app.route('/api/user/block-user', methods=["POST"])
def api_block_user():
    pass

@app.route('/api/email/send-verification', methods=["POST"])
def api_email_verification():
    return verificationUser.Api(
        email=request.form.get('email'),
        first_name=request.form.get('first_name')
    ).send()
