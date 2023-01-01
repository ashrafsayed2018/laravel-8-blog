<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            "cover_image"         => ['sometimes', 'nullable', 'mimes:jpeg,jpg,png', 'max:5120'],
            'title'               => ['required', 'min:5', "max:50", 'unique:posts,title,' . $this->post->id],
            'body'             => ['required', 'min:5', "max:500", 'unique:posts,body,' . $this->post->id],
            "category_id"      => ['required', 'numeric'],
            "tags"             => ['required'],
            "published_at"     => ['required'],
            "meta_description" => ['required', 'min:5']
        ];
    }
}
