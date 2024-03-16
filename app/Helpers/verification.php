<?php

if (! function_exists('random_code')) {
    /**
     * Get random number code of a given digits count.
     */
    function random_code(int $digitsCount): int
    {
        return rand(
            pow(10, $digitsCount - 1) - 1,
            pow(10, $digitsCount) - 1,
        );
    }
}
