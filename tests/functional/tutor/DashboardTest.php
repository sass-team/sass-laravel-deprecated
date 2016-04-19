<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/11/16
 */
namespace Tests\functional\tutor;

use App\Sass\Repositories\User\DbUserRepository;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * Class DashboardTest.
 */
class DashboardTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_reads_dashboard_elements()
    {
        $dbUserRepository = new DbUserRepository();
        $tutor = factory(User::class)->create();
        $dbUserRepository->assignTutorRole($tutor);

        $this->actingAs($tutor)
            ->visit(route('dashboard_path'))
            ->seePageIs(route('dashboard_path'));
    }
}
