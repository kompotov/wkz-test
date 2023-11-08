<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
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

    /**
     * @param $request
     * @param Throwable $e
     * @return JsonResponse|RedirectResponse|\Illuminate\Http\Response|Response
     * @throws Throwable
     *  If the closure given to the renderable method does not return a value,
     *  Laravel's default exception rendering will be utilized
     */
    public function render($request, Throwable $e): JsonResponse|RedirectResponse|\Illuminate\Http\Response|Response
    {
        if ($e instanceof ModelNotFoundException) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'message' => "Unable to locate the {$this->prettyModelNotFound($e)} you requested"
                ], Response::HTTP_NOT_FOUND);
            }
        }

        return parent::render($request, $e);
    }

    private function prettyModelNotFound(ModelNotFoundException $exception): string
    {
        if (! is_null($exception->getModel())) {
            return Str::lower(ltrim(preg_replace('/[A-Z]/', ' $0', class_basename($exception->getModel()))));
        }

        return 'resource';
    }
}
