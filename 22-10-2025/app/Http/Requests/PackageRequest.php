<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // must be true to allow validation to run
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'price'         => 'required|numeric|min:0',
            'duration_type' => 'required|in:monthly,quarterly,half_yearly,yearly',
            'duration_in_days' => 'required|integer|min:1',
            'status'        => 'sometimes|boolean',
            'is_featured'   => 'sometimes|boolean',
            'features'      => 'nullable|array', // JSON string or comma-separated text
            'button_text'   => 'nullable|string|max:255',
            'currency'      => 'nullable|string|max:10',
            'highlight_badge' => 'nullable|string|max:50',
            'icon'          => 'nullable|string|max:255',
            'order'         => 'nullable|integer',
        ];
    }
}
