

<section class="contact-section section">
    <!-- ... toàn bộ phần HTML của bạn cho các họa tiết ... -->
    <div class="container">
        <div class="contact-box">
            <span class="corner-deco corner-top-left"><img src="{{ asset('assets/images/hoa_van_khung_1.svg') }}" alt="" class="img-fluid"></span>
            <span class="corner-deco corner-top-right"><img src="{{ asset('assets/images/hoa_van_khung_2.svg') }}" alt="" class="img-fluid"></span>
            <span class="corner-deco corner-bottom-left"><img src="{{ asset('assets/images/hoa_van_khung_3.svg') }}" alt="" class="img-fluid"></span>
            <span class="corner-deco corner-bottom-right"><img src="{{ asset('assets/images/hoa_van_khung_4.svg') }}" alt="" class="img-fluid"></span>
            <div class="row g-4">
                <div class="col-lg-5 contact-info p-0">
                    <h2 class="contact-title">Liên hệ chúng tôi</h2>
                    <p class="contact-description">Quý khách có thể <b>đặt lịch tư vấn</b> bằng cách để lại thông tin bên cạnh hoặc <b>chủ động liên hệ</b> qua các kênh dưới đây.</p>
                    <p class="contact-hours">Chúng tôi sẽ phản hồi sớm trong khung giờ: <b>8h – 17:30h</b></p>
                    <ul class="contact-list">
                        <li><i class="fas fa-phone-alt"></i> <a href="tel:190011234"  class="text-dark"  style="letter-spacing: 1px;">190011234</a></li>
                        <li><i class="fas fa-mobile-alt"></i> <a href="tel:023464765456"  class="text-dark"  style="letter-spacing: 1px;">023464765456</a> </li>
                        <li><i class="fas fa-envelope"></i> <a href="mailto:phongthuydaicat@gmail.com" class="text-dark" style="letter-spacing: 1px;">phongthuydaicat@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col-lg-7 contact-form-wrapper p-0">
                    <form id="contactForm-contact" method="POST" class="contact-form" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <input name="username" type="text" class="form-control input-contact impgut" placeholder="Họ và tên">
                                <div class="error-text" data-field-error="username"></div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <!-- THAY ĐỔI: Bỏ (Không bắt buộc) -->
                                <input name="phone" type="tel" class="form-control input-contact impgut" placeholder="Số điện thoại">
                                <div class="error-text" data-field-error="phone"></div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <input name="email" type="email" class="form-control input-contact impgut" placeholder="Email (Không bắt buộc)">
                                <div class="error-text" data-field-error="email"></div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <!-- THAY ĐỔI: Thêm (Không bắt buộc) -->
                                <input name="address" type="text" class="form-control input-contact impgut" placeholder="Địa chỉ liên hệ (Không bắt buộc)">
                                <div class="error-text" data-field-error="address"></div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="select-wrapper">
                                    <!-- THAY ĐỔI: Thêm 'required' để kích hoạt CSS :invalid cho placeholder -->
                                    <select name="loai_dich_vu" class="form-control input-contact impgut" required>
                                        <option value="" disabled selected>Chọn loại hình dịch vụ</option>
                                        <option value="Tư vấn phong thủy dương trạch">Tư vấn phong thủy dương trạch</option>
                                        <option value="Đặt tên phong thủy">Đặt tên phong thủy</option>
                                        <option value="Chọn ngày giờ tốt">Chọn ngày giờ tốt</option>
                                        <option value="Luận giải tử vi">Luận giải tử vi</option>
                                        <option value="Gói tư vấn tình duyên - hôn nhân">Gói tư vấn tình duyên - hôn nhân</option>
                                    </select>
                                </div>
                                <div class="error-text" data-field-error="loai_dich_vu"></div>
                            </div>
                            <div class="col-12 mb-2">
                                <textarea name="mo_ta" class="form-control input-contact impgut" rows="4" placeholder="Mô tả nhu cầu dịch vụ"></textarea>
                                <div class="error-text" data-field-error="mo_ta"></div>
                            </div>
                            <div class="text-description-contact">
                                Chỉ mất 1 phút để để lại thông tin – Chúng tôi sẽ liên hệ lại trong 
thời gian sớm nhất!
                            </div>
                            <div class="col-12 text-center">
                                <div class="btn-hover-default">
                                    <button type="submit" class="btn">Đặt lịch</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function showToast(message, type = 'success', iconHtml = '') {
        const container = document.getElementById('toast-container');
        if (!container) return;

        const toastWrapper = document.createElement('div');
        toastWrapper.className = 'toaasst';

        const toastContent = document.createElement('div');
        toastContent.className = `toast-show toast-${type}`;
        
        toastContent.innerHTML = `${iconHtml}<span class="toast-message">${message}</span>`;
        
        toastWrapper.appendChild(toastContent);
        container.appendChild(toastWrapper);

        setTimeout(() => {
            toastWrapper.classList.add('toast-hiding');
            toastWrapper.addEventListener('animationend', () => {
                toastWrapper.remove();
            }, { once: true });
        }, 3000);
    }

    document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.getElementById('contactForm-contact');
        if (!contactForm) return;

        // THAY ĐỔI: Cập nhật lại toàn bộ logic validation
        function validateForm(formData) {
            const errors = {};
            const phone = formData.get('phone')?.trim();
            const email = formData.get('email')?.trim();

            // Các trường bắt buộc
            if (!formData.get('username')?.trim()) {
                errors.username = 'Vui lòng nhập họ và tên.';
            }
            if (!phone) {
                errors.phone = 'Vui lòng nhập số điện thoại.';
            } else if (!/^[0-9]{10,11}$/.test(phone.replace(/\s/g, ''))) {
                errors.phone = 'Số điện thoại không hợp lệ.';
            }
            if (!formData.get('loai_dich_vu')?.trim()) {
                errors.loai_dich_vu = 'Vui lòng chọn loại hình dịch vụ.';
            }
            if (!formData.get('mo_ta')?.trim()) {
                errors.mo_ta = 'Vui lòng mô tả nhu cầu.';
            }

            // Các trường không bắt buộc (chỉ kiểm tra định dạng nếu có nhập)
            if (email && !/^\S+@\S+\.\S+$/.test(email)) {
                errors.email = 'Địa chỉ email không hợp lệ.';
            }
            // Trường 'address' không bắt buộc nên không cần kiểm tra

            return errors;
        }
        // KẾT THÚC THAY ĐỔI

        function displayErrors(errors) {
            for (const field in errors) {
                const input = contactForm.querySelector(`[name="${field}"]`);
                const errorElement = contactForm.querySelector(`[data-field-error="${field}"]`);
                if (input) input.classList.add('is-invalid');
                if (errorElement) errorElement.textContent = errors[field];
            }
        }

        function clearAllErrors() {
            contactForm.querySelectorAll('.error-text').forEach(el => el.textContent = '');
            contactForm.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        }

        contactForm.querySelectorAll('.impgut').forEach(input => {
            const eventType = input.tagName === 'SELECT' ? 'change' : 'input';
            input.addEventListener(eventType, () => {
                if (input.classList.contains('is-invalid')) {
                    input.classList.remove('is-invalid');
                    const errorElement = contactForm.querySelector(`[data-field-error="${input.name}"]`);
                    if (errorElement) errorElement.textContent = '';
                }
            });
        });

        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            clearAllErrors();
            const formData = new FormData(contactForm);
            const errors = validateForm(formData);
            const submitButton = contactForm.querySelector('button[type="submit"]');

            if (Object.keys(errors).length > 0) {
                displayErrors(errors);
                return;
            }

            submitButton.disabled = true;
            submitButton.textContent = 'Đang gửi...';

            fetch("{{ route('storecontact') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': formData.get('_token'),
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const successIcon = "<div class='icon-toast icon-scess'><i class='fas fa-check'></i></div>";
                const errorIcon = "<div class='icon-toast icon-error'><i class='fas fa-times'></i></div>";

                if (data.status === 'success') {
                    showToast(data.message, 'success', successIcon);
                    contactForm.reset();
                } else {
                    showToast(data.message || 'Đã có lỗi xảy ra.', 'error', errorIcon);
                }
            })
            .catch(error => {
                console.error('Lỗi:', error);
                const errorIcon = "<div class='icon-toast'><i class='fas fa-exclamation-triangle'></i></div>";
                showToast('Lỗi kết nối đến máy chủ!', 'error', errorIcon);
            })
            .finally(() => {
                submitButton.disabled = false;
                submitButton.textContent = 'Đặt lịch';
            });
        });
    });
</script>