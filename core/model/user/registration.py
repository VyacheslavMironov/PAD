from abc import ABC, abstractmethod
from core.model.user.role import AbstractRole


class AbstractRegistration(ABC):
    @abstractmethod
    def abstract_organization_name(self) -> int:
        pass

    @abstractmethod
    def abstract_first_name(self) -> str:
        pass

    @abstractmethod
    def abstract_last_name(self) -> str:
        pass

    @abstractmethod
    def abstract_email(self) -> str:
        pass

    @abstractmethod
    def abstract_role(self) -> str:
        pass

    @abstractmethod
    def abstract_password(self) -> str:
        pass
