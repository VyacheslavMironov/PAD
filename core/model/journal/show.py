from abc import ABC, abstractmethod


class AbstractJournalShow(ABC):
    @abstractmethod
    def abstract_organization_id(self):
        pass

    @abstractmethod
    def abstract_user_id(self):
        pass

    @abstractmethod
    def abstract_role(self):
        pass
