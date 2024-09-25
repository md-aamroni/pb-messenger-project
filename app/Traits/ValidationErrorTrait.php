<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

trait ValidationErrorTrait
{
    /**
     * Validate the class instance
     * @param  Validator             $validator
     * @return void
     * @throws HttpResponseException
     */
    public function failedValidation(Validator $validator): void
    {
        $onErrors = collect(value: $validator->errors())->map(callback: fn ($i) => current($i))->toArray();
        $response = response(content: ['message' => 'Request validation error', 'errors' => $onErrors], status: Response::HTTP_UNPROCESSABLE_ENTITY);
        throw new HttpResponseException(response: $response);
    }
}
