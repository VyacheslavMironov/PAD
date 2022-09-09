from abc import ABC, abstractmethod


class AbstractJournalAdd(ABC):
    @abstractmethod
    def abstract_organization_id(self):
        pass

    @abstractmethod
    def abstract_lesson_id(self):
        pass

    @abstractmethod
    def abstract_groups_id(self):
        pass
