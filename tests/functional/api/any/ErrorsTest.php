<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  27/03/16
 */
namespace Tests\functional\api\any;

use Tests\TestCase;

/**
 * Class ErrorsTest.
 */
class ErrorsTest extends TestCase
{
    /** @test */
    public function it_404s()
    {
        $this
            ->get('api/non-existent')
            ->seeJsonEquals([
                'error' => [
                    'message'     => 'Not Found.',
                    'status_code' => 404,
                ],
            ])->assertResponseStatus(404);
    }
}
