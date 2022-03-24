<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        User::create([
            'name' => 'Evan Fauzi',
            'username' => 'evanfauzi',
            'email' => 'evanfauzi0@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
        ]);

        // Category::create([
        //     'name' => 'Laravel',
        //     'slug' => 'laravel',
        // ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'Android Development',
            'slug' => 'android-development',
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur tempore natus optio nesciunt quo vero magni.',
            // 'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur tempore natus optio nesciunt quo vero magni. Totam assumenda hic explicabo recusandae non minima repellendus velit aliquid in eaque ex autem aperiam maxime doloremque eveniet, maiores necessitatibus quos voluptates sit! Cupiditate, praesentium quod. Hic et doloremque in culpa neque dolorem ea, dolores laboriosam perferendis mollitia error asperiores odio saepe vero necessitatibus minima modi at voluptatum maiores numquam expedita magni nam, quasi recusandae.</p><p> Id nobis aut optio, porro, corrupti ut, qui voluptates labore tempora ipsum alias esse minus aliquam nihil totam molestias. Libero dicta eos, quo deleniti impedit iusto quidem quos doloremque officiis amet tempora minus, alias iure laboriosam animi aperiam! Quaerat ab dolor eos quae placeat eius numquam quisquam atque magni laborum, alias quia minus repudiandae rem ipsum sunt aut labore at culpa. Incidunt temporibus quas nemo explicabo voluptates, nam error ea iure qui quidem obcaecati. Aliquam itaque deserunt fuga numquam?</p>',
        // ]);

        // Post::create([
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur tempore natus optio nesciunt quo vero magni.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur tempore natus optio nesciunt quo vero magni. Totam assumenda hic explicabo recusandae non minima repellendus velit aliquid in eaque ex autem aperiam maxime doloremque eveniet, maiores necessitatibus quos voluptates sit! Cupiditate, praesentium quod. Hic et doloremque in culpa neque dolorem ea, dolores laboriosam perferendis mollitia error asperiores odio saepe vero necessitatibus minima modi at voluptatum maiores numquam expedita magni nam, quasi recusandae.</p><p> Id nobis aut optio, porro, corrupti ut, qui voluptates labore tempora ipsum alias esse minus aliquam nihil totam molestias. Libero dicta eos, quo deleniti impedit iusto quidem quos doloremque officiis amet tempora minus, alias iure laboriosam animi aperiam! Quaerat ab dolor eos quae placeat eius numquam quisquam atque magni laborum, alias quia minus repudiandae rem ipsum sunt aut labore at culpa. Incidunt temporibus quas nemo explicabo voluptates, nam error ea iure qui quidem obcaecati. Aliquam itaque deserunt fuga numquam?</p>',
        // ]);
    }
}
