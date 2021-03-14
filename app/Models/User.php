<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 *
 * Class User
 * @package App\Models
 * @method static whereFirstName($column, $operator = null, $value = null, $boolean = 'and')
 * @method static whereLastName($column, $operator = null, $value = null, $boolean = 'and')
 * @method static whereEmail($column, $operator = null, $value = null, $boolean = 'and')
 * @method static whereDocument($column, $operator = null, $value = null, $boolean = 'and')
 * @method static wherePhone($column, $operator = null, $value = null, $boolean = 'and')
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'document',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function getProfileImgAttribute()
    {
        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=7F9CF5&background=EBF4FF';
    }

    public function getNameAttribute()
    {
        return $this->first_name. ' ' . $this->last_name;
    }
}
