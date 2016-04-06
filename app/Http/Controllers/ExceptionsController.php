<?php

namespace App\Http\Controllers;

class ExceptionsController extends Controller
{
    public function notFound()
    {
        return 404;
    }
}
