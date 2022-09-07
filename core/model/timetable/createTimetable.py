from abc import ABC, abstractmethod


class AbstractCreateTimetable(ABC):
    @abstractmethod
    def abstract_organization_id(self):
        pass

    @abstractmethod
    def abstract_groups_id(self):
        pass

    @abstractmethod
    def abstract_lesson_id(self):
        pass

    @abstractmethod
    def abstract_day(self):
        pass

    @abstractmethod
    def abstract_time_start(self):
        pass

    @abstractmethod
    def abstract_time_end(self):
        pass
