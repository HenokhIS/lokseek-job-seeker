<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST': {
                return [
                    'company_name' => 'required',
                    'banner' => ['required','mimes:jpeg,jpg,png', 'max:2048'],
                    'detail' => 'required',
                    'requirement' => 'required',
                    'no_telp' => 'nullable',
                    'url' => 'nullable',
                    'email' => 'required',
                    'status' => 'required',
                    'category_id' => 'required',
                    'location_id' => 'required',
                    'tags' => 'required',
                    'paycheck' => 'nullable',
                    'exp_date' => ['required', 'date'],
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'company_name' => ['required', 'unique:jobs,company_name,'. $this->route()->job->id],
                    'banner' => ['image', 'mimes:jpeg,jpg,png', 'max:2048'],
                    'detail' => 'required',
                    'requirement' => 'required',
                    'no_telp' => 'nullable',
                    'url' => 'nullable',
                    'email' => 'required',
                    'status' => 'required',
                    'category_id' => 'required',
                    'location_id' => 'required',
                    'tags' => 'required',
                    'paycheck' => 'nullable',
                    'exp_date' => ['required', 'date'],
                ];
            }
            default:
                break;
        }
    }
}
