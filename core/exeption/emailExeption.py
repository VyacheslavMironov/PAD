class ExeptionEmailNotNone(object):
    def __repr__(self):
        return 'ExeptionEmailNotNone - вызываетстя при неудачном поиске мыла в базе'

    def error(self):
        raise Exception('Такой E-mail не найден.') from None


class ExeptionEmailSend(object):
    def __repr__(self):
        return 'ExeptionEmailSend - вызываетстя при неизвестной ошибке'

    def error(self):
        raise Exception('Не удаётся отправить сообщение на этот E-mail адрес') from None


class ExeptionEmailTemplateNonFound(object):
    def __init__(self, find):
        self.find = find

    def __repr__(self):
        return 'ExeptionEmailTemplateNonFound - вызываетстя если нет HTML шаблона'

    def error(self):
        raise Exception('Ошибка шаблона для письма') from None
