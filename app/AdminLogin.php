<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;

class AdminLogin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
           'first_name','second_name','last_name', 'email', 'password','gender','slug','active','activation_token','user_type','category',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function scopeByActivationColumns(Builder $builder, $email, $token)
    {
        return $builder->where('email',$email)->where('activation_token',$token);
    }

    public function vacancies(){
return $this->hasMany('App\Vacancy');

    }
}
