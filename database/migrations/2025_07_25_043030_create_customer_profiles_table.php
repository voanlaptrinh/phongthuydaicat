<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_profiles', function (Blueprint $table) {
            $table->id();
             $table->string('name');

            // Số điện thoại, có thể để trống (nullable).
            $table->string('phone')->nullable();
  $table->string('customer_code')->unique()->nullable(); 
            // Zalo, có thể để trống.
            $table->string('zalo')->nullable();

            // Email, phải là duy nhất (unique) và có thể để trống.
            $table->string('email')->unique()->nullable();
            
            // Link Facebook, có thể để trống.
            $table->string('facebook_url')->nullable();
            
            // Loại dịch vụ khách hàng sử dụng.
            $table->string('service_type');

            // Ngày tiếp nhận hồ sơ.
            $table->date('reception_date');

            // Tình trạng xử lý hồ sơ.
            // Sử dụng kiểu ENUM để giới hạn các giá trị có thể nhập.
            $table->enum('status', [
                'waiting',          // Đang chờ
                'consulting',       // Đang tư vấn
                'info_sent',        // Đã gửi thông tin
                'info_received',    // Đã tiếp nhận đầy đủ thông tin
                'handed_over',      // Đã bàn giao cho chuyên gia
                'result_received',  // Đã nhận kết quả của chuyên gia
                'result_relayed',   // Đã phản hồi kết quả cho khách hàng
                'collecting_feedback', // Thu thập đánh giá
                'completed'         // Đã hoàn tất
            ])->default('waiting'); // Giá trị mặc định khi tạo mới là 'Đang chờ'
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_profiles');
    }
};
