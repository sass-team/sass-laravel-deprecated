<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  27/03/16
 */
namespace Tests\integration\app\Sass\Repositories\User;

use App\Sass\Repositories\User\DbUserRepository;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DbUserRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_assigns_tutor_role_to_user()
    {
        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create();

        $this->assertFalse($dbUserRepository->hasTutorRole($user));
        $this->assertNotFalse($user = $dbUserRepository->assignTutorRole($user));
        $this->assertTrue($dbUserRepository->hasTutorRole($user));
    }
}