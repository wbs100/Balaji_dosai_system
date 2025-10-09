<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class OrderDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'order_code' => $this->order_code,
            'customer_name' => $this->first_name . ' ' . $this->last_name,
            'total' => $this->total,
            'payment_method' => $this->payment_method,
            'payment_status' => Str::ucfirst($this->payment_status),
            'status' => $this->order_status ?? 'N/A',
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
