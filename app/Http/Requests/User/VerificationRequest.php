<?php

namespace App\Http\Requests\User;

use App\Actions\User\FindByAction;
use App\Models\Verification;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class VerificationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'phone' => ['required', 'string', 'exists:users,phone'],
            'code' => ['required', 'digits:4'],
        ];
    }

    /**
     * After validation hook.
     */
    public function withValidator(Validator $validator): void
    {
        if ($validator->errors()->any()) {
            return;
        }

        $validator->after(function () use ($validator) {
            $this->validateVerificationCode($validator);
        });
    }

    /**
     * Validate user verification code.
     *
     * @throws ValidationException
     */
    protected function validateVerificationCode(Validator $validator): void
    {
        $verification = Verification::filter([
            'code' => $this->input('code'),
            'phone' => $this->input('phone'),
            'fromCreatedAt' => now()->subMinutes(5),
        ])->first();

        if ($verification) {
            return;
        }

        $validator->errors()->add('code', __('message.invalid_verification_code'));

        $this->failedValidation($validator);
    }
}
