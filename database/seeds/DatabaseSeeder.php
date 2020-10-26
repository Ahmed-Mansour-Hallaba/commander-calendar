<?php

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


        $ranks=['مشير','فريق','لواء','عميد','عقيد','مقدم','رائد','نقيب','ملازم أول','ملازم','مساعد اول','مساعد','رقيب اول','رقيب','عريف','جندي'];
        foreach ($ranks as $rank){
        DB::table('ranks')->insert([
            'name' => "$rank",
            'created_at'=>now()
        ]);
        }

        DB::table('users')->insert([
            'username'=>'admin',
            'password'=>bcrypt('admin@123'),
            'name'=>'مسئول المنظومة',
            'rank_id'=>'16',
            'type'=>'admin'
        ]);

        /*
        for ($i=0;$i<50;$i++) {
            $x= rand(6,100);
            $y= rand(0,1);
            DB::table('items')->insert([
                'name' => Str::random(10),
                'sell_price' => $x,
                'purchase_price' => $x-rand(0,5),
                'is_countable' => $y,


            ]);
        }
        */

    }
}
