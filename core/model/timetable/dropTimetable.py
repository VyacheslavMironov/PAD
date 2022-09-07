from abc import ABC, abstractmethod


class AbstractDropTimetable(ABC):
    @abstractmethod
    def abstract_id(self):
        pass
