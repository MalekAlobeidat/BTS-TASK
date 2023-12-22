<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('companies')->insert([
                'name' => $faker->company,
                'email' => $faker->unique()->companyEmail,
                'logo' => $this->getRandomLogoPath(), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        
    }
    private function getRandomLogoPath()
    {
        return 'path/to/logo' . rand(1, 5) . '.png';
    }
}
