<?php

namespace App\Http\Requests\Admin\News;


use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer'],
            'title' => ['required', 'string', 'min:3', 'max:150'],
            'author' => 'required|string|between:2,50',
            'text' => ['nullable', 'string','between:2,300'],
            'isPrivate' => ['nullable','digits:1'],
            'created_at' => 'after_or_equal:today'
        ];
    }
}
