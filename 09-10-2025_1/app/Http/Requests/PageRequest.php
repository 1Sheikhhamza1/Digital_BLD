<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Must be true to allow validation to run
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'  => 'required|string|max:255',
            'parent_id'  => 'nullable|numeric',
            'content' => 'nullable|string',
            'icon'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'page_structure' => 'required|in:Text,Page,URL',
            'connected_page' => 'nullable|exists:modules,name',
            'external_url'   => 'nullable|url',
            'homepage_display' => 'nullable|in:0,1',
            'menu_type' => 'required|in:Main Menu,Footer Menu',
            'why_choose'       => 'nullable|in:0,1',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ];
    }
}
