<?php

/**
 * @author Rizart Dokollar <r.dokollari@gmail.com
 * @since 4/19/16
 */
namespace Tests\functional\guest;

use Tests\TestCase;

class DashboardTest extends TestCase
{
    /** @test */
    public function it_denies_access()
    {
        $this->visit(route('dashboard_path'))
            ->seePageIs(route('login.get'));
    }
}