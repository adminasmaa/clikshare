<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(20)->create();
        $products = Product::whereIn('status', [2,3])->get();
        foreach ($products as $product) {
            Product::whereIn('status', [2,3])->update([
                'approved_by'        => auth()->user()->id ?? 5,
                'approved_on'        => now()->toDateTimeString(),
                'reject_reason'      => $product->status === 2 ? 'Test reasons' : null,
            ]);
        }
    }
}
