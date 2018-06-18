<?php
/**
 * Created by PhpStorm.
 * User: isling
 * Date: 09/05/2018
 * Time: 01:16
 */

namespace App\Http\Helpers;

use Carbon\Carbon;

class ControllerHelper
{
    public static function slug($name)
    {
        return str_slug($name, '-');
    }

    public static function slugUnique($name)
    {
        $expand = substr(base_convert(time(), 10, 36) . md5(microtime()), 0, 8);
        return str_slug($name, '-') . '-' . $expand;
    }
}
