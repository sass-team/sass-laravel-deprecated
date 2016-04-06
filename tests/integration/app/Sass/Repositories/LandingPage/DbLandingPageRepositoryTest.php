<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 06/04/16
 */
namespace Tests\integration\app\Sass\Repositories\LandingPage;

use App\Sass\Repositories\LandingPage\DbLandingPageRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class DbLandingPageRepositoryTest.
 */
class DbLandingPageRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_fetches_active_landing_page()
    {
        $dbLandingPageRepository = new DbLandingPageRepository();

        $landingPage = $dbLandingPageRepository->active();

        $this->assertSame(1, $landingPage->active);
    }
}
