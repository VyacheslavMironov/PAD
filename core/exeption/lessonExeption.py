class ExeptionLessonRegistration(object):
    def __repr__(self):
        pass

    def error(self):
        raise Exception('Ошибка сервера') from None


class ExeptionLessonFindNotFound(object):
    def __init__(self, find):
        self.find = find

    def __repr__(self):
        pass

    def error(self):
        raise Exception(f'Поле {self.find} равное Null') from None


class ExeptionLessonDouble(object):
    def __repr__(self):
        pass

    def error(self):
        raise Exception('Такой предмет уже существует в вашей организации') from None


class ExeptionLessonNone(object):
    def __repr__(self):
        pass

    def error(self):
        raise Exception('Такой предмет не найден') from None
