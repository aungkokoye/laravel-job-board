<?php

namespace App\Http\Requests;

use App\Models\Job;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MyJobRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title"         => "required|string|max:255",
            "description"   => "required| string",
            "salary"        => "required|integer|min:5000|max:150000",
            "location"      => "required|string|max:255",
            "experience"    => "required|string|in:" . implode(',', Job::$experiences),
            "category"      => "required|string|in:" . implode(',', Job::$categories),
        ];
    }
}
