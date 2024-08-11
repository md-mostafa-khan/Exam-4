<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FMRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[\pL\s]+$/u', 'not_in:admin'],
            'email' => 'required|email|unique:contacts',
            'phone' => 'nullable|string|max:20|min:11|unique:contacts',
            'address' => 'nullable|string|max:255',
        ];
    }

    function messages()
    {
        return [
            'name.required' => " একটা নাম লিখুন",
            'name.min' => 'নাম কমপক্ষে ২ অক্ষর থাকবে',
            'email.required' => 'অবশ্যয় ইমেইল লিখতে হবে',
            'name.regex' => 'অবশ্যয় নাম লিখতে হবে',
            'name.not_in' => 'একটা ব্যবহারকারী নাম ব্যবহার করুন',
            'email.unique' => 'এই ইমেইল ইতিমধ্যে ব্যবহৃত হয়েছে',
            'phone.min' => 'ফোন নাম্বার ১১ অক্ষরের বেশি হতে হবে',
            'phone.unique' => 'এই ফোন নাম্বার ইতিমধ্যে ব্যবহৃত হয়েছে',



        ];
    }
}
