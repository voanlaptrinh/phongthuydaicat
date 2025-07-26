<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProfile extends Model
{
    use HasFactory;
    /**
     * Các cột được phép gán giá trị hàng loạt (mass assignment).
     * Đây là một tính năng bảo mật của Laravel.
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'zalo',
        'email',
        'facebook_url',
        'service_type',
        'reception_date',
        'status',
        'note',
    ];

    /**
     * Chuyển đổi các cột sang kiểu dữ liệu cụ thể khi truy cập.
     * @var array
     */
    protected $casts = [
        'reception_date' => 'date', // Tự động chuyển đổi thành đối tượng Carbon (date)
    ];
        protected static function boot()
    {
        parent::boot();

        /**
         * Lắng nghe sự kiện 'created' (sau khi record được tạo thành công).
         * Chúng ta sẽ dùng ID vừa được tạo để sinh ra mã khách hàng.
         */
        static::created(function ($profile) {
            // Định dạng mã: Tiền tố 'KH' + 6 chữ số (ví dụ: KH000001)
            $prefix = 'KH';
            // str_pad sẽ thêm các số 0 vào bên trái của ID cho đến khi đủ 6 ký tự
            // Ví dụ: id = 1 -> '000001', id = 123 -> '000123'
            $paddedId = str_pad($profile->id, 6, '0', STR_PAD_LEFT);

            // Gán mã khách hàng và lưu lại mà không kích hoạt lại sự kiện 'created'
            $profile->customer_code = $prefix . $paddedId;
            $profile->save();
        });
    }

}
