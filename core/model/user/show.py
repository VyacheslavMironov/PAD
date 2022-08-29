from abc import ABC, abstractmethod


class AbstractUserInfo(ABC):
    @abstractmethod
    def abstract_access_token(self):
        pass
