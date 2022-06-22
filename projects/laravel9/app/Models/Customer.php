<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

	public const STATUS_NEW = 1; // Customer has less than 2 contracts
	public const STATUS_ACTIVE = 2; // Customer has from 2 to 5 contracts
	public const STATUS_LOYAL = 3; // Customer has 6 and more contracts
	public const STATUS_INACTIVE = 4; // Customer hasn't contracts during last 12 months

	/**
	 * Get the customer's personal info.
	 */
	public function personalInfo()
	{
		return $this->morphOne(PersonalInfo::class, 'personable');
	}
}
