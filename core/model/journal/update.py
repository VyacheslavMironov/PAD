from abc import ABC, abstractmethod


class AbstractJournalAdd(ABC):
    @abstractmethod
    def abstract_organization_id(self):
        pass

    @abstractmethod
    def abstract_lesson_id(self):
        pass

    @abstractmethod
    def abstract_user_id(self):
        pass

    @abstractmethod
    def abstract_groups_id(self):
        pass

    @abstractmethod
    def abstract_day(self):
        pass

    @abstractmethod
    def abstract_month(self):
        pass

    @abstractmethod
    def abstract_year(self):
        pass
