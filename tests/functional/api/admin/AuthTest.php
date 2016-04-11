<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/11/16
 */
namespace Tests\functional\api\admin;

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

        $this->post(route('api.v1.auth.session'), ['code' => $admin->code, 'password' => 'wrong-pass'])
            ->seeJsonEquals([
                'valid' => false,
            ])
            ->assertResponseOk();

        $this->post(route('api.v1.auth.session'), ['code' => $admin->code, 'password' => 'pass'])
            ->seeJsonEquals([
                'valid' => true,
            ])
            ->assertResponseOk();
    }

}