<?php

namespace App\Http\Requests\User;

use App\Actions\User\FindByAction;
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
        $user = FindByAction::exec(
            ['phone' => $this->input('phone')],
            ['id'],
            ['verification'],
        );

        if ($user->verification->code === $this->input('code')) {
            return;
        }

        $validator->errors()->add('code', __('message.invalid_verification_code'));

        $this->failedValidation($validator);
    }
}
