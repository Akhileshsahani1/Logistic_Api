<?php

namespace Modules\Api\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use App\Traits\ResponseTrait;

class RegisterRequest extends FormRequest
{
    use ResponseTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
               'firstName'         => 'required|max:100|string',
               'lastName'         => 'required|max:100|string',
                'email'         => 'required|email|regex:^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^|unique:users|max:254',
                'password'      => 'required|min:6|max:20',
                   // 'confirmPassword'=>'required|min:6|max:20',
                'phone'=>'required|regex:/^[0-9]{10}$/|unique:users',
                ];
    }
    public function messages()
    {
        return [
                  'firstName.required' => "FirstName field is required" ,
                  'firstName.max' => "FirstName must not exceed 100 characters" ,
                  'lastName.required' => "LastName field is required" ,
                  'lastName.max' => "LastName must not exceed 100 characters" ,
                  'email.required' => "Email field is required" ,
                   'email.max' => "Email must not exceed 254 characters" ,
                   'password'=>"Password field is required",
                   'password.max'=>"Password must not exceed 20 characters",
                   'password.min'=>"Password must not less than 6 characters",

                   // 'confirmPassword'=>"password field is required",
                   // 'confirmPassword.max'=>"password must not exceed 20 characters",
                   // 'confirmPassword.min'=>"password must not less 6 characters",
        ];
    }
    

    
    public function failedValidation(Validator $validator){
        $errors = (new ValidationException($validator))->errors();
        $this->setErrors($errors);
        $this->setMessage('Some error occur');
        throw new HttpResponseException($this->toResponse());
    }
}
