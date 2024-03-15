<?php

namespace App\Http\Transformers;

use App\Models\Admin;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * Transform a given model.
     */
    public function transform(User $user): array
    {
        return [
            'id' => $user->getAttribute('id'),
            'username' => $user->getAttribute('username'),
            'phone' => $user->getAttribute('phone'),
            'email' => $user->getAttribute('email'),
        ];
    }
}
