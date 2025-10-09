<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDataResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $this->role_id,
            'role' => $this->mapRole($this->role_id),
            'status' => $this->status,
        ];
    }

    private function mapRole($roleId): string
    {
        return match ((int) $roleId) {
            1 => 'Super Admin',
            2 => 'Admin',
            3 => 'Cashier',
            default => 'Unknown',
        };
    }
}
