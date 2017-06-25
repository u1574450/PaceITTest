<?php

use Illuminate\Database\Seeder;
use App\Users;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->delete();
        $json = File::get("database/data/AddressBook.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
          User::create(array(
             'first_name' => $obj->first_name,
			  'last_name' => $obj->last_name,
			   'phone' => $obj->phone,
			   'email' => $obj->email
            
           
          ));
        }
		
    }
}
