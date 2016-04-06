<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 06/04/16
 */
namespace Tests\functional\any;

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
    public function it_reads_contents()
    {
       $this->visit(route('landing_page'))
           ->seePageIs(route('landing_page'));
//           ->see()
    }
}