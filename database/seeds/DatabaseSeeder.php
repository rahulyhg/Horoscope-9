<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;



class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       $faker = Faker::create();
    	$customers = Customer::pluck('id')->all();
    	foreach (range(1,10) as $index) {
        DB::table('customer_locations')->insert([
        	'customer_id' => $faker->unique->randomElement($customers),
        	'created_at' => $faker->dateTime(),
        	'lat' => $faker->latitude($min = 20, $max = 30),
        	'lon' => $faker->longitude($min = 70, $max = 99),
        	'location' => $faker->city,
        	]);
   		 }

        // $this->call(UsersTableSeeder::class);
        // $faker = Faker::create();
        //  // $customers = Customer::pluck('id')->all();
        //  $zodiacs = Zodiac::pluck('id')->all();
        //  foreach (range(1,50000) as $index) {
        //  DB::table('customers')->insert([
        //      'first_name' => $faker->firstName,
        //      'last_name' => $faker->lastName,
        //      'email' => $faker->unique()->email,
        //      'password' => bcrypt(123456),
        //      'phone_number' => $faker->phoneNumber,
        //      'gender' => $faker->randomElement(['male','female','unspecified']),
        //      'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now') ,
        //      'time_of_birth' => $faker->time($format = 'H:i a', $max = 'now'),
        //      'place_of_birth' => $faker->city,
        //      'zodiac_id' => $faker->randomElement($zodiacs),
        //      'image' => $faker->imageUrl($width = 640, $height = 480),
        //      'bio' => $faker->text,
        //      ]);
        //   }
    }
}
