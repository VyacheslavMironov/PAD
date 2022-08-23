from abc import ABC, abstractmethod


class AbstractUserActivate(ABC):
    @abstractmethod
    def abstract_user_id(self):
        pass
