<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Orders;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname', 'phone', 'address', 'city', 'zip', 'country', 'birthdate', 'id', 'admin', 'id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullName(){
        return $this->name.' '. $this->surname;
    }


    public function orders(){
        return $this->belongsToMany(App\Order::class);
    }
    public function isAdmin()
    {
    return $this->admin=='on'; // this looks for an admin column in your users table
    }

}
