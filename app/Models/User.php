<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string|null $phone
 * @property int|null $activated

 *
 * @property Collection|Employee[] $emloyees
 * @property Collection|Schedule[] $schedules
 *
 * @package App\Models
 */
class User extends  Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $table = 'users';
	public $timestamps = false;

	protected $casts = [
		'date_birth' => 'datetime',
		'activated' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'email',
		'password',
		'phone',
		'activated',

	];

    //JWT
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

	public function emloyees()
	{
		return $this->hasMany(Employee::class, 'users_id');
	}

	public function schedules()
	{
		return $this->hasMany(Schedule::class, 'users_id');
	}
}
