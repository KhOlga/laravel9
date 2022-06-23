<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;

	########## RELATIONSHIPS START #########

	/**
	 * Get the parent personable model (user or customer).
	 */
	public function personable()
	{
		return $this->morphTo();
	}

	########## RELATIONSHIPS END #########
}
