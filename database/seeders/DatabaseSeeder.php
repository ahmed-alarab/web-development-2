<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Client;
use App\Models\Driver;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        try {
            // Driver User
            $driverUser = User::create([
                'name' => 'Driver User',
                'email' => 'd@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'driver',
                'is_verified' => true,
            ]);

            Driver::create([
                'user_id' => $driverUser->id,
                'plate_number' => 123456,
                'vehicle_type' => 'suv',
                'license_number' => 'DRV-789456',
                'license_expiry' => now()->addYears(2),
                'status' => 'available',
                'shift_start' => '08:00:00',
                'shift_end' => '17:00:00',
                'working_area' => 'Beirut',
                'rating' => 4.5,
                'verified' => true,
            ]);

            
            $clientUser = User::create([
                'name' => 'Client User',
                'email' => 'c@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'client',
                'is_verified' => true,
            ]);

            Client::create([
                'user_id' => $clientUser->id,
                'address' => 'Beirut, Lebanon',
                'verified' => true,
                'points' => 100,
            ]);

            // Admin User
            $adminUser = User::create([
                'name' => 'Admin User',
                'email' => 'a@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'is_verified' => true,
            ]);

            Admin::create([
                'user_id' => $adminUser->id
            ]);

            $this->command->info(" Users seeded: driver ID {$driverUser->id}, client ID {$clientUser->id}, admin ID {$adminUser->id}");
        } catch (\Exception $e) {
            $this->command->error(" Error seeding users: " . $e->getMessage());
        }
    }
}

