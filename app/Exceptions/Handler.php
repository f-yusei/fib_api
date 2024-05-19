<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function invalidJson($request, ValidationException $exception)
    {
        $errors = $exception->errors();
        
        $status = 422;
        if (array_key_exists('n', $errors) && in_array('パラメータnは必須です。', $errors['n'])) {
            $status = 400;
        }

        return response()->json([
            'status' => 'error',
            'errors' => $errors
        ], $status);
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return $this->invalidJson($request, $exception);
        }

        return parent::render($request, $exception);
    }
}
