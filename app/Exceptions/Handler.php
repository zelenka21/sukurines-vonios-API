<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // if ($exception instanceof ModelNotFoundException && $request->wantsJson()) {
        // return response()->json(['error' => 'Resource not found'], 404);
        // }
        // return parent::render($request, $exception);
      //  return parent::render($request, $exception);


        if ($exception instanceof ModelNotFoundException) {
        return response()->json([
            'error' => 'entry for '.str_replace('App\\', '', $exception->getModel()).' not found'], 404);
        }
       
       if($request->expectsJson()) 
        {

        if($exception instanceof UnauthorizedHttpException) {

          return response()->json('Unauthorized', 403);

        }
        if($exception instanceof AccessDeniedHttpException) {

          return response()->json('This action is unauthorized.', 403);

        }

            



        }



    return parent::render($request, $exception);
    }
}
