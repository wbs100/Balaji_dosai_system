<?php

namespace App\Http\Resources\Product;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        static $categories = [];
        static $brands = [];

        $categoryName = '';
        if ($this->category_id) {
            if (!isset($categories[$this->category_id])) {
                $categories[$this->category_id] = Category::find($this->category_id)?->name ?? '';
            }
            $categoryName = $categories[$this->category_id];
        }

        $brandName = '';
        if ($this->brand_id) {
            if (!isset($brands[$this->brand_id])) {
                $brands[$this->brand_id] = Brand::find($this->brand_id)?->name ?? '';
            }
            $brandName = $brands[$this->brand_id];
        }

        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => strlen($this->name) > 43 ? substr($this->name, 0, 40) . '...' : $this->name,
            'category_name' => $categoryName,
            'brand_name' => $brandName,
            'status' => $this->status,
            'cost_price' => number_format($this->cost_price, 2),
            'selling_price' => number_format($this->selling_price, 2),
            'product_discount' => number_format($this->product_discount, 2),
            'stock_quantity' => (int) $this->stock_quantity,
        ];
    }
}
