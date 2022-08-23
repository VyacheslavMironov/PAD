from abc import ABC, abstractmethod


class AbstractConfirmationReset(ABC):
    @abstractmethod
    def abstratct_email(self):
        pass

    @abstractmethod
    def abstratct_subject(self):
        pass

    @abstractmethod
    def abstratct_text(self):
        pass
