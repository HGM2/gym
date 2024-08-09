<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Membership;

class MembershipSeeder extends Seeder
{
    public function run(): void
    {
        Membership::create(['type' => 'Básica', 'price' => 20.00]);
        Membership::create(['type' => 'Premium', 'price' => 50.00]);
    }
}
