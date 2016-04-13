<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  21/03/16
 */
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responders\Api\ApiResponder;

/**
 * Class ApiController.
 *
 * @codeCoverageIgnore
 */
abstract class ApiController extends Controller
{
    use ApiResponder;
}
