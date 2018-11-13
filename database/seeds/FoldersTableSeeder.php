<?php

use Illuminate\Database\Seeder;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('folders')->insert([
            'admin_id'      =>  0,
        	'parent_id'     =>  0,
        	'name'          =>  'Insight Vault',
            'description'   =>  'This is the Insight Vault.'
        ]);

        DB::table('folders')->insert([
            'admin_id'      =>  0,
            'parent_id'     =>  0,
            'name'          =>  'Innovation Toolkit',
            'description'   =>  'This is the Innovation Toolkit.'
        ]);
    }
}
