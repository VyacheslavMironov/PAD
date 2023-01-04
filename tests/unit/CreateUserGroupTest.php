<?php


namespace Unit;

use \UnitTester;
use app\Repository\WorkingSpaceOrganizationsRepository;
use app\Repository\LessonCreateRepository;
use app\Repository\GroupCreateRepository;
use app\Repository\UserGroupCreateRepository;
use app\Repository\UserCreateRepository;
use app\Repository\WorkingSpaceFilialRepository;
use app\Repository\FilialShowRepository;
use app\DTO\CreatePrivilegeAdminDTO;
use app\DTO\CreateSettingsDTO;
use app\DTO\CreateOrganizationDTO;
use app\DTO\CreateUserDTO;
use app\DTO\SettingsFilialDTO;
use app\DTO\FilialCreateDTO;
use app\DTO\FilialShowDTO;
use app\DTO\LessonCreateDTO;
use app\DTO\GroupCreateDTO;
use app\DTO\UserGroupCreateDTO;

class CreateUserGroupTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
        $workingSpaceTest = new WorkingSpaceOrganizationsRepository();
        $response_create_organization = $workingSpaceTest->create([
            // Привелегии администратора
            'privilege_admin' => new CreatePrivilegeAdminDTO(true, true, false, false, true,),
            // Настройки рабочей области
            'settings' => new CreateSettingsDTO('test-image.png', '2022-10-17', '2023-10-17', 'Годовой',
                                                false, null, true, true, true, true, true, true, true,),
            // Параметры организации
            'organization' => new CreateOrganizationDTO('Тестовая школа', 'Школа', null, /* => settings_id */),
            // Владелец
            'user' => new CreateUserDTO(null, /* => organization_id */ null, /* => filial_id */ null, /* => middle_name */
                                    'Колька', 'Басурманов', 'Тарасов', 'test.mail@mail.ru', 'Директор', null, /* => is_active */
                                    'test-image.png', null, /* email_code */ 'blablabla22',),
        ]);

        // codecept_debug($response_create_organization);

        // Проверка параметров возвращаемого массива
        $this->assertNotNull($response_create_organization);

        $this->assertArrayHasKey('name', $response_create_organization[2]);
        $this->assertEquals('Тестовая школа', $response_create_organization[2]['name']);

        $this->assertArrayHasKey('destination', $response_create_organization[2]);
        $this->assertEquals('Школа', $response_create_organization[2]['destination']);

        $this->assertArrayHasKey('first_name', $response_create_organization[3]);
        $this->assertEquals('Колька', $response_create_organization[3]['first_name']);

        $this->assertArrayHasKey('last_name', $response_create_organization[3]);
        $this->assertEquals('Басурманов', $response_create_organization[3]['last_name']);

        $this->assertArrayHasKey('email', $response_create_organization[3]);
        $this->assertEquals('test.mail@mail.ru', $response_create_organization[3]['email']);

        $this->assertArrayHasKey('role', $response_create_organization[3]);
        $this->assertEquals('Директор', $response_create_organization[3]['role']);

        $this->assertArrayHasKey('password', $response_create_organization[3]);
        $this->assertEquals('blablabla22', $response_create_organization[3]['password']);

        $this->assertArrayHasKey('organization_id', $response_create_organization[3]);
        $this->assertNotNull($response_create_organization[3]['organization_id']);

        $this->assertEquals(4, count($response_create_organization));


        // Создание предмета
        $lessonCreateTest = new LessonCreateRepository();
        $response_lesson_create = $lessonCreateTest->create(new LessonCreateDTO(
            $response_create_organization[3]['organization_id'],
            null,   // filial_id
            null,   // teacher_id
            'Математика'
        ));

        // codecept_debug($response);

        // Проверка параметров возвращаемого массива
        $this->assertNotNull($response_lesson_create);
        $this->assertArrayHasKey('id', $response_lesson_create);
        $this->assertArrayHasKey('organization_id', $response_lesson_create);
        $this->assertEquals('Математика', $response_lesson_create['name']);
        $this->assertArrayHasKey('name', $response_lesson_create);
        $this->assertNotNull($response_lesson_create['id']);
        $this->assertNotNull($response_lesson_create['organization_id']);
        $this->assertNotNull($response_lesson_create['name']);

        // Создание администратора
        $userCreateTest = new UserCreateRepository();
        $response_create_user = $userCreateTest->create(new CreateUserDTO(
            $response_create_organization[3]['organization_id'],
            null,
            null,
            'Гайкин',
            'Алексей',
            null,
            'test.mail@gmail.com',
            'Администратор',
            true,
            'default',
            null,
            '0123456789'
        ));

        // codecept_debug($response);

        // Проверка параметров возвращаемого массива
        $this->assertNotNull($response_create_user);
        $this->assertArrayHasKey('id', $response_create_user);
        $this->assertArrayHasKey('first_name', $response_create_user);

        // codecept_debug($response);

        // Создание настроек филиала
        $flialCreateTest = new WorkingSpaceFilialRepository();
        $response_settings_filial_create = $flialCreateTest->createSettingsFilial(new SettingsFilialDTO(
            false,
            false,
            false,
            'Нет',
            'Сентябрь,Октябрь,'
        ));

        // Проверка параметров возвращаемого массива
        $this->assertNotNull($response_settings_filial_create);
        $this->assertArrayHasKey('id', $response_settings_filial_create);

        // Создание филиала
        $response_filial_create = $flialCreateTest->crateFilial(new FilialCreateDTO(
            $response_create_user['id'],
            $response_create_organization[3]['organization_id'],
            'Тестовый филиал',
            $response_settings_filial_create['id']

        ));

        // Проверка параметров возвращаемого массива
        $this->assertNotNull($response_filial_create);
        $this->assertArrayHasKey('admin_id', $response_filial_create);
        $this->assertArrayHasKey('id', $response_filial_create);
        $this->assertNotNull($response_filial_create['name']);
        $this->assertEquals('Тестовый филиал', $response_filial_create['name']);
        $this->assertEquals($response_create_user['id'], $response_filial_create['admin_id']);

        // Просмотр филиала
        $flialShowTest = new FilialShowRepository();
        $response_filial_show = $flialShowTest->show(new FilialShowDTO(
            $response_create_organization[3]['organization_id'],
            null
        ));

        // codecept_debug($response);

        // Проверка параметров возвращаемого массива
        $this->assertNotNull($response_filial_show);
        $this->assertArrayHasKey('name', $response_filial_show[0]);
        $this->assertEquals('Тестовый филиал', $response_filial_show[0]['name']);

        // Создание преподавателя
        $userCreateTeacherTest = new UserCreateRepository();
        $response_create_teacher_user = $userCreateTeacherTest->create(new CreateUserDTO(
            $response_create_organization[3]['organization_id'],
            null,
            null,
            'Гайкин',
            'Алексей',
            null,
            'test.teacher.mail@gmail.com',
            'Преподаватель',
            true,
            'default',
            null,
            '0123456789'
        ));

        // Проверка параметров возвращаемого массива
        $this->assertNotNull($response_create_teacher_user);
        $this->assertArrayHasKey('id', $response_create_teacher_user);
        $this->assertArrayHasKey('first_name', $response_create_teacher_user);
        $this->assertEquals('Преподаватель', $response_create_teacher_user['role']);

        // Создание группы
        $userCreateGroupTest = new GroupCreateRepository();
        $response_create_group = $userCreateGroupTest->create(new GroupCreateDTO(
            $response_create_organization[3]['organization_id'],
            $response_filial_create['id'],
            'It Test',
            '01.01.2023 14:40'
        ));

        // Проверка параметров возвращаемого массива
        $this->assertNotNull($response_create_group);
        $this->assertArrayHasKey('id', $response_create_group);
        $this->assertArrayHasKey('name', $response_create_group);
        $this->assertEquals('It Test', $response_create_group['name']);

        // Список студентов
        $arr = [
            ['organization_id' => $response_create_organization[3]['organization_id'], 'filial_id' => $response_filial_create['id'], 'first_name' => 'Артём', 'last_name' => 'Шарапов', 'email' => 'test.student.1@mail.ru', 'role' => 'Студент', 'password' => '12345'],
            ['organization_id' => $response_create_organization[3]['organization_id'], 'filial_id' => $response_filial_create['id'], 'first_name' => 'Глеб', 'last_name' => 'Жиглов', 'email' => 'test.student.2@mail.ru', 'role' => 'Студент', 'password' => '12345'],
            ['organization_id' => $response_create_organization[3]['organization_id'], 'filial_id' => $response_filial_create['id'], 'first_name' => 'Александр', 'last_name' => 'Блок', 'email' => 'test.student.3@mail.ru', 'role' => 'Студент', 'password' => '12345'],
            ['organization_id' => $response_create_organization[3]['organization_id'], 'filial_id' => $response_filial_create['id'], 'first_name' => 'Александр', 'last_name' => 'Пушкин', 'email' => 'test.student.4@mail.ru', 'role' => 'Студент', 'password' => '12345'],
            ['organization_id' => $response_create_organization[3]['organization_id'], 'filial_id' => $response_filial_create['id'], 'first_name' => 'Лев', 'last_name' => 'Толстой', 'email' => 'test.student.5@mail.ru', 'role' => 'Студент', 'password' => '12345'],
            ['organization_id' => $response_create_organization[3]['organization_id'], 'filial_id' => $response_filial_create['id'], 'first_name' => 'Александр', 'last_name' => 'Суворов', 'email' => 'test.student.6@mail.ru', 'role' => 'Студент', 'password' => '12345'],
            ['organization_id' => $response_create_organization[3]['organization_id'], 'filial_id' => $response_filial_create['id'], 'first_name' => 'Василий', 'last_name' => 'Жуковский', 'email' => 'test.student.7@mail.ru', 'role' => 'Студент', 'password' => '12345'],
            ['organization_id' => $response_create_organization[3]['organization_id'], 'filial_id' => $response_filial_create['id'], 'first_name' => 'Василий', 'last_name' => 'Чуйков', 'email' => 'test.student.8@mail.ru', 'role' => 'Студент', 'password' => '12345'],
            ['organization_id' => $response_create_organization[3]['organization_id'], 'filial_id' => $response_filial_create['id'], 'first_name' => 'Григорий', 'last_name' => 'Жуков', 'email' => 'test.student.9@mail.ru', 'role' => 'Студент', 'password' => '12345'],
            ['organization_id' => $response_create_organization[3]['organization_id'], 'filial_id' => $response_filial_create['id'], 'first_name' => 'Александр', 'last_name' => 'Шевченко', 'email' => 'test.student.10@mail.ru', 'role' => 'Студент', 'password' => '12345'],
            ['organization_id' => $response_create_organization[3]['organization_id'], 'filial_id' => $response_filial_create['id'], 'first_name' => 'Владимир', 'last_name' => 'Ленин', 'email' => 'test.student.11@mail.ru', 'role' => 'Студент', 'password' => '12345'],
        ];

        foreach ($arr as $value) {
            // Создание студента
            $userCreateStudentTest = new UserCreateRepository();
            $response_create_student_user = $userCreateStudentTest->create(new CreateUserDTO(
                $value['organization_id'],
                $value['filial_id'],
                null,
                $value['first_name'],
                $value['last_name'],
                null,
                $value['email'],
                $value['role'],
                true,
                'default',
                null,
                $value['password']
            ));

            // Проверка параметров возвращаемого массива
            $this->assertNotNull($response_create_student_user);
            $this->assertArrayHasKey('id', $response_create_student_user);
            $this->assertArrayHasKey('first_name', $response_create_student_user);
            $this->assertEquals('Студент', $response_create_student_user['role']);

            // Добавление студента в группу
            $userCreateGroupTest = new UserGroupCreateRepository();
            $response_create_group_user = $userCreateGroupTest->create(new UserGroupCreateDTO(
                $value['organization_id'],
                $value['filial_id'],
                $response_create_student_user['id'],
                $response_create_group['id'],
                '04.01.2023 15:51'
            ));

            // Проверка параметров возвращаемого массива
            $this->assertNotNull($response_create_group_user);
            $this->assertArrayHasKey('id', $response_create_group_user);
            $this->assertArrayHasKey('user_id', $response_create_group_user);
        }
    }

    // tests
    public function testSomeFeature()
    {

    }
}
