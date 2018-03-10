<?php

use Illuminate\Database\Seeder;

class BantenprovIKKabupatenKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BantenprovIKKabupatenKotaSeederIKKabupatenKota::class);
    }
}
