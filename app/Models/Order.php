<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'public_user_id',
        'first_name',
        'last_name',
        'company',
        'address_line1',
        'address_line2',
        'city',
        'province',
        'postal_code',
        'phone',
        'email',
        'notes',
        'payment_method',
        'payment_slip_path',
        'total',
        'payment_status',
    ];

    public function user()
    {
        return $this->belongsTo(PublicUser::class, 'public_user_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
