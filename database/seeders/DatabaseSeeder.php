<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Actor;
use App\Models\Address;
use App\Models\Catagory;
use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Film;
use App\Models\FilmActor;
use App\Models\FilmCatagory;
use App\Models\Inventory;
use App\Models\Language;
use App\Models\Payment;
use App\Models\Rental;
use App\Models\Staff;
use App\Models\Store;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Country::factory(10)->create();
        City::factory(10)->create();
        Address::factory(10)->create();
        Customer::factory(10)->create();
        Store::factory(10)->create();
        Actor::factory(10)->create();
        Language::factory(10)->create();
        Catagory::factory(10)->create();
        Film::factory(10)->create();
        Inventory::factory(10)->create();
        FilmActor::factory(10)->create();
        FilmCatagory::factory(10)->create();
        Staff::factory(10)->create();
        Rental::factory(10)->create();
        Payment::factory(10)->create();
    }
}
