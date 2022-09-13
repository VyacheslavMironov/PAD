from abc import ABC, abstractmethod
from core.model.user.role import AbstractRole


class AbstractParent(ABC):
    @abstractmethod
    def abstract_student_id(self) -> int:
        pass

    @abstractmethod
    def abstract_user_id(self) -> int:
        pass
