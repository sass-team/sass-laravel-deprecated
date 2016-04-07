<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 06/04/16
 */
namespace Tests\functional\any;

use App\Sass\Repositories\LandingPage\DbLandingPageRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class LandingPageTest.
 */
class LandingPageTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_reads_contents()
    {
        $dbLandingPageRepository = new DbLandingPageRepository();
        $landingPage = $dbLandingPageRepository->active();

        $this->visit(route('landing_page'))
            ->seePageIs(route('landing_page'))
            ->see('<title>SASS App</title>')
            ->see("<h1>$landingPage->title</h1>")
            ->see("$landingPage->home_description")
            ->see($landingPage->home_access_button)
            ->see('<a href="'.route('login.get').'" class="btn btn-dark btn-lg">'.$landingPage->home_access_button.'</a>');
    }
}