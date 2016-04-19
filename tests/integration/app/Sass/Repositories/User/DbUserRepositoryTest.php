<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  27/03/16
 */
namespace Tests\integration\app\Sass\Repositories\User;

use App\Sass\Repositories\User\DbUserRepository;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DbUserRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_assigns_tutor_role_to_user()
    {
        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create();

        $this->assertFalse($dbUserRepository->hasTutorRole($user));
        $this->assertNotFalse($user = $dbUserRepository->assignTutorRole($user));
        $this->assertTrue($dbUserRepository->hasTutorRole($user));
    }

    /** @test */
    public function it_assigns_secretary_role_to_user()
    {
        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create();

        $this->assertFalse($dbUserRepository->hasSecretaryRole($user));
        $this->assertNotFalse($user = $dbUserRepository->assignSecretaryRole($user));
        $this->assertTrue($dbUserRepository->hasSecretaryRole($user));
    }

    /** @test */
    public function it_checks_if_user_has_secretary_role()
    {
        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create();

        $this->assertFalse($dbUserRepository->hasSecretaryRole($user));
        $this->assertNotFalse($user = $dbUserRepository->assignSecretaryRole($user));
        $this->assertTrue($dbUserRepository->hasSecretaryRole($user));
    }


    /** @test */
    public function it_assigns_admin_role_to_user()
    {
        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create();

        $this->assertFalse($dbUserRepository->hasAdminRole($user));
        $this->assertNotFalse($user = $dbUserRepository->assignAdminRole($user));
        $this->assertTrue($dbUserRepository->hasAdminRole($user));
    }
}
