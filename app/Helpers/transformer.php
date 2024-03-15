<?php

use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Arr;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\TransformerAbstract;
use Spatie\Fractal\Fractal;

if (! function_exists('fractal_data')) {
    /**
     * Get a transformed data result from a data set with given transformer.
     */
    function fractal_data(mixed $data, TransformerAbstract $transformer, array $includes = []): array
    {
        return $data instanceof AbstractPaginator ?
            fractal_paginated($data, $transformer, $includes) :
            fractal_non_paginated($data, $transformer, $includes);
    }
}

if (! function_exists('fractal_paginated')) {
    /**
     * Get a transformed paginated data result from a data set with given transformer.
     */
    function fractal_paginated(mixed $data, TransformerAbstract $transformer, array $includes = []): array
    {
        return Arr::only(
            fractal_with($data, $transformer, $includes)
                ->paginateWith(new IlluminatePaginatorAdapter($data))
                ->toArray(),
            ['data', 'meta'],
        );
    }
}

if (! function_exists('fractal_non_paginated')) {
    /**
     * Get a transformed non paginated data result from a data set with given transformer.
     */
    function fractal_non_paginated(mixed $data, TransformerAbstract $transformer, array $includes = []): array
    {
        return fractal_with($data, $transformer, $includes)->toArray();
    }
}

if (! function_exists('fractal_with')) {
    /**
     * Get a transformed non paginated data result from a data set with given transformer.
     */
    function fractal_with(mixed $data, TransformerAbstract $transformer, array $includes = []): Fractal
    {
        return fractal($data, $transformer)
            ->serializeWith(new ArraySerializer())
            ->parseIncludes($includes);
    }
}
