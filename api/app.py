# !/usr/bin/python
# -*- coding: utf-8 -*-
from configparser import ConfigParser
from datetime import timedelta
from json import loads

from flask import Flask, request
from flask_cors import CORS, cross_origin
from flask_jwt_extended import JWTManager

from api.organization import showOrganization, createOrganization
from api.user import (
    createUser,
    activate,
    confirm_password,
    autentification,
    user_info
)
from api.email import verificationUser, reset_password
from core.db.dbo import engine, Base


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
Base.metadata.create_all(bind=engine)
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
@cross_origin()
def api_create_organization():
    return createOrganization.Api(organization_name=request.get_json().get('name')).save()

@app.route('/api/organization/show-organization', methods=["Get"])
@cross_origin()
def api_show_organization():
    return showOrganization.Api(organization_id=request.args.get('id')).show()

@app.route('/api/user/create-user', methods=["POST"])
@cross_origin()
def api_create_user():
    if request.get_json().get('add_personal'):
        """
        В случае если директор добавляет персонал,
        Id организации подставляется в organization_name
        """
        organization_id = request.get_json().get('organization_name')
    else:
        # В случае если регистрируется директор
        with createOrganization.Api(organization_name=request.get_json().get('organization_name')).save() as obj:
            data = loads(obj.data.decode('utf-8'))
            obj.close()

        organization_id = data[0]["message"]["id"]


    return createUser.Api(
        organization_name=organization_id,
        first_name=request.get_json().get('first_name'),
        last_name=request.get_json().get('last_name'),
        email=request.get_json().get('email'),
        role=request.get_json().get('role'),
        password=request.get_json().get('password')
    ).save()

@app.route('/api/user/activate', methods=["PUT"])
@cross_origin()
def api_activate():
    return activate.Api(user_id=request.args.get('id')).activate()

@app.route('/api/user/auth', methods=["POST"])
@cross_origin()
def api_auth():
    return autentification.Api(
        email=request.get_json().get('email'),
        password=request.get_json().get('password')
    ).auth()

@app.route('/api/user/update-user', methods=["PUT"])
@cross_origin()
def api_update_user():
    pass

@app.route('/api/user/user-info', methods=["GET"])
@cross_origin()
def api_user_info():
    return user_info.Api(access_token=request.args.get('access_token')).show()

@app.route('/api/user/all-user', methods=["GET"])
@cross_origin()
def api_all_user():
    pass

@app.route('/api/user/block-user', methods=["POST"])
@cross_origin()
def api_block_user():
    pass

@app.route('/api/email/send-verification', methods=["POST"])
@cross_origin()
def api_email_verification():
    return verificationUser.Api(
        email=request.get_json().get('email'),
        first_name=request.get_json().get('first_name')
    ).send()

@app.route('/api/email/reset-password', methods=["PUT"])
@cross_origin()
def api_reset_password():
    with confirm_password.Api(email=request.get_json().get('email')).abstract_new_password() as obj:
        data = loads(obj.data.decode('utf-8'))
        obj.close()

    new_password = data[0]["message"]

    return reset_password.Api(
        email=request.get_json().get('email'),
        password=new_password
    ).send()
