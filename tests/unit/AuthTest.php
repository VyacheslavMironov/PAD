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
        $this->assertArrayHasKey('message', $response);
        $this->assertEquals(2, count($response));
        $this->assertEquals(true, $response['response']);
        $this->assertEquals(4, count($response['message']));
        $this->assertEquals(true, $response['response']);

        // Аутентификация
        $authTest = new AuthUserRepository();
        $response = $authTest->auth(new AuthUserDTO('test.mail@mail.ru', 'blablabla22'));

        // Проверка параметров возвращаемого массива
        $this->assertNotNull($response);
        $this->assertArrayHasKey('message', $response);
        $this->assertEquals(2, count($response));
        $this->assertArrayHasKey('id', $response['message']);
        $this->assertArrayHasKey('user_id', $response['message']);
        $this->assertArrayHasKey('token', $response['message']);
    }

    // tests
    public function testSomeFeature()
    {

    }
}
