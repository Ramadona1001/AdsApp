<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin';
        $user->password = \Hash::make('password');
        $user->email = 'admin@admin.com';
        $user->save();

        if(Role::where('name','Admin')->get()->count() == 0){
            Role::create(['name' => 'Admin']);
            $user->assignRole('Admin');
        }else{
            $user->assignRole('Admin');
        }

        for ($i=1; $i <= 10; $i++) {
            $account = new User();
            $account->name = 'User '.$i;
            $account->password = \Hash::make('password');
            $account->email = 'user'.$i.'@ads.com';
            $account->save();

            if(Role::where('name','User')->get()->count() == 0){
                Role::create(['name' => 'User']);
                $account->assignRole('User');
            }else{
                $account->assignRole('User');
            }
        }


    }
}
