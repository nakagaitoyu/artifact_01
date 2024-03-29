<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'anime.name'=> 'required|string|max:100',
            'character.name'=> 'required|string|max:100',
            'song.name'=> 'required|string|max:100',
            'song.artist'=>'required|string|max:100',
            'post.review'=>'required|string|max:1000',
        ];
    }
}
