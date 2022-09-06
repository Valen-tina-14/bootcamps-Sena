<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBootcampRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|min:5",
            "description" => "required",
            "website" => "required",
            "phone" => "required",
            "average_cost" => "numeric",
            "users_id" => "exists:users, id"
        ];
    }
    /**
     * enviar response en caso de validacion fallida
     */
    protected function failedValidation(Validator $v){
        //lanzar una excepcion HttpResponse caso de errores de validacion
        throw new HttpResponseException(response()->json([
                                                            "success" => false,
                                                            "errors" => $v->errors()
                                                        ] , 422) );
        

    }
}
