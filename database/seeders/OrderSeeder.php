<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\vendor\Vendor;
use App\Models\vendor\Product;
use App\Models\customer\Order;
use App\Models\customer\OrderItem;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all existing active customer, product, and vendor IDs from DB
        $customerIds = User::pluck('id')->toArray();
        $productIds  = Product::pluck('id')->toArray();
        $vendorIds   = Vendor::pluck('id')->toArray();

        // Check if required pre-requisite data exists
        if (empty($customerIds) || empty($productIds) || empty($vendorIds)) {
            $this->command->error('Make sure you have Users, Products, and Vendors seeded first before running OrderSeeder!');
            return;
        }

        // Available order statuses mapped with standard database logic
        $statuses = [Order::STATUS_PENDING, Order::STATUS_COMPLETED, Order::STATUS_CANCELLED];

        $this->command->info('Seeding 50 dynamic orders...');

        // Loop to create 50 orders
        for ($i = 1; $i <= 50; $i++) {

            // Generate a random date within the last 60 days
            $randomDate = Carbon::now()->subDays(rand(0, 60))->subHours(rand(0, 23))->subMinutes(rand(0, 59));

            // Create a parent Order record
            $order = Order::create([
                'user_id'       => Arr::random($customerIds),
                'charge_id'     => rand(1, 5), // Assuming shipping charges configuration
                'coupon_id'     => rand(0, 1) ? rand(1, 3) : null, // 50% chance of coupon usage
                'ship_address'  => 'Random Street Address ' . rand(10, 99),
                'ship_location' => 'Dhaka',
                'bill_address'  => 'Random Billing Address ' . rand(10, 99),
                'bill_location' => 'Dhaka',
                'coupon_id' => rand(0, 1) ? rand(1, 3) : 1,
                'status'        => Arr::random($statuses), // Random pending, completed or cancelled
                'created_at'    => $randomDate,
                'updated_at'    => $randomDate,
            ]);

            // Each order will have between 1 to 4 multi-vendor or single vendor items
            $totalItemsInOrder = rand(1, 4);

            for ($j = 1; $j <= $totalItemsInOrder; $j++) {

                // Fetch a random product instance to align with its native vendor
                $randomProduct = Product::find(Arr::random($productIds));

                if ($randomProduct) {
                    OrderItem::create([
                        'order_id'     => $order->id,
                        'user_id'      => $order->user_id, // Same customer as order parent
                        'product_id'   => $randomProduct->id,
                        'vendor_id'    => $randomProduct->vendor_id ?? Arr::random($vendorIds), // Fallback safety
                        'attribute_id' => rand(1, 5), // Assuming size/color variant mapping
                        'quantity'     => rand(1, 5), // Purchase weight units count
                        'status_id'    => rand(1, 3), // Operational internal lifecycle state
                        'created_at'   => $randomDate,
                        'updated_at'   => $randomDate,
                    ]);
                }
            }
        }

        $this->command->info('Successfully seeded 50 dynamic orders and nested order items!');
    }
}
