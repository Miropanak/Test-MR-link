<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
//        \Symfony\Component\HttpKernel\Exception\HttpException::class,
//        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     * @param  Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof \ErrorException) {
            return response()->json("500 Internal Server Error", 500);

        }
        else if ($this->isHttpException($exception)){
            if($exception instanceof NotFoundHttpException){
                return response()->json("HTTP/1.0 404 Not Found", 404);
            }
            return $this->renderHttpException($exception);
        }
        return parent::render($request, $exception);
    }

    /**
 * Convert an authentication exception into an unauthenticated response.
 *

     * @param  Request  $request
 * @param AuthenticationException $exception
 * @return JsonResponse
 */

    protected function unauthenticated($request, AuthenticationException $exception)

    {
        $response = ['status' => 'error','message' => 'You passed invalid token'];

        return response()->json($response, 403);
    }

}
