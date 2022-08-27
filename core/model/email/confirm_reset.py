from abc import ABC, abstractmethod


class AbstractConfirmationReset(ABC):
    @abstractmethod
    def abstratct_email(self):
        pass
