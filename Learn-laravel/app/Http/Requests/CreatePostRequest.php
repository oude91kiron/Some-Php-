<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
     * import this class to the controller so rules be applied.
     * @return array
     */
    public function rules()
    {
        return [
            // Rules to validate data 

        'title'=>'required|max:16',
        'content'=>'required|max:50'

        ];
    }
}

