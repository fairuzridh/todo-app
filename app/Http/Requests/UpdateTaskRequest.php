<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Override;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'         => 'sometimes|string|max:255',
            'description'   => 'sometimes|nullable|string',
            'status'        => 'sometimes|in:pending,in_progress,done',
            'due_date'      => 'sometimes|nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'titel.max'     => 'Judul tidak boleh melebihi 255 karakter',
            'status.in'     => 'Status harus salah satu dari: pending, in progress, done',
            'due_date.date' => 'Format tanggal tidak valid',
        ];
    }
}
