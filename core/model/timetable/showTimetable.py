from abc import ABC, abstractmethod


class AbstractShowTimetable(ABC):
    @abstractmethod
    def abstract_organization_id(self):
        pass

    @abstractmethod
    def abstract_groups_id(self):
        pass
