from abc import ABC, abstractmethod


class AbstractUserUpdate(ABC):
    @abstractmethod
    def abstract_user_id(self):
        pass

    @abstractmethod
    def abstract_first_name(self):
        pass

    @abstractmethod
    def abstract_last_name(self):
        pass

    @abstractmethod
    def abstract_role(self):
        pass

    @abstractmethod
    def abstract_email(self):
        pass
