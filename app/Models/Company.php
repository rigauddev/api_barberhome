<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $cnpj
 * @property string|null $phone
 * @property int|null $activated
 * @property string|null $social_link
 * @property string|null $latitude
 * @property string|null $longitude
 *
 * @property Collection|Employee[] $emloyees
 *
 * @package App\Models
 */
class Company extends Model
{
	protected $table = 'companies';
	public $timestamps = false;

	protected $casts = [
		'activated' => 'int'
	];

	protected $fillable = [
		'name',
		'cnpj',
		'phone',
		'activated',
		'social_link',
		'latitude',
		'longitude'
	];

	public function emloyees()
	{
		return $this->hasMany(Employee::class, 'companies_id');
	}
}
