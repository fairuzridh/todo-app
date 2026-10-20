<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'         => ['required', 'string', 'max:255'], //'required|string|max:255',
            'description'   => ['nullable', 'string'], //'nullable|string',
            'status'        => ['nullable', 'in:pending,in_progress,done'], //'nullable|in:pending,in_progress,done',
            'due_date'      => ['nullable', 'date', 'after_or_equal:today'], //'nullable|date|after_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Judul task wajib diisi',
            'title.max'                 => 'Judul tidak boleh melebihi 255 karakter',
            'status.in'                 => 'Status harus salah satu dari: pending, in progress, done',
            'due_date.date'             => 'Format tanggal tidak valid',
            'due_date.after_or_equal'   => 'Tanggal deadline tidak boleh di masa lalu',
        ];
    }
}
