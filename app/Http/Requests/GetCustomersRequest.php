<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class GetCustomersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $cpf = str_replace(".", "", $this->cpf);
        $cpf = str_replace("-", "", $cpf);

        $this->merge([
            'cpf' => $cpf,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'cpf' => 'unique:customers,cpf|min:11|max:11|cpf',
            'name' => 'max:255',
            'birth' => 'date',
            'gender' => 'in:M,F',
            'address' => 'max:255',
            'city_id' => 'exists:cities,id'
        ];
    }
}