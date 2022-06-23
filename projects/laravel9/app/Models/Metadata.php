<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    use HasFactory;

	/**
	 * Get the parent retrievable model (user or customer).
	 */
	public function retrievable()
	{
		return $this->morphTo();
	}
}
