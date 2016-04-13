<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/11/16
 */
namespace Tests\functional\admin\api;

use App\Sass\Repositories\User\DbUserRepository;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

/**
 * Class AuthTest.
 */
class AuthTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_login_token()
    {
        $password = 'pass';
        $dbUserRepository = new DbUserRepository();
        $admin = factory(User::class)->create(['password' => Hash::make($password)]);
        $dbUserRepository->assignAdminRole($admin);

        $this->post(route('api.v1.auth.login'), ['email' => $admin->email, 'password' => 'wrong-pass'])
            ->seeJsonEquals([
                'error' => [
                    'message'     => 'Invalid Credentials.',
                    'status_code' => 404,
                ],
            ])
            ->assertResponseStatus(400);

        $this->post(route('api.v1.auth.session'), ['email' => $admin->code, 'password' => 'pass'])
            ->seeJsonEquals([
                'status_code' => 200,
                'data'        => [
                    'token'
                ],
            ])
            ->assertResponseOk();
    }

}