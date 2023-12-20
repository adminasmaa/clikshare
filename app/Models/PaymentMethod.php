<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'payment_methods';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $guarded = [];

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_payment_methods', 'user_id', 'payment_method_id')->withPivot('account_name')->withTimestamps();
    }
}
