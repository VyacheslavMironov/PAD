from abc import ABC, abstractmethod


class AbstractLogin(ABC):
    @abstractmethod
    def abstract_email(self):
        pass

    @abstractmethod
    def abstract_password(self):
        pass
