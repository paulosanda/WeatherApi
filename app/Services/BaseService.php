<?php

namespace App\Services;


use Illuminate\Support\Facades\Validator;

abstract class BaseService
{
    /**
     * Get the validation rules that apply to the service.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Get the validation messages that apply to the service.
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }

    /**
     * Validate all datas to execute the service.
     *
     * @param array $data
     * @return bool
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validate(array $data): bool
    {

        Validator::make($data, $this->rules(), $this->messages())
            ->validate();

        return true;
    }
}