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
        $utime = Carbon::now()->timestamp;
        return str_slug($name, '-') . '-' . $utime;
    }
}
