from core.model.user import login
from web.app import app, cross_origin


class Api(login.AbstractLogin):
    pass
