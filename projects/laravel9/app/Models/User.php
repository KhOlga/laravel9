<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens;
	use HasFactory;
	use Notifiable;

	/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	########## RELATIONSHIPS START #########

	/**
	 * The departments that belong to the user.
	 */
	public function departments()
	{
		return $this->belongsToMany(Department::class);
	}

	/**
	 * Get the user's personal info.
	 */
	public function personalInfo()
	{
		return $this->morphOne(PersonalInfo::class, 'personable');
	}

	/**
	 * Get the customer's metadata.
	 */
	public function metadata()
	{
		return $this->morphOne(Metadata::class, 'retrievable');
	}

	########## RELATIONSHIPS END #########

	/**
	 * Get the user's most recent metadata.
	 */
	public function latestMetadata()
	{
		return $this->morphOne(Metadata::class, 'retrievable')->latestOfMany();
	}
}
