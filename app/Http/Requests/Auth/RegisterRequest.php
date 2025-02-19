<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan membuat permintaan ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi untuk registrasi.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'captcha' => ['required', 'string'], // ✅ Tambahkan validasi CAPTCHA
        ];
    }

    /**
     * Validasi CAPTCHA sebelum registrasi diproses.
     */
    public function validateCaptcha(): void
    {
        if ($this->input('captcha') !== Session::get('captcha')) {
            throw ValidationException::withMessages([
                'captcha' => __('CAPTCHA tidak valid'),
            ]);
        }

        Session::forget('captcha'); // ✅ Hapus CAPTCHA dari session setelah diverifikasi
    }
}
