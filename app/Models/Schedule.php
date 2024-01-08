<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 *
 * @property int $id
 * @property Carbon $scheduling_date
 * @property int $users_id
 * @property int $emloyees_id
 * @property int $services_id
 *
 * @property Employee $emloyee
 * @property Service $service
 * @property User $user
 *
 * @package App\Models
 */
class Schedule extends Model
{
	protected $table = 'schedules';
	public $timestamps = false;

	protected $casts = [
		'scheduling_date' => 'datetime',
		'users_id' => 'int',
		'emloyees_id' => 'int',
		'services_id' => 'int'
	];

	protected $fillable = [
		'scheduling_date',
		'users_id',
		'emloyees_id',
		'services_id'
	];

	public function emloyee()
	{
		return $this->belongsTo(Employee::class, 'emloyees_id');
	}

	public function service()
	{
		return $this->belongsTo(Service::class, 'services_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
