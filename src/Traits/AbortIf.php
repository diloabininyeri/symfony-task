<?php

namespace App\Traits;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait AbortIf
{
    public function abortIf(bool $condition, string $message = 'page not found'): void
    {
        if ($condition) {
            throw new NotFoundHttpException($message);
        }
    }
}
