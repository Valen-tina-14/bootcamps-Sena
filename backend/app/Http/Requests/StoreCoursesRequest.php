<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreCoursesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "required|max:30",
            "description" => "required|min:10",
            "weeks" => "required|max:9",
            "enroll_cost" => "numeric",
            "minimum_skill" => "in:beginner,intermediate,advanced,expert",
            "bootcamp_id" => "exists:bootcamp,id"
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
};
