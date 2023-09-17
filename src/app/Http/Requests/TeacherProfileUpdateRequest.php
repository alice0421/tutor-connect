<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeacherProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'family_name' => ['required', 'string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(Teacher::class)->ignore($this->user()->id)],
            'gender' => 'required',
            'affiliation' => ['required', 'string', 'max:255'],
            'grade' => 'required',
            'teaching_history' => '',
            'achievement' => '',
            'introduction' => '',
        ];
    }
}
