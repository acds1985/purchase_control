<?php

namespace PurchaseControl;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status','level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //RELACIONAMENTO DE TABELA
    public function branches()
    {
        return $this->hasMany(Branches::class,'user','id');
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ($value == true || $value == 'on' ? 1 : 0);
    }

    public function setLevelAttribute($value)
    {
        $this->attributes['level'] = ($value == 2 ? 2 : 1);
    }

    public function setPasswordAttribute($value)
    {
        if (empty($value)) {
            unset($this->attributes['password']);
            return;
        }

        $this->attributes['password'] = bcrypt($value);
    }

    
}
