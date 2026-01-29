<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        $books = [
            // Fiksi
            [
                'category' => 'Fiksi',
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'publisher' => 'Bentang Pustaka',
                'year' => 2005,
                'isbn' => '9789793062792',
                'description' => 'Novel tentang perjuangan anak-anak di Belitung untuk mendapatkan pendidikan yang layak.',
                'stock' => 5,
            ],
            [
                'category' => 'Fiksi',
                'title' => 'Bumi Manusia',
                'author' => 'Pramoedya Ananta Toer',
                'publisher' => 'Hasta Mitra',
                'year' => 1980,
                'isbn' => '9789799731234',
                'description' => 'Novel pertama dari Tetralogi Buru yang mengisahkan perjuangan Minke melawan kolonialisme.',
                'stock' => 3,
            ],
            [
                'category' => 'Fiksi',
                'title' => 'Ronggeng Dukuh Paruk',
                'author' => 'Ahmad Tohari',
                'publisher' => 'Gramedia Pustaka Utama',
                'year' => 1982,
                'isbn' => '9789792234567',
                'description' => 'Novel yang mengisahkan kehidupan Srintil sebagai ronggeng di sebuah desa terpencil.',
                'stock' => 4,
            ],
            // Non-Fiksi
            [
                'category' => 'Non-Fiksi',
                'title' => 'Sapiens: A Brief History of Humankind',
                'author' => 'Yuval Noah Harari',
                'publisher' => 'Harper',
                'year' => 2014,
                'isbn' => '9780062316097',
                'description' => 'Buku yang membahas sejarah manusia dari zaman batu hingga era modern.',
                'stock' => 3,
            ],
            [
                'category' => 'Non-Fiksi',
                'title' => 'Atomic Habits',
                'author' => 'James Clear',
                'publisher' => 'Avery',
                'year' => 2018,
                'isbn' => '9780735211292',
                'description' => 'Panduan praktis untuk membangun kebiasaan baik dan menghilangkan kebiasaan buruk.',
                'stock' => 6,
            ],
            // Sains
            [
                'category' => 'Sains',
                'title' => 'A Brief History of Time',
                'author' => 'Stephen Hawking',
                'publisher' => 'Bantam Books',
                'year' => 1988,
                'isbn' => '9780553380163',
                'description' => 'Penjelasan tentang kosmologi, lubang hitam, dan asal-usul alam semesta.',
                'stock' => 2,
            ],
            [
                'category' => 'Sains',
                'title' => 'Cosmos',
                'author' => 'Carl Sagan',
                'publisher' => 'Random House',
                'year' => 1980,
                'isbn' => '9780345331359',
                'description' => 'Eksplorasi mendalam tentang alam semesta dan tempat manusia di dalamnya.',
                'stock' => 3,
            ],
            // Sejarah
            [
                'category' => 'Sejarah',
                'title' => 'Sejarah Indonesia Modern 1200-2008',
                'author' => 'M.C. Ricklefs',
                'publisher' => 'Serambi',
                'year' => 2008,
                'isbn' => '9789791600132',
                'description' => 'Buku lengkap tentang sejarah Indonesia dari masa kerajaan hingga era reformasi.',
                'stock' => 4,
            ],
            // Biografi
            [
                'category' => 'Biografi',
                'title' => 'Steve Jobs',
                'author' => 'Walter Isaacson',
                'publisher' => 'Simon & Schuster',
                'year' => 2011,
                'isbn' => '9781451648539',
                'description' => 'Biografi resmi pendiri Apple yang penuh inspirasi dan kontroversi.',
                'stock' => 3,
            ],
            // Pendidikan
            [
                'category' => 'Pendidikan',
                'title' => 'Matematika Dasar untuk Perguruan Tinggi',
                'author' => 'Tim Penulis',
                'publisher' => 'Erlangga',
                'year' => 2020,
                'isbn' => '9786024847890',
                'description' => 'Buku panduan matematika dasar untuk mahasiswa semester awal.',
                'stock' => 10,
            ],
            // Agama
            [
                'category' => 'Agama',
                'title' => 'Tafsirul Quran',
                'author' => 'Quraish Shihab',
                'publisher' => 'Lentera Hati',
                'year' => 2002,
                'isbn' => '9789793123450',
                'description' => 'Tafsir Al-Quran yang mudah dipahami untuk pembaca modern.',
                'stock' => 5,
            ],
            // Komik & Manga
            [
                'category' => 'Komik & Manga',
                'title' => 'One Piece Vol. 1',
                'author' => 'Eiichiro Oda',
                'publisher' => 'Elex Media Komputindo',
                'year' => 1997,
                'isbn' => '9784088725093',
                'description' => 'Petualangan Monkey D. Luffy untuk menjadi Raja Bajak Laut.',
                'stock' => 8,
            ],
        ];

        foreach ($books as $bookData) {
            $category = $categories->where('name', $bookData['category'])->first();

            if ($category) {
                Book::create([
                    'category_id' => $category->id,
                    'title' => $bookData['title'],
                    'slug' => Str::slug($bookData['title']),
                    'author' => $bookData['author'],
                    'publisher' => $bookData['publisher'],
                    'year' => $bookData['year'],
                    'isbn' => $bookData['isbn'],
                    'description' => $bookData['description'],
                    'stock' => $bookData['stock'],
                    'available_stock' => $bookData['stock'],
                ]);
            }
        }
    }
}
