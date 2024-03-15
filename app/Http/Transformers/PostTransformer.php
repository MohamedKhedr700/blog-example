<?php

namespace App\Http\Transformers;

use App\Models\Post;
use League\Fractal\Resource\Primitive;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    /**
     * {@inheritdoc}
     */
    protected array $defaultIncludes = [
        'user',
    ];

    /**
     * Transform a given model.
     */
    public function transform(Post $post): array
    {
        return [
            'id' => $post->getAttribute('id'),
            'title' => $post->getAttribute('title'),
            'description' => $post->getAttribute('description'),
            'phone' => $post->getAttribute('phone'),
        ];
    }

    /**
     * Include a post user.
     */
    protected function includeUser(Post $post): Primitive
    {
        return $this->primitive($post->user, function ($item) {
            return [
                'id' => $item->id,
            ];
        });
    }
}
