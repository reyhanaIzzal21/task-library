<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Fiksi', 'description' => 'Novel, cerpen, dan karya fiksi lainnya'],
            ['name' => 'Non-Fiksi', 'description' => 'Buku berdasarkan fakta dan pengetahuan'],
            ['name' => 'Sains', 'description' => 'Buku tentang ilmu pengetahuan dan teknologi'],
            ['name' => 'Sejarah', 'description' => 'Buku tentang sejarah dunia dan Indonesia'],
            ['name' => 'Biografi', 'description' => 'Kisah hidup tokoh-tokoh terkenal'],
            ['name' => 'Pendidikan', 'description' => 'Buku pelajaran dan referensi akademik'],
            ['name' => 'Agama', 'description' => 'Buku tentang agama dan spiritualitas'],
            ['name' => 'Komik & Manga', 'description' => 'Komik dan manga dari berbagai negara'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }
    }
}
