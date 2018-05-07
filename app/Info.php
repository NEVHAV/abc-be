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

class Info extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone_number',
        'hotline',
        'logo_url',
        'company_name_vn',
        'company_slogan_vn',
        'company_name_jp',
        'company_slogan_jp',
        'footer_vn',
        'footer_jp',
        'supporter_name',
        'supporter_phone_number',
        'supporter_email',
    ];
}