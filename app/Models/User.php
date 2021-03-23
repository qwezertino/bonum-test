<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname',
        'email',
        'birth_date',
        'password',
        'role_id',
        'api_token',
    ];

    protected $attributes = [
        'role_id' => 2,
    ];

    protected $appends = [
        'role'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'role_id',
        'password',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'birth_date' => 'datetime:Y-m-d',
    ];

    public function generateToken(): string
    {
        $this->api_token = Str::random(60);
        $this->save();

        return $this->api_token;
    }

    public function getRoleName()
    {
        return $this->role()->first()->name;
    }

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(UserRole::class, 'role_id');
    }

    /**
     * @return string
     */
    public function getRoleAttribute(): string
    {
        return $this->role()->first()->name;
    }
}
