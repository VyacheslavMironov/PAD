from abc import ABC, abstractmethod


class AbstractShowTeacherTimetable(ABC):
    @abstractmethod
    def abstract_organization_id(self):
        pass

    @abstractmethod
    def abstract_user_id(self):
        pass
