<link rel="stylesheet" href="../assets/css/account.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<?php include_once '../../config/constant.php';?>

<body>
<a href="<?= URLROOT; ?>" class="home-button"><i class="fas fa-arrow-left"></i> Trang chủ</a>
    <h2>ĐĂNG KÝ / ĐĂNG NHẬP</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="../util/handleAccount.php" method="POST">
                <h1>Tạo tài khoản</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-linkedin"></i></a>
                </div>
                <span>hoặc sử dụng email để đăng ký</span>
                <input type="text" name="username" placeholder="Tên đăng nhập" required/>
                <input type="email" name="email" placeholder="Email" required/>
                <input type="password" name="password" placeholder="Mật khẩu" required/>
                <button type="submit" name="register">Đăng ký</button>
                <?php if (isset($_GET['error'])): ?>
                    <p class="error-message" id="error-message" style="color: red;font-size: 0.9em;"><?= $_GET['error']; ?></p>
                <?php endif; ?>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="../util/handleAccount.php" method="POST">
                <h1>Đăng nhập</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>hoặc sử dụng tài khoản của bạn</span>
                <input type="text" name="usernameLogin" placeholder="Tên đăng nhập" required/>
                <input type="password" name="passwordLogin" placeholder="Mật khẩu" required/>
                <a href="#">Quên mật khẩu?</a>
                <button name="login">Đăng nhập</button>
                <?php if (isset($_GET['error-login'])): ?>
                    <p class="error-message" id="error-message" style="color: red;font-size: 0.9em;"><?= $_GET['error-login']; ?></p>
                <?php endif; ?>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào mừng tới Rosie Beauty</h1>
                    <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Xin chào !</h1>
                    <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="../assets/js/account.js"></script>


