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
 * Class LandingPageTest
 * @package Tests\functional\any
 */
class LandingPageTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_reads_sidebar_contents()
    {
        $dbLandingPageRepository = new DbLandingPageRepository();
        $landingPage = $dbLandingPageRepository->active();

        $this->visit(route('landing_page'))
            ->see("<a href=\"#top\" onclick=\"$('#menu-close').click();\">SASS App</a>")
            ->see("<a href=\"#top\" onclick=\"$('#menu-close').click();\">$landingPage->home_title</a>");
    }

    /** @test */
    public function it_reads_contents()
    {
        $dbLandingPageRepository = new DbLandingPageRepository();
        $landingPage = $dbLandingPageRepository->active();

        $this->visit(route('landing_page'))
            ->seePageIs(route('landing_page'))
            ->see("<h1>$landingPage->title</h1>")
            ->see("$landingPage->home_description")
            ->see($landingPage->home_access_button)
            ->see('<a href="'.route('login.get').'" class="btn btn-dark btn-lg">'.$landingPage->home_access_button.'</a>');
    }
}