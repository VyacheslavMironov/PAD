class ExeptionJournal(object):
    def __repr__(self):
        pass

    def error(self):
        raise Exception('Ошибка сервера') from None


class ExeptionJournalFindNotFound(object):
    def __init__(self, find):
        self.find = find

    def __repr__(self):
        pass

    def error(self):
        raise Exception(f'Поле {self.find} равное Null') from None


class ExeptionJournalNone(object):
    def __repr__(self):
        pass

    def error(self):
        raise Exception('Такого журнала не существует') from None
