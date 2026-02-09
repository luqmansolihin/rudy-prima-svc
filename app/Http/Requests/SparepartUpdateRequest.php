<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SparepartUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|min:2|max:100',
            'part_number' => 'required|string|unique:spareparts,part_number|min:2|max:50',
            'harga_beli' => 'required|decimal:0,2|min:0',
            'harga_jual' => 'required|decimal:0,2|min:0'
        ];
    }
}
