<?php


namespace Unit;

use \UnitTester;
use app\Repository\WorkingSpaceOrganizationsRepository;
use app\Repository\AuthUserRepository;
use app\DTO\CreatePrivilegeAdminDTO;
use app\DTO\CreateSettingsDTO;
use app\DTO\CreateOrganizationDTO;
use app\DTO\CreateUserDTO;
use app\DTO\AuthUserDTO;

class AuthTest extends \Codeception\Test\Unit
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

        // Аутентификация
        $authTest = new AuthUserRepository();
        $response = $authTest->auth(new AuthUserDTO('test.mail@mail.ru', 'blablabla22'));

        // codecept_debug($response);

        // Проверка параметров возвращаемого массива
        $this->assertNotNull($response);
        $this->assertArrayHasKey('user_id', $response);
        $this->assertArrayHasKey('token', $response);
        $this->assertNotNull($response['token']);
    }

    // tests
    public function testSomeFeature()
    {

    }
}
