<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use  Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeRoleType($query, $userType)
    {
        return Role::where('user_type', $userType)->where('status',1);
    }

    public function detail() : HasOne
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'id');
    }

    public function payment_methods() : BelongsToMany
    {
        return $this->belongsToMany(PaymentMethod::class, 'users_payment_methods', 'user_id', 'payment_method_id')->withPivot('account_name')->withTimestamps();
    }
}
