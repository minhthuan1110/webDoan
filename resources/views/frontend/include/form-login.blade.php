<!-- login modal -->
<div class="modal js-modal-close">
    <div class="modal-container">
        <header class="form-header">
            <a href="#" class="form-header__action active">Đăng nhập</a>
            <a href="#" class="form-header__action ">Đăng ký</a>
        </header>

        {{-- Form Login --}}
        <div class="form-body form-body-login active">
            <h4 class="form-title">Đăng nhập tại đây!</h4>
            <p class="form-description">Đăng nhập vào tài khoản của bạn chỉ trong một vài bước đơn giản</p>
            <form id="login-form" action="{{ route('login') }}" method="POST">
                @csrf
                <input type="email" id="email" name="email" placeholder="Email" required>
                <label for="Email"></label>
                <input type="password" id="password" name="password" placeholder="Mật khẩu" required>
                <label for="password"></label>

                <div class="remember-me">
                    <label class="remember-lable" for="remember-radio">Nhớ đăng nhập</label>
                    <input type="checkbox" name="remember" id="remember-radio" value="1">
                </div>
                <div class="form-btn">
                    <p class="forgot-password">Quên mật khẩu?</p>
                    <button type="submit">Đăng nhập</button>
                </div>
            </form>
            <div class="form-login-social">
                <p class="form-descriotion">Đăng nhập với Facebook hoặc Google</p>
                <div class="google-facebook">
                    <a href="{{ url('/auth/facebook/redirect') }}" class="facebook"><i
                            class="fab fa-facebook-f"></i>Facebook</a>
                    <a href="{{ url('/auth/google/redirect') }}" class="google"><i
                            class="fab fa-google-plus-g"></i>Google</a>
                </div>
            </div>
        </div>

        {{-- Form Register --}}
        <div class="form-body form-body-register ">
            <h4 class="form-title">Đăng ký ngay!</h4>
            <p class="form-description">Tham gia cộng đồng Viettour ngay hôm nay và lập tài khoản miễn phí</p>

            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>

            <form id="register-form" action="{{ route('register') }}" method="POST">
                @csrf
                <input type="text" id="name" name="name" placeholder="Tên" required>
                <label for="name"></label>
                <input class="email" type="email" id="email" name="email" placeholder="Email" required>
                <label for="email"></label>
                <input type="password" id="password" name="password" placeholder="Mật khẩu" required>
                <label for="password"></label>
                <input type="password" id="re_password" name="re_password" placeholder="Nhập lại mật khẩu" required>
                <label for="re_password"></label>

                <div class="form-btn">
                    <button type="submit">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
</div>
