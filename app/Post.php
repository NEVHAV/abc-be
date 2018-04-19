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

class Post extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_sub', 'id_post', 'title', 'content', 'cover'
    ];
}