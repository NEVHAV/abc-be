<?php
/**
 * Created by PhpStorm.
 * User: NEVHAV
 * Date: 18/04/18
 * Time: 23:10
 */
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Subcategory extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_cate',
        'id_sub',
        'name_vn',
        'name_jp',
    ];
}