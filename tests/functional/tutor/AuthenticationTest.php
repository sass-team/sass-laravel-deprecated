<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 05/04/16
 */
namespace Tests\functional\tutor;

use App\Sass\Repositories\User\DbUserRepository;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

/**
 * Class AuthenticationTest.
 */
class AuthenticationTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_login()
    {
        $dbUserRepository = new DbUserRepository();
        $pass = 'pass';
        $tutor = factory(User::class)->create(['password' => Hash::make($pass)]);
        $dbUserRepository->assignTutorRole($tutor);

        $this->visit(route('login.get'))
            ->type('email', $tutor->email);
    }
}
