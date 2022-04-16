<?php


namespace App\Core\Abstracts;


use App\Core\Exceptions\FailedValidationExeption;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;
use Illuminate\Http\Response;

abstract class RequestJSON extends LaravelFormRequest
{

    abstract public function rules(): array;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    protected function failedValidation(Validator $validator)
    {
        throw new FailedValidationExeption($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
