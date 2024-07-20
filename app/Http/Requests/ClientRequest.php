<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'         => 'required|string',
            'surname'      => 'required|string',
            'car_model'    => 'required|string',
            'car_number'   => 'required|string|unique:clients',
            'email'        => 'required|string',
            'phone_number' => 'required|string',
            'order_id'     => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'car_number.unique' => __('translations.errors.carNumberUnique'),
            'name.string' => 'Поле имя должно быть строкой.',
            'name.max' => 'Поле имя не должно превышать 255 символов.',
            'email.required' => 'Поле email обязательно для заполнения.',
            'email.email' => 'Поле email должно быть действительным адресом электронной почты.',
            'email.unique' => 'Пользователь с таким email уже существует.',
            'password.required' => 'Поле пароль обязательно для заполнения.',
            'password.min' => 'Поле пароль должно содержать не менее 6 символов.',
            'password.confirmed' => 'Поле подтверждение пароля не совпадает.',
        ];
    }
}
