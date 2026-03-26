<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Free',
                'slug' => 'free',
                'price' => 0,
                'duration_days' => 0,
                'is_active' => true,
                'max_devices' => 1,
                'quality' => '480p',
                'downloads_allowed' => false,
            ],
            [
                'name' => 'Weekly',
                'slug' => 'weekly',
                'price' => 1000,
                'duration_days' => 7,
                'is_active' => true,
                'max_devices' => 1,
                'quality' => '720p',
                'downloads_allowed' => false,
            ],
            [
                'name' => 'Monthly',
                'slug' => 'monthly',
                'price' => 3000,
                'duration_days' => 30,
                'is_active' => true,
                'max_devices' => 2,
                'quality' => '1080p',
                'downloads_allowed' => true,
            ],
            [
                'name' => 'Yearly',
                'slug' => 'yearly',
                'price' => 30000,
                'duration_days' => 365,
                'is_active' => true,
                'max_devices' => 4,
                'quality' => '1080p',
                'downloads_allowed' => true,
            ],
        ];

        foreach ($plans as $plan) {
            SubscriptionPlan::updateOrCreate(
                ['slug' => $plan['slug']],
                $plan
            );
        }
    }
}
