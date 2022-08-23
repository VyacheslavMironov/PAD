class ExeptionUserRegistration(object):
    def __repr__(self):
        pass

    def error(self):
        raise Exception('Ошибка сервера') from None


class ExeptionUserFindNotFound(object):
    def __init__(self, find):
        self.find = find

    def __repr__(self):
        pass

    def error(self):
        raise Exception(f'Поле {self.find} равное Null') from None


class ExeptionUserDouble(object):
    def __repr__(self):
        pass

    def error(self):
        raise Exception('Такой пользователь уже существует') from None


class ExeptionUserNone(object):
    def __repr__(self):
        pass

    def error(self):
        raise Exception('Такой пользователь несуществует') from None


class ExeptionUserPassword(object):
    def __repr__(self):
        pass

    def error(self):
        raise Exception('Пароль не верный') from None
