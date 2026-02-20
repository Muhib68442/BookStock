<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // CREATE ADMIN 
        User::create([
            'name' => 'Admin',
            'email' => 'admin@bookstock.com',
            'password' => bcrypt('12345678'),
        ]);

        // CREATE CATEGORIES 
        $categories = [
            ['name' => 'Novels', 'description' => 'Fictional stories and literature.', 'status' => 1],
            ['name' => 'Comic', 'description' => 'Graphic novels and comics for all ages.', 'status' => 1],
            ['name' => 'Magazines', 'description' => 'Monthly and weekly periodicals.', 'status' => 1],
            ['name' => 'Science & Research', 'description' => 'Books on science, research, and technology.', 'status' => 1],
            ['name' => 'Biographies', 'description' => 'Life stories of famous personalities.', 'status' => 1],
            ['name' => 'History', 'description' => 'Historical books covering events and eras.', 'status' => 1],
            ['name' => 'Philosophy', 'description' => 'Books on philosophy and human thought.', 'status' => 1],
            ['name' => 'Religion', 'description' => 'Religious texts and spiritual literature.', 'status' => 1],
        ];
        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // CREATE AUTHOR
        DB::table('authors')->insert([
            ['name' => 'Arif Mahmud', 'bio' => 'A passionate Bangladeshi writer who loves modern literature.', 'image' => 'arif.jpg', 'email' => 'arif@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nusrat Nahar', 'bio' => 'Author of several short story collections about life and emotion.', 'image' => 'nusrat.jpg', 'email' => 'nusrat@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tawsif Rahman', 'bio' => 'Writes tech-based novels and sci-fi adventures.', 'image' => 'tawsif.jpg', 'email' => 'tawsif@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Elma Chowdhury', 'bio' => 'Famous for warm, emotional storytelling.', 'image' => 'elma.jpg', 'email' => 'elma@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rafiq Islam', 'bio' => 'Novelist focusing on contemporary social issues.', 'image' => 'rafiq.jpg', 'email' => 'rafiq@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Farhana Akter', 'bio' => 'Writes motivational and inspirational books.', 'image' => 'farhana.jpg', 'email' => 'farhana@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Shahriar Alam', 'bio' => 'Sci-fi and adventure writer with global recognition.', 'image' => 'shahriar.jpg', 'email' => 'shahriar@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lamia Chowdhury', 'bio' => 'Children’s books and fairy tales author.', 'image' => 'lamia.jpg', 'email' => 'lamia@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Imran Hossain', 'bio' => 'Historical fiction author and researcher.', 'image' => 'imran.jpg', 'email' => 'imran@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sadia Rahman', 'bio' => 'Writes contemporary romance and drama stories.', 'image' => 'sadia.jpg', 'email' => 'sadia@example.com', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // BOOK Factory
        Book::factory(100)->create();

    }
}
