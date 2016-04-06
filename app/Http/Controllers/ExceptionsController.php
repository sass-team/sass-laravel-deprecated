<?php

namespace App\Http\Controllers;

/**
 * Class ExceptionsController.
 */
class ExceptionsController extends Controller
{
    public function notFound()
    {
        return 404;
    }
}
