<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* role */
        \App\Models\Role::factory()->create([
            'name' => 'entreprise'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'client'
        ]);

        /* user */
        \App\Models\User::factory()->create([
            'name' => 'Brain booster',
            'email' => 'test@bb.com',
            'role_id' => 1,
        ]);
       \App\Models\User::factory(10)->create();

        

        /* service */
        \App\Models\Service::factory(15)->create([
            'user_id' => 1,
        ]);

        /* service user */
        $u1 = \App\Models\User::find(1);
        $u2 = \App\Models\User::find(2);
        $u3 = \App\Models\User::find(3);

        $Service1 = \App\Models\Service::find(1);
        $Service2 = \App\Models\Service::find(2);
        $Service3 = \App\Models\Service::find(3);

        $Service1->Users()->attach($u1, ['pay_point' => false]);
        $Service1->Users()->attach($u3, ['pay_point' => false]);
        $Service2->Users()->attach($u1, ['pay_point' => false]);
        $Service3->Users()->attach($u2, ['pay_point' => false]);
        // $Service3->Users()->attach($u2, ['pay_point' => false]);

    }
}
