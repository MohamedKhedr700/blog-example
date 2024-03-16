<?php

namespace App\Http\Transformers;

use App\Models\Post;
use League\Fractal\Resource\Item;
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
        ];
    }

    /**
     * Include a post user.
     */
    protected function includeUser(Post $post): Item
    {
        return $this->item($post->user, new UserTransformer);
    }
}
