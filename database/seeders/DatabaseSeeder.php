<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('users')->updateOrInsert([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $posts = [
            [
                'title' => 'Akhir Tragis Sang Legenda: Ronaldo Tersingkir dari Piala Dunia 2026 Usai Kalah 1-0 dari Spanyol',
                'content' => 'Momen emosional tak terelakkan terjadi di akhir laga babak sistem gugur Piala Dunia 2026. Sang mega bintang, Cristiano Ronaldo, tertunduk lesu dan tak kuasa menahan air mata setelah timnya dipastikan tersingkir dari turnamen akbar ini. Laga yang berlangsung sangat sengit tersebut berakhir dengan kekalahan tipis. Meski tampil penuh determinasi dan beberapa kali mengancam gawang lawan, Dewi Fortuna belum memihak pada Portugal. Bagi Ronaldo, ini kemungkinan besar menjadi tarian terakhirnya (Last Dance) di panggung Piala Dunia. Puluhan ribu penonton di stadion memberikan tepuk tangan penghormatan (standing ovation) kepada sang legenda hidup saat ia berjalan menuju lorong ruang ganti, menandai akhir dari sebuah era emas dalam sejarah sepak bola modern.',
                'published' => 'yes',
                'image_url' => '/images/ronaldo_out.png',
                'publisher' => 'Fokus Utama',
                'event_date' => now()->subHours(1)->toDateString(),
            ],
            [
                'title' => 'Kejutan Besar! Tim Unggulan Tumbang di Tangan Kuda Hitam',
                'content' => 'Siapa sangka, salah satu tim favorit juara harus menelan pil pahit di laga perdana fase grup Piala Dunia. Mereka secara mengejutkan ditumbangkan oleh tim "kuda hitam" yang tampil penuh determinasi dan semangat juang tinggi. Meskipun mendominasi penguasaan bola hingga 68%, tim unggulan tampak kesulitan menembus pertahanan berlapis (park the bus) yang diterapkan oleh lawan. Serangan balik cepat menjadi senjata mematikan bagi sang kuda hitam. Melalui sebuah transisi kilat di menit ke-89, striker andalan mereka berhasil lepas dari jebakan offside dan menaklukkan kiper kelas dunia dengan sontekan tenang. Sorak-sorai penonton langsung pecah, menyambut salah satu kejutan terbesar sepanjang sejarah turnamen. Kekalahan ini memaksa tim unggulan untuk mengevaluasi total strategi mereka di dua laga sisa jika tidak ingin angkat koper lebih awal dari ajang empat tahunan ini.',
                'published' => 'yes',
                'image_url' => '/images/wc_upset.png',
                'publisher' => 'Analisa Bola',
                'event_date' => now()->subHours(12)->toDateString(),
            ],
            [
                'title' => 'Analisa Taktik: Bagaimana Formasi 4-3-3 Menghancurkan Pertahanan Lawan',
                'content' => 'Formasi 4-3-3 kembali membuktikan magisnya di panggung Piala Dunia. Pada pertandingan semalam, kita melihat sebuah masterclass taktik bagaimana memanfaatkan ruang kosong di area pertahanan lawan (half-spaces). Kunci utama dari kemenangan telak ini terletak pada pergerakan gelandang tengah yang sangat dinamis, sering kali turun menjemput bola untuk menarik bek lawan keluar dari posisinya. Saat bek lawan terpancing, kedua penyerang sayap dengan cepat melakukan penetrasi memotong ke dalam (cut inside) memanfaatkan celah yang tercipta. Statistik mencatat ada lebih dari 15 key passes yang berasal dari area sepertiga akhir lapangan, membuktikan betapa efektifnya skema ini. Selain itu, garis pertahanan tinggi yang diterapkan membuat tim lawan tidak mampu mengembangkan permainan sama sekali. Ini adalah pelajaran berharga bagi pelatih mana pun tentang pentingnya penguasaan ruang dan timing dalam sepak bola modern.',
                'published' => 'yes',
                'image_url' => '/images/wc_tactic.png',
                'publisher' => 'Pundit Taktik',
                'event_date' => now()->subDay()->toDateString(),
            ],
            [
                'title' => 'Kiprah Sang Bintang: Gol Indah dari Luar Kotak Penalti Membawa Kemenangan',
                'content' => 'Pertandingan berjalan buntu selama 75 menit. Kedua tim saling jual beli serangan namun selalu kandas di lini pertahanan. Di saat krusial itulah, kualitas individu seorang bintang dunia berbicara. Menerima umpan pendek di luar kotak penalti, sang kapten melakukan satu sentuhan sebelum melepaskan tembakan melengkung yang sangat keras. Bola meluncur deras menuju sudut atas gawang, tidak memberikan kesempatan sedikit pun bagi penjaga gawang lawan untuk bereaksi. Gol spektakuler tersebut tidak hanya memecah kebuntuan, tetapi juga meruntuhkan mental lawan. Seluruh stadion bergemuruh menyambut gol berkelas tersebut yang langsung menjadi kandidat kuat sebagai Gol Terbaik Turnamen ini. Kontribusi sang bintang membuktikan mengapa dirinya layak disebut sebagai salah satu pemain terbaik sepanjang masa yang mampu memikul beban ekspektasi seluruh negara di pundaknya.',
                'published' => 'yes',
                'image_url' => '/images/wc_star.png',
                'publisher' => 'Fokus Pemain',
                'event_date' => now()->subDays(2)->toDateString(),
            ],
            [
                'title' => 'Kontroversi VAR di Menit Akhir Gagalkan Mimpi Lolos Fase Grup',
                'content' => 'Drama sesungguhnya terjadi di laga pamungkas penyisihan grup. Tim yang membutuhkan hasil imbang untuk lolos ke babak 16 besar harus gigit jari akibat keputusan Video Assistant Referee (VAR) di masa injury time. Berawal dari kemelut di depan gawang, wasit menunjuk titik putih karena menganggap terjadi pelanggaran *handball*. Namun, setelah dipanggil oleh petugas VAR untuk melihat monitor di pinggir lapangan, wasit membatalkan keputusannya. Pemeriksaan berulang kali melalui tayangan lambat menunjukkan bahwa bola terlebih dahulu mengenai dada pemain bertahan sebelum menyentuh tangannya secara pasif. Keputusan ini memicu protes keras dari staf pelatih dan para pemain, namun wasit tetap teguh pada pendiriannya. Kegagalan mengeksekusi penalti yang dibatalkan tersebut akhirnya memaksa mereka tersingkir secara menyakitkan dari panggung Piala Dunia.',
                'published' => 'yes',
                'image_url' => '/images/wc_var.png',
                'publisher' => 'Berita Bola',
                'event_date' => now()->subDays(3)->toDateString(),
            ],
            [
                'title' => 'Rekor Baru Tercipta! Penonton Terbanyak Sepanjang Sejarah Piala Dunia',
                'content' => 'Euforia Piala Dunia tahun ini benar-benar luar biasa. Pihak penyelenggara baru saja mengumumkan bahwa jumlah penonton yang hadir secara langsung di stadion telah memecahkan rekor tertinggi sepanjang sejarah turnamen, melampaui rekor yang sebelumnya bertahan sejak dekade 90-an. Antusiasme para suporter dari berbagai belahan dunia terlihat jelas dari lautan warna-warni atribut negara yang membanjiri kota penyelenggara. Tidak hanya di dalam stadion, area fan zone dan fasilitas publik lainnya juga penuh sesak oleh penggemar sepak bola yang saling berbagi kegembiraan dan kebudayaan. Rekor fantastis ini menegaskan kembali status Piala Dunia sebagai acara olahraga paling masif dan paling menyatukan umat manusia di planet ini. Kesuksesan penyelenggaraan ini diharapkan dapat menjadi tolak ukur bagi turnamen-turnamen internasional di masa depan.',
                'published' => 'yes',
                'image_url' => '/images/wc_fans.png',
                'publisher' => 'Piala Dunia Update',
                'event_date' => now()->subDays(4)->toDateString(),
            ],
            [
                'title' => 'Stadion Megah Siap Menggelar Laga Puncak Piala Dunia',
                'content' => 'Persiapan stadion utama untuk laga final Piala Dunia telah mencapai tahap 100 persen. Stadion yang mampu menampung lebih dari 80.000 penonton ini telah dilengkapi dengan teknologi pencahayaan terbaru dan sistem sirkulasi udara mutakhir untuk kenyamanan penonton dan pemain. Pihak penyelenggara menjanjikan upacara penutupan yang tidak akan pernah terlupakan sebelum peluit laga final dibunyikan.',
                'published' => 'yes',
                'image_url' => '/images/wc_stadium.png',
                'publisher' => 'Fasilitas & Venue',
                'event_date' => now()->subDays(5)->toDateString(),
            ],
            [
                'title' => 'Trofi Piala Dunia Tiba di Kota Penyelenggara Final',
                'content' => 'Trofi emas yang paling diperebutkan di seluruh dunia akhirnya tiba di kota penyelenggara pertandingan final. Dikawal ketat oleh pihak keamanan, trofi ini akan dipamerkan kepada publik di alun-alun utama kota selama dua hari penuh sebelum dibawa ke stadion. Ribuan penggemar telah mengantre sejak pagi hari demi mendapatkan kesempatan berfoto dengan trofi legendaris tersebut.',
                'published' => 'yes',
                'image_url' => '/images/wc_trophy.png',
                'publisher' => 'Berita Bola',
                'event_date' => now()->subDays(6)->toDateString(),
            ],
        ];

        foreach ($posts as $postData) {
            Post::updateOrCreate([
                'title' => $postData['title'],
            ], array_merge($postData, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
