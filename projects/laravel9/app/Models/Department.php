<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

	/**
	 * The users that belong to the department.
	 */
	public function users()
	{
		return $this->belongsToMany(User::class)->using(DepartmentUser::class);
	}
}
