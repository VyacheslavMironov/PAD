from abc import ABC, abstractmethod


class AbstractLogin(ABC):
    @abstractmethod
    def email(self) -> str:
        pass

    @abstractmethod
    def password(self) -> str:
        pass
