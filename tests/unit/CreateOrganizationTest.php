<?php


namespace Unit;

use \UnitTester;
use app\Repository\WorkingSpaceOrganizationsRepository;
use app\DTO\CreatePrivilegeAdminDTO;
use app\DTO\CreateSettingsDTO;
use app\DTO\CreateOrganizationDTO;
use app\DTO\CreateUserDTO;

class CreateOrganizationTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
        $workingSpaceTest = new WorkingSpaceOrganizationsRepository();
        $response = $workingSpaceTest->create([
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

        // Проверка параметров возвращаемого массива
        $this->assertNotNull($response);

        $this->assertArrayHasKey('name', $response[2]);
        $this->assertEquals('Тестовая школа', $response[2]['name']);

        $this->assertArrayHasKey('destination', $response[2]);
        $this->assertEquals('Школа', $response[2]['destination']);

        $this->assertArrayHasKey('first_name', $response[3]);
        $this->assertEquals('Колька', $response[3]['first_name']);

        $this->assertArrayHasKey('last_name', $response[3]);
        $this->assertEquals('Басурманов', $response[3]['last_name']);

        $this->assertArrayHasKey('email', $response[3]);
        $this->assertEquals('test.mail@mail.ru', $response[3]['email']);

        $this->assertArrayHasKey('role', $response[3]);
        $this->assertEquals('Директор', $response[3]['role']);

        $this->assertArrayHasKey('password', $response[3]);
        $this->assertEquals('blablabla22', $response[3]['password']);

        $this->assertArrayHasKey('organization_id', $response[3]);
        $this->assertNotNull($response[3]['organization_id']);

        $this->assertEquals(4, count($response));
    }

    // tests
    public function testSomeFeature()
    {

    }
}
