<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'public_user_id',
        'title',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(PublicUser::class, 'public_user_id');
    }
}
