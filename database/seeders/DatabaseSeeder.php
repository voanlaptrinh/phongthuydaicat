<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DichVu;
use App\Models\DichVuFaq;
use App\Models\Faq;
use App\Models\News;
use App\Models\NewsFaq;
use App\Models\Phanhoi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Phong thủy đại cát',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password123'),
        ]);
        for ($i = 0; $i < 15; $i++) {
            Phanhoi::create([
                'name' => 'Chị a',
                'note' => '  Tôi đặc biệt thích cách tư vấn được trình bày dễ hiểu, kết hợp giữa phong thủy
                                    truyền thống và hiện đại. Không mê tín, mà rất thực tế. Thông tin rõ ràng, chuyên
                                    Không mê tín, mà rất thực tế. Thông tin rõ ràng, chuyên Không mê tín, mà rất thực
                                    tế. Thông tin rõ ràng, chuyên Không mê tín, mà rất thực tế. Thông tin rõ ràng,
                                    chuyên Không mê tín, mà rất thực tế. Thông tin rõ ràng, chuyên'
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            Faq::create([
                'question' => 'Tôi nên xem phong thủy vào thời điểm nào là tốt nhất?',
                'answer' => 'Bạn nên xem phong thủy vào các thời điểm quan trọng trong cuộc sống, khi
                                                chuẩn bị thực hiện một việc lớn có ảnh hưởng đến vận mệnh, tài lộc, sức khỏe
                                                hoặc hạnh phúc gia đình. Xác định hướng nhà, vị trí đất, bố cục phòng ốc,
                                                bếp, nhà vệ sinh...
                                            '
            ]);
        }
        for ($i = 1; $i <= 7; $i++) {
            $news = News::create([
                'title' => "Tin tức yếu tố ảnh hưởng đến tình cảm số $i",
                'tag' => "Thẻ $i",
                'description' => "Mô tả ngắn cho tin tức số $i",
                'content' => "<p>Nội dung chi tiết của tin tức số $i...</p>",
                'active' => true,
            ]);

            // Mỗi bài có 3 câu hỏi FAQ liên quan
            for ($j = 1; $j <= 3; $j++) {
                NewsFaq::create([
                    'news_id' => $news->id,
                    'question' => "Câu hỏi $j cho tin tức $i",
                    'answer' => "Trả lời cho câu hỏi $j thuộc tin tức $i",
                    'active' => true,
                ]);
            }
        }
        for ($i = 1; $i <= 6; $i++) {
            $dichvu = DichVu::create([
                'title' => "dịch vụ yếu tố ảnh hưởng đến tình cảm số $i",
                'tag' => "Thẻ $i",
                'description' => "Mô tả ngắn cho dịch vụ số $i",
                'content' => "
                            Đây là phần nội dung văn bản. Khi nội dung này đủ dài, nó sẽ tự động chảy xuống dòng và bao bọc
                            xung quanh bên dưới hình ảnh, tạo ra một bố cục rất tự nhiên và đẹp mắt.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus
                            tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Đây là phần nội dung văn bản.
                            Khi nội dung này đủ dài, nó sẽ tự động chảy xuống dòng và bao bọc xung quanh bên dưới hình ảnh,
                            tạo ra một bố cục rất tự nhiên và đẹp mắt.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus
                            tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Đây là phần nội dung văn bản.
                            Khi nội dung này đủ dài, nó sẽ tự động chảy xuống dòng và bao bọc xung quanh bên dưới hình ảnh,
                            tạo ra một bố cục rất tự nhiên và đẹp mắt.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus
                            tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Đây là phần nội dung văn bản.
                            Khi nội dung này đủ dài, nó sẽ tự động chảy xuống dòng và bao bọc xung quanh bên dưới hình ảnh,
                            tạo ra một bố cục rất tự nhiên và đẹp mắt.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus
                            tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Đây là phần nội dung văn bản.
                            Khi nội dung này đủ dài, nó sẽ tự động chảy xuống dòng và bao bọc xung quanh bên dưới hình ảnh,
                            tạo ra một bố cục rất tự nhiên và đẹp mắt.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus
                            tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Đây là phần nội dung văn bản.
                            Khi nội dung này đủ dài, nó sẽ tự động chảy xuống dòng và bao bọc xung quanh bên dưới hình ảnh,
                            tạo ra một bố cục rất tự nhiên và đẹp mắt.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus
                            tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Đây là phần nội dung văn bản.
                            Khi nội dung này đủ dài, nó sẽ tự động chảy xuống dòng và bao bọc xung quanh bên dưới hình ảnh,
                            tạo ra một bố cục rất tự nhiên và đẹp mắt.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus
                            tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Đây là phần nội dung văn bản.
                            Khi nội dung này đủ dài, nó sẽ tự động chảy xuống dòng và bao bọc xung quanh bên dưới hình ảnh,
                            tạo ra một bố cục rất tự nhiên và đẹp mắt.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus
                            tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Đây là phần nội dung văn bản.
                            Khi nội dung này đủ dài, nó sẽ tự động chảy xuống dòng và bao bọc xung quanh bên dưới hình ảnh,
                            tạo ra một bố cục rất tự nhiên và đẹp mắt.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus
                            tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Đây là phần nội dung văn bản.
                            Khi nội dung này đủ dài, nó sẽ tự động chảy xuống dòng và bao bọc xung quanh bên dưới hình ảnh,
                            tạo ra một bố cục rất tự nhiên và đẹp mắt.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus
                            tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.
                        ",
               
            ]);

            // Mỗi bài có 3 câu hỏi FAQ liên quan
            for ($j = 1; $j <= 3; $j++) {
                DichVuFaq::create([
                    'dich_vu_id' => $dichvu->id,
                    'question' => "Câu hỏi $j cho dịch vụ $i",
                    'answer' => "Trả lời cho câu hỏi $j thuộc dịch vụ $i",
                 
                ]);
            }
        }
    }
}
