<?php

namespace Codeboxr\RedxCourier\Facade;

use Illuminate\Support\Facades\Facade;
use Codeboxr\RedxCourier\Manage\Manage;

/**
 * @method static mixed area()
 * @method static mixed store()
 * @method static mixed order()
 * @see Manage
 */
class RedxCourier extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'redxcourier';
    }
}
