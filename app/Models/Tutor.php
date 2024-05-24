<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Tutor extends Authenticatable implements AuthenticatableContract
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'gender',
        'age',
        'phone_num',
        'email',
        'about',
        'password',
        'profile_picture',
        'document',
        'status',
       
    ];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        $array = parent::toArray();

        // Handle any potential encoding issues here
        foreach ($array as $key => $value) {
            if (is_string($value) && !mb_check_encoding($value, 'UTF-8')) {
                // If the value is not UTF-8 encoded, convert it
                $array[$key] = mb_convert_encoding($value, 'UTF-8');
            }
        }

        return $array;
    }
}
