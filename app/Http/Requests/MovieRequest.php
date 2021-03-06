<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'year' => ['sometimes', 'integer', 'max:' . (date('Y') + 10)],
            'synopsis' => ['sometimes', 'string', 'min:1', 'max:255'],
            'runtime' => ['sometimes', 'integer', 'min:1', 'max:600'],
            'released_at' => ['sometimes', 'date_format:d/m/Y'],
            'cost' => ['sometimes', 'integer'],
        ];
    }
}
