<?php

namespace App\Actions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory;
use Illuminate\Validation\Validator;

class CreateValidatorUsingFormRequest
{
    public function __construct(protected Factory $factory)
    {
    }

    public function handle(array $request, FormRequest $formRequest): Validator
    {
        return $this->factory->make(
            data: $request,
            rules: method_exists($formRequest, 'rules') ? $formRequest->rules() : [],
            messages: method_exists($formRequest, 'messages') ? $formRequest->messages() : [],
            attributes: method_exists($formRequest, 'attributes') ? $formRequest->attributes() : []
        );
    }
}
