<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsetRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "user_id" => "string",
            "asset_type" => "string|required",
            "asset_name" => "string|required",
            "acquisition_date" => "required",
            "acquisition_cost" => "required",
            "estimated_useful_life_years" => "required",
            "description" => "string",
        ];
    }
}
