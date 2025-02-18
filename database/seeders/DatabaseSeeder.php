<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
            OrderSeeder::class,
            ReviewSeeder::class,
            WishlistSeeder::class,
            CouponSeeder::class,
            ShippingMethodSeeder::class,
            TagSeeder::class,
            AttributeSeeder::class,
            AttributeValueSeeder::class,
            InventorySeeder::class,
            CollectionSeeder::class,
            CartSeeder::class,
        ]);
    }
}
