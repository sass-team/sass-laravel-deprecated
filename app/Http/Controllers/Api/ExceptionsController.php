<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  27/03/16
 */
namespace App\Http\Controllers\Api;

/**
 * Class ExceptionsController.
 */
class ExceptionsController extends ApiController
{
    /**
     * @param null $message
     * @return mixed
     */
    public function tokenExpired($message = null)
    {
        return $this->respondTokenExpired($message);
    }

    /**
     * @param null $message
     * @return mixed
     */
    public function internalServer($message = null)
    {
        return $this->respondInternalServerError($message);
    }

    /**
     * @return mixed
     */
    public function notFound()
    {
        return $this->respondNotFound();
    }
}
