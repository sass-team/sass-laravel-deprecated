<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  27/03/16
 */
namespace Tests\integration\app\Sass\Repositories\User;

use App\User;
use DbUserRepository;
use Tests\TestCase;

class DbUserRepositoryTest extends TestCase
{
    /** @test */
    public function it_assigns_tutor_role_to_user()
    {
        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create();

        $this->assertFalse($dbUserRepository->hasCompanyRepresentativeRole($user));
        $this->assertNotFalse($user = $dbUserRepository->assignCompanyRepresentativeRole($user));
        $this->assertTrue($dbUserRepository->hasCompanyRepresentativeRole($user));
    }
}