<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePhotoRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'photo_name' => 'required|min:3',
            'album_name' => 'required|min:3',
            'photo' => 'required|mimes:jpeg'
        ];
    }
}
