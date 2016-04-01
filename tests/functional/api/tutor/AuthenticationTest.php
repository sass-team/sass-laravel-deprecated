<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  27/03/16
 */
namespace Tests\functional\api\tutor;

use App\Sass\Repositories\User\DbUserRepository;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class AuthenticationTest.
 */
class AuthenticationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_initializes_login_process()
    {
        $userRepository = new DbUserRepository();
        $tutor = factory(User::class)->create();
        $userRepository->assignTutorRole($tutor);

        $this->actingAs($tutor)
            ->visit(route('auth.login'))
            ->seePageIs(route('auth.login'))
            ->see('<title>Login &middot; SASS')
            ->type($tutor->email, 'email')
            ->press('Login')
            ->seePageIs(route('auth.login.pin'))
            ->see('If that email exists, we will send you an email with a one time password, expiring in 5 minutes.');
    }
}
