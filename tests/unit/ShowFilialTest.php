<?php


namespace Unit;

use \UnitTester;
use app\Repository\WorkingSpaceOrganizationsRepository;
use app\Repository\FilialCreateRepository;
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

class ShowFilialTest extends \Codeception\Test\Unit
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
        $response = $flialShowTest->show(new FilialShowDTO(
            $response_create_organization[3]['organization_id'],
            null
        ));

        // codecept_debug($response);

        // Проверка параметров возвращаемого массива
        $this->assertNotNull($response);
        $this->assertArrayHasKey('name', $response[0]);
        $this->assertEquals('Тестовый филиал', $response[0]['name']);
    }

    // tests
    public function testSomeFeature()
    {

    }
}
