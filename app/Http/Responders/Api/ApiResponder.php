<?php
/**
 * @author Rizart Dokollar <r.dokollari@gmail.com
 * @since 4/13/16
 */
namespace App\Http\Responders\Api;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponses;

trait ApiResponder
{
    /**
     * @var int
     */
    protected $statusCode = HttpResponses::HTTP_OK;

    /**
     * @api           {any} /api/non-existent-url 404
     *
     * @apiPermission none
     * @apiVersion    1.0.0
     * @apiName       RequestResource
     * @apiGroup      Exceptions
     * @apiExample {curl} Example usage:
     *      curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X GET "http://sass-stage.herokuapp.com/api/non-existent" | json
     *
     * @apiSuccessExample {json} NotFound-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *          "error": {
     *              "message": "Not Found.",
     *              "status_code": 404
     *          }
     *     }
     */

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found.')
    {
        return $this->setStatusCode(HttpResponses::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param $message
     *
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message'     => $message,
                'status_code' => $this->getStatusCode(),
            ],
        ]);
    }

    /**
     * @param       $data
     * @param array $headers
     *
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     *
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondUnprocessableEntity($message = 'Parameters validation failed.')
    {
        return $this->setStatusCode(HttpResponses::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondTokenExpired($message = 'Token Expired')
    {
        return $this->setStatusCode(HttpResponses::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondTokenInvalid($message = 'Invalid Token.')
    {
        return $this->setStatusCode(HttpResponses::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondInternalServerError($message = 'Internal Server Error.')
    {
        return $this->setStatusCode(HttpResponses::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    /**
     * @param Paginator $paginatorData
     * @param           $data
     *
     * @return mixed
     */
    public function respondWithPagination(Paginator $paginatorData, $data)
    {
        $data = array_merge($data, [
            'paginator' => [
                'total_count'   => count($paginatorData->items()),
                'total_pages'   => ceil(count($paginatorData->items()) / $paginatorData->perPage()),
                'current_page'  => $paginatorData->currentPage(),
                'limit'         => $paginatorData->count(),
                'next_page_url' => $paginatorData->nextPageUrl(),
            ],
        ]);

        return $this->respond($data);
    }

    public function respondUnauthenticated($message = 'Authentication required.')
    {
        return $this->setStatusCode(HttpResponses::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    public function respondUnauthorized($message = 'Authorization required.')
    {
        return $this->setStatusCode(HttpResponses::HTTP_FORBIDDEN)->respondWithError($message);
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function respondWithSuccess($data)
    {
        return $this->respond([
            'status_code' => $this->getStatusCode(),
            'data'        => $data,
        ]);
    }

    public function respondApiLimitExceeded($message = 'Too many Api calls.')
    {
        return $this->setStatusCode(HttpResponses::HTTP_TOO_MANY_REQUESTS)->respondWithError($message);
    }

    private function respondTokenMissing($message = 'Token is missing.')
    {
        return $this->setStatusCode(HttpResponses::HTTP_BAD_REQUEST)->respondWithError($message);
    }
}
