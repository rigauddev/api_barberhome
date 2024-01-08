<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $const
 * @property int $emloyees_id
 *
 * @property Employee $emloyee
 * @property Collection|Schedule[] $schedules
 *
 * @package App\Models
 */
class Service extends Model
{
	protected $table = 'services';
	public $timestamps = false;

	protected $casts = [
		'const' => 'float',
		'emloyees_id' => 'int'
	];

	protected $fillable = [
		'name',
		'const',
		'emloyees_id'
	];

	public function emloyee()
	{
		return $this->belongsTo(Employee::class, 'emloyees_id');
	}

	public function schedules()
	{
		return $this->hasMany(Schedule::class, 'services_id');
	}
}
