from abc import ABC, abstractmethod


class AbstractConfirmationReset(ABC):
    @abstractmethod
    def abstract_new_password(self):
        pass
