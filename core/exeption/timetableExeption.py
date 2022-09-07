class ExeptionTimetableRegistration(object):
    def __repr__(self):
        pass

    def error(self):
        raise Exception('Ошибка сервера') from None


class ExeptionTimetableFindNotFound(object):
    def __init__(self, find):
        self.find = find

    def __repr__(self):
        pass

    def error(self):
        raise Exception(f'Поле {self.find} равное Null') from None


class ExeptionTimetableNone(object):
    def __repr__(self):
        pass

    def error(self):
        raise Exception('Расписание не найдено') from None
