<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //これがとてもとても大事でとても大事
    }

    public function rules(): array
    {
        return [
            'content'=>['required','string']
        ];
    }
    public function messages(){
        //LV50 STEP3 123ページを参考
        return [
            'content.required'=>"コメントは必ず入力してください",

        ];
    }
}
