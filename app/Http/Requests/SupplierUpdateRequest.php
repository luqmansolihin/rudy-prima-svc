<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|min:3|max:100',
            'kontak_person' => 'required|string|min:3|max:100',
            'telepon' => 'required|numeric|digits_between:10,15',
            'alamat' => 'required|string|min:3|max:500',
        ];
    }
}
