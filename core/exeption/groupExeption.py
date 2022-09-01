class ExeptionGroupRegistration(object):
    def __repr__(self):
        pass

    def error(self):
        raise Exception('Ошибка сервера') from None


class ExeptionGroupFindNotFound(object):
    def __init__(self, find):
        self.find = find

    def __repr__(self):
        pass

    def error(self):
        raise Exception(f'Поле {self.find} равное Null') from None


class ExeptionGroupDouble(object):
    def __repr__(self):
        pass

    def error(self):
        raise Exception('Группа уже существует в вашей организации') from None


class ExeptionGroupNone(object):
    def __repr__(self):
        pass

    def error(self):
        raise Exception('Группа не найдена') from None
