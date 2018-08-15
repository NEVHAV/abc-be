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
        return str_slug($name, '-') . '-' . $expand . '.html';
    }

    public static function removeHtmlTag($content)
    {
        $content = str_replace('.</p>', "</p>", $content);
        $content = str_replace('</p>', ".</p>", $content);
        $content = strip_tags($content);

        $content = str_replace('&nbsp;', '', $content);
        $content = str_replace('&amp;', '&', $content);
        $content = str_replace('&lt;', '<', $content);
        $content = str_replace('&gt;', '>', $content);
        $content = str_replace('&quot;', '"', $content);
        $content = str_replace('&#39;', "'", $content);
        $content = str_replace('.', ". ", $content);

        $content = trim($content);
        return str_limit($content, 200);
    }
}
