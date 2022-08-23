class ExeptionOrganizationRegistration(object):
    def __repr__(self):
        return 'ExeptionOrganizationRegistration - вызываетстя при неудачной регистрации'

    def error(self):
        raise Exception('Ошибка сервера') from None


class ExeptionOrganizationFindNotFound(object):
    def __init__(self, find):
        self.find = find

    def __repr__(self):
        return 'ExeptionOrganizationFindNotFound - вызываетстя при при пустом поле'

    def error(self):
        raise Exception(f'Поле {self.find} равное Null') from None


class ExeptionOrganizationDouble(object):
    def __repr__(self):
        return 'ExeptionOrganizationDouble - вызываетстя при дублировании исходного значения'

    def error(self):
        raise Exception('Такая организация уже существует') from None


class ExeptionOrganizationNone(object):
    def __repr__(self):
        return 'ExeptionOrganizationNone - вызываетстя в случае если организация не существует'

    def error(self):
        raise Exception('Такая организация несуществует') from None