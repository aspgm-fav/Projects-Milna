<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\User;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 = new Category();
        $c1->title = 'Body Part';
        $c1->save();
        $c1 = new Category();
        $c1->title = 'Interior';
        $c1->save();
        $c1 = new Category();
        $c1->title = 'Ban / Velg';
        $c1->save();
        $c1 = new Category();
        $c1->title = 'Lampu';
        $c1->save();
        $c1 = new Category();
        $c1->title = 'Knalpot';
        $c1->save();
        $c1 = new Category();
        $c1->title = 'Mesin';
        $c1->save();
        $user = new User();
        $user->name = 'Administrator';
        $user->username = 'Admin';
        $user->email = 'administrator@milna.com';
        $user->password = \Hash::make("adminmilna");
        $user->phone = '089681242615';
        $user->admin = true;
        $user->save();
    }
}
