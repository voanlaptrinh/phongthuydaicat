<!-- resources/views/partials/schedule-popup.blade.php -->

<!-- resources/views/partials/schedule-popup.blade.php -->

<div class="schedule-popup-overlay js-schedule-popup-overlay">
    <div class="schedule-popup-content">
        <div class="schedule-popup-header">
            <h2>LIÊN HỆ ĐẶT LỊCH TƯ VẤN</h2>
            <!-- Thay id="close-schedule-popup" bằng class="js-close-schedule-popup" -->
            <button class="close-button text-white js-close-schedule-popup">×</button>
        </div>
        <div class="schedule-popup-body">
            <!-- Thay đổi ID và thêm class schedule-form-js -->
            <form id="schedule-form-popup" class="schedule-form-js" action="{{ route('schedule.store') }}" method="POST">
                @csrf
                <!-- Dùng class thay vì ID -->
                <div class="form-message-js" style="display: none;"></div>

                <div class="form-group">
                    <input type="tel" name="phone" placeholder="Số điện thoại" class="form-control input-contact">
                    <!-- Dùng data-attribute để xác định trường lỗi -->
                    <div class="error-text" data-field-error="phone"></div>
                </div>
                <div class="form-group">
                    <input type="text" name="fullname" placeholder="Họ và tên" class="form-control input-contact">
                    <div class="error-text" data-field-error="fullname"></div>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" class="form-control input-contact">
                    <div class="error-text" data-field-error="email"></div>
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Nội dung câu hỏi" class="form-control input-contact" rows="4"></textarea>
                    <div class="error-text" data-field-error="message"></div>
                </div>
                <div class="col-12 text-center">
                    <div class="btn-hover-default">
                        <!-- Dùng class thay vì ID -->
                        <button type="submit" class="btn submit-button-js">Đặt lịch</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Thêm một chút CSS để style cho lỗi --}}
<style>
    .error-text { color: red; font-size: 0.875em; margin-top: 5px; }
    .form-control.is-invalid { border-color: red; }
    .form-message-js { padding: 10px; margin-bottom: 15px; border-radius: 4px; text-align: center; }
    .form-message-js.success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    .form-message-js.error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
</style>

