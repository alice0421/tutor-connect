<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
            'nickname' => ['string', 'max:255'],
            'is_name_public' => 'required',
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'gender' => 'required',
            'grade' => 'required',
            'preferred_class_per_day' => '',
            'preferred_studying_day_per_week' => '',
            'purpose' => '',
        ];
    }
}
