<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TypesDivorceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exists = DB::table('types_divorce')->first();

        if(!$exists){

            $json = File::get("database/data/types_divorce.json");
            $data = json_decode($json);

            foreach ($data as $obj) {

                // insert type_divorce
                DB::table('types_divorce')->insertGetId([
                    'id' => $obj->id,
                    'name' => $obj->name,
                ]);

            }
        }
    }
}
