<style>
    .card {
        margin-top: 100px;
        margin-right: 250px;
    }
</style>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Login</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="form-valide-with-icon" action="<?=base_url('home/aksi_login')?>" method="post">
                                <div class="form-group">
                                    <label class="text-label">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="val-username1" name="username" placeholder="Enter a username.." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-label">Password *</label>
                                    <div class="input-group transparent-append">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="val-password1" name="password" placeholder="Choose a safe one.." required>
                                        <div class="input-group-append show-pass">
                                            <span class="input-group-text" onclick="togglePasswordVisibility()"><i id="password-icon" class="fa fa-eye-slash"></i></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Container untuk reCAPTCHA -->
                                <div id="recaptchaContainer" class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LeKfiAqAAAAAIYfzHJCoT6fOpGTpktdJza3fixn"></div>
                                </div>

                                <!-- Container untuk CAPTCHA gambar -->
                                <div id="captchaContainer" class="form-group" style="display: none;">
                                    <label for="captcha_code">Enter the code shown:</label>
                                    <img id="captchaImage" alt="CAPTCHA">
                                    <input type="text" class="form-control" id="captcha_code" name="captcha_code">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="submit" class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan script Google reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Tambahkan JavaScript untuk show/hide password -->
<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('val-password1');
        const passwordIcon = document.getElementById('password-icon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.classList.remove('fa-eye-slash');
            passwordIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            passwordIcon.classList.remove('fa-eye');
            passwordIcon.classList.add('fa-eye-slash');
        }
    }
</script>

<!-- Script untuk deteksi koneksi dan mengatur CAPTCHA -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const captchaContainer = document.getElementById('captchaContainer');
        const recaptchaContainer = document.getElementById('recaptchaContainer');
        const captchaCodeInput = document.getElementById('captcha_code');
        const captchaImage = document.getElementById('captchaImage');

        if (navigator.onLine) {
            // Jika ada koneksi internet, tampilkan reCAPTCHA
            recaptchaContainer.style.display = 'block';
            captchaContainer.style.display = 'none';
            captchaCodeInput.removeAttribute('required');
        } else {
            // Jika tidak ada koneksi internet, tampilkan CAPTCHA gambar
            recaptchaContainer.style.display = 'none';
            captchaContainer.style.display = 'block';
            captchaCodeInput.setAttribute('required', 'required');
            captchaImage.src = '<?= base_url('home/generateCaptcha') ?>'; // URL ke fungsi CAPTCHA gambar
        }
    });
</script>
