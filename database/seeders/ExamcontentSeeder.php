<?php

namespace Database\Seeders;

use App\Models\Examcontent;
use Illuminate\Database\Seeder;

class ExamcontentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $examcontents = [
            [
                'exam_id' => 1,
                'content' => 'Definisikan arti dari Kekayaan Intelektual dan mengapa kita harus melindungi Kekayaan Intelektual kita?',
            ],
            [
                'exam_id' => 1,
                'content' => 'White hacker adalah seorang hacker yang tidak berusaha merusak suatu sistem, tetapi hanya mencari kelemahan dari sistem. Sedangkan black hacker/cracker adalah seorang hacker yang berusaha masuk ke dalam sistem untuk mencari kelemahan sekaligus merusak sistem tersebut. Berikan pendapat anda mengenai kedua macam hacker tersebut dipandang dari segi etika.',
            ],
            [
                'exam_id' => 1,
                'content' => 'Dunia pernah dihebohkan dengan pemberitaan tentang seorang ilmuwan yang berhasil menggandakan (cloning) kambing, dimana anak kambing yang dihasilkan memiliki kesamaan genetik dengan induknya. Jika diterapkan pada manusia, berikan pendapat anda apakah hal tersebut bisa dilakukan berdasar etika dan hukum.',
            ],
            [
                'exam_id' => 1,
                'content' => 'Manfaat apa saja yang didapatkan ketika kita memiliki perlindungan atas hak cipta (copyright) yang kita miliki?',
            ],
            [
                'exam_id' => 1,
                'content' => 'Menurut Anda, bagaimana cara mengatasi kejahatan dunia maya? Jelaskan!',
            ],
            [
                'exam_id' => 2,
                'content' => 'Jelaskan yang dimaksud dengan PMBOK!',
            ],
            [
                'exam_id' => 2,
                'content' => 'Sebutkan dan jelaskan tentang karakteristik unik yang membedakan proyek-proyek sistem informasi dan teknologi informasi dengan berbagai proyek-proyek pada domain industri lain!',
            ],
            [
                'exam_id' => 2,
                'content' => 'Sebutkan dan jelaskan tentang macam-macam siklus proyek serta jelaskan pula perbedaannya!',
            ],
            [
                'exam_id' => 2,
                'content' => 'Sebutkan dan jelaskan tentang matrix organization serta perbedaan dari masing-masing jenis matrix organization tersebut!',
            ],
            [
                'exam_id' => 2,
                'content' => 'Jelaskan yang dimaksud dengan ”co-exist and overlapping phenomena” pada proses manajemen proyek!',
            ],
            [
                'exam_id' => 3,
                'content' => 'Definisikan arti dari Kekayaan Intelektual dan mengapa kita harus melindungi Kekayaan Intelektual kita?',
            ],
            [
                'exam_id' => 3,
                'content' => 'White hacker adalah seorang hacker yang tidak berusaha merusak suatu sistem, tetapi hanya mencari kelemahan dari sistem. Sedangkan black hacker/cracker adalah seorang hacker yang berusaha masuk ke dalam sistem untuk mencari kelemahan sekaligus merusak sistem tersebut. Berikan pendapat anda mengenai kedua macam hacker tersebut dipandang dari segi etika.',
            ],
            [
                'exam_id' => 3,
                'content' => 'Dunia pernah dihebohkan dengan pemberitaan tentang seorang ilmuwan yang berhasil menggandakan (cloning) kambing, dimana anak kambing yang dihasilkan memiliki kesamaan genetik dengan induknya. Jika diterapkan pada manusia, berikan pendapat anda apakah hal tersebut bisa dilakukan berdasar etika dan hukum.',
            ],
            [
                'exam_id' => 3,
                'content' => 'Manfaat apa saja yang didapatkan ketika kita memiliki perlindungan atas hak cipta (copyright) yang kita miliki?',
            ],
            [
                'exam_id' => 3,
                'content' => 'Menurut Anda, bagaimana cara mengatasi kejahatan dunia maya? Jelaskan!',
            ],
            [
                'exam_id' => 3,
                'content' => '<p>Jelaskan pengertian etika profesi dan mengapa etika penting dalam menjalankan suatu profesi.</p>',
            ],
            [
                'exam_id' => 3,
                'content' => '<p>Apa yang dimaksud dengan kode etik profesi, dan berikan contoh penerapannya dalam profesi dokter!</p>',
            ],
            [
                'exam_id' => 3,
                'content' => '<p>Berikan contoh dilema etika yang mungkin dihadapi oleh seorang akuntan dalam pekerjaannya!</p>',
            ],
            [
                'exam_id' => 3,
                'content' => '<p>Sebutkan dan jelaskan tiga prinsip utama dalam etika profesi!</p>',
            ],
            [
                'exam_id' => 3,
                'content' => '<p>Mengapa etika profesi menjadi semakin penting dalam era digital saat ini?</p>',
            ],
        ];

        foreach ($examcontents as $examcontent) {
            Examcontent::create($examcontent);
        }
    }
}
