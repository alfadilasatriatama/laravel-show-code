<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       

        User::create([
            'name' => 'alfadila',
            'username' => 'alfaaaa',
            'email' => 'alfadila@gmail.com',
            'noWa' => '089687478091',
            'password' => bcrypt('password'),
        ]);

        // User::create([
        //     'name' => 'Christoper compt',
        //     'email' => 'christoper@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Perumahan',
            'slug' => 'perumahan'
        ]);

        Category::create([
            'name' => 'Tanah',
            'slug' => 'tanah'
        ]);

        Category::create([
            'name' => 'Lain Lain',
            'slug' => 'lain-lain'
        ]);

        Post::factory(20)->create();

    }
}
