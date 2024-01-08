<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Employee
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property int $users_id
 * @property int $companies_id
 *
 * @property Company $company
 * @property User $user
 * @property Collection|Schedule[] $schedules
 * @property Collection|Service[] $services
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'emloyees';
	public $timestamps = false;

	protected $casts = [
		'birth_date' => 'datetime',
		'users_id' => 'int',
		'companies_id' => 'int'
	];

	protected $fillable = [
		'first_name',
		'last_name',
        'address',
		'users_id',
		'companies_id'
	];

	public function company()
	{
		return $this->belongsTo(Company::class, 'companies_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function schedules(): HasMany
    {
		return $this->hasMany(Schedule::class, 'emloyees_id');
	}

	public function services(): HasMany
    {
		return $this->hasMany(Service::class, 'emloyees_id');
	}
}
