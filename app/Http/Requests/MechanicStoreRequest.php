<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MechanicStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|min:3|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'tanggal_bergabung' => 'required|date|after:tanggal_lahir',
            'keahlian' => 'required|string|min:3|max:100',
            'status' => 'required|in:active,inactive',
        ];
    }
}
