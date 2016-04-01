<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class ExceptionsController extends Controller
{
    public function notFound()
    {
        return 404;
    }
}
