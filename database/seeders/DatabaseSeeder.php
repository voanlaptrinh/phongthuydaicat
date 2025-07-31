<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DichVu;
use App\Models\DichVuFaq;
use App\Models\Faq;
use App\Models\News;
use App\Models\NewsFaq;
use App\Models\Phanhoi;
use App\Models\PhongThuy;
use App\Models\PhongThuyFaq;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $permissions = [
            'Xem hồ sơ khách hàng quản lý',
            'Thêm hồ sơ khách hàng quản lý',
            'Sửa hồ sơ khách hàng quản lý',
            'Xóa hồ sơ khách hàng quản lý',
            'Xem liên hệ',
            'Thêm phản hồi',
            'Xem phản hồi',
            'Sửa phản hồi',
            'Xóa phản hồi',
            'Xem hỏi đáp',
            'Thêm hỏi đáp',
            'Sửa hỏi đáp',
            'Xóa hỏi đáp',
            'Xem tin tức',
            'Thêm tin tức',
            'Sửa tin tức',
            'Xóa tin tức',
            'Xem câu hỏi tin tức',
            'Thêm câu hỏi tin tức',
            'Sửa câu hỏi tin tức',
            'Xóa câu hỏi tin tức',
            'Xem kiến thức phong thủy',
            'Thêm kiến thức phong thủy',
            'Sửa kiến thức phong thủy',
            'Xóa kiến thức phong thủy',
            'Xem câu hỏi kiến thức phong thủy',
            'Thêm câu hỏi kiến thức phong thủy',
            'Sửa câu hỏi kiến thức phong thủy',
            'Xóa câu hỏi kiến thức phong thủy',
            'Xem kiến thức dịch vụ',
            'Thêm kiến thức dịch vụ',
            'Sửa kiến thức dịch vụ',
            'Xóa kiến thức dịch vụ',
            'Xem câu hỏi kiến thức dịch vụ',
            'Thêm câu hỏi kiến thức dịch vụ',
            'Sửa câu hỏi kiến thức dịch vụ',
            'Xóa câu hỏi kiến thức dịch vụ',
            'Xem lịch tư vấn của khách hàng',
            'Sửa trạng thái lịch tư vấn khách hàng',
            'Xem vai trò',
            'Thêm vai trò',
            'Sửa vai trò',
            'Xóa vai trò',
            'Xem người dùng',
            'Thêm người dùng',
            'Sửa người dùng',
            'Xóa người dùng',

        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }
        $adminRole = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $adminRole->syncPermissions($permissions);


        // Gán Super Admin cho User ID 1
        $admin = User::find(1);
        if ($admin) {
            $admin->assignRole('Super Admin');
        }


        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Super-Admin',
                'password' => Hash::make('password123'), // Đổi mật khẩu mạnh hơn
            ]
        );

        $superAdmin->assignRole('Super Admin');
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

            ]);

            // Mỗi bài có 3 câu hỏi FAQ liên quan
            for ($j = 1; $j <= 3; $j++) {
                NewsFaq::create([
                    'news_id' => $news->id,
                    'question' => "Câu hỏi $j cho tin tức $i",
                    'answer' => "Trả lời cho câu hỏi $j thuộc tin tức $i",

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
        for ($i = 1; $i <= 6; $i++) {
            $dichvu = PhongThuy::create([
                'title' => "Ứng dụng vào bố trí không gian sống để tăng cát khí, hóa giải sát khí. $i",
                'tag' => "Phong thủy nhà ở $i",
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
                PhongThuyFaq::create([
                    'phong_thuy_id' => $dichvu->id,
                    'question' => "Câu hỏi $j cho phong thủy $i",
                    'answer' => "Trả lời cho câu hỏi $j thuộc phong thủy $i",

                ]);
            }
        }
    }
}
