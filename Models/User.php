<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'phone',
        
        'password',
    ];
    protected $table = 'users';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	/**
	 * 
	 * @return mixed
	 */
	function getTable() {
		return $this->table;
	}
	
	/**
	 * 
	 * @param mixed $table 
	 * @return User
	 */
	function setTable($table): self {
		$this->table = $table;
		return $this;
	}

    /**
     * defining the one-to-one relation with orders
     */

     public function order(){
         return $this->hasOne(order::class);
     }

}
