<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;


class BlogMailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email', // E-posta alanı, zorunlu ve geçerli bir e-posta olmalıdır.
            'subject' => 'required|string', // Konu alanı, zorunlu ve bir metin olmalıdır.
            'message' => 'required|string', // Mesaj alanı, zorunlu ve bir metin olmalıdır.
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = new JsonResponse([
            'success' => false,
            'message' => 'Formda hatalar var. Lütfen doğru bilgileri girin.',
            'errors' => $validator->errors(),
        ], 422);

        throw new HttpResponseException($response);
    }

}
