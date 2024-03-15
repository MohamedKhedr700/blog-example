<?php

namespace App\Actions\Core;

abstract class Action
{
    /**
     * Execute the action statically.
     */
    public static function exec(...$arguments)
    {
        return (new static())->execute(...$arguments);
    }
}
