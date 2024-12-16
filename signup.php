<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <style>
        .error-message {
            color: red;
            font-size: 0.875rem;
        }

        .is-invalid {
            border-color: red;
        }
    </style>
</head>

<body>

    <div class="container">



        <form name="signup" action="" method="post" class="row justify-content-center" onsubmit="return validateForm()">

            <div class="col-md-6 col-lg-6">
                <?php
                include_once "connect/connect.php";
                
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['signup'])) {
                        $tentk = $_POST['tentk'];
                        $matkhau = $_POST['matkhau'];
                        $ten = $_POST['ten'];
                        $email = $_POST['email'];
                        $dienthoai = $_POST['dienthoai'];
                        $diachi = $_POST['diachi'];

                        $result = registerUser($tentk, $matkhau, $ten, $email, $dienthoai, $diachi);

                        echo '<span class="error-message">' .$result . '</span>';
                    }
                }

                ?>
                <div class="mb-3">
                    <label class="form-label">User name</label>
                    <input type="text" name="tentk" class="form-control" id="username">
                    <span class="error-message" id="username-error"></span>

                </div>
                <div class="mb-3">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" name="matkhau" class="form-control" id="password">
                    <span class="error-message" id="password-error"></span>
                </div>

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="ten" id="name">
                    <span class="error-message" id="name-error"></span>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                    <span class="error-message" id="email-error"></span>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="dienthoai" class="form-control" id="phone">
                    <span class="error-message" id="phone-error"></span>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="diachi" id="address">
                    <span class="error-message" id="address-error"></span>
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="signup" value="Đăng ký">
                </div>
            </div>
        </form>
    </div>


    <script>
        // Kiểm tra username
        function validateUsername(username) {
            const regex = /^[a-zA-Z0-9]{3,}$/;
            if (!regex.test(username)) {
                return "Username phải có ít nhất 3 ký tự, chỉ bao gồm chữ cái và số.";
            }
            return '';
        }

        // Kiểm tra password
        function validatePassword(password) {
            const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
            if (!regex.test(password)) {
                return "Password phải có ít nhất 6 ký tự, gồm một chữ cái viết hoa, một chữ cái viết thường và một số.";
            }
            return '';
        }

        // Kiểm tra name
        function validateName(name) {
            const regex = /^[\p{L}\s]+$/gu; // Cho phép ký tự có dấu tiếng Việt và khoảng trắng
            if (!regex.test(name)) {
                return "Tên phải bao gồm chữ cái và khoảng trắng.";
            }
            return '';
        }

        // Kiểm tra email
        function validateEmail(email) {
            const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!regex.test(email)) {
                return "Địa chỉ email không hợp lệ.";
            }
            return '';
        }

        // Kiểm tra phone
        function validatePhone(phone) {
            const regex = /^\d{10}$/;
            if (!regex.test(phone)) {
                return "Số điện thoại phải bao gồm 10 chữ số.";
            }
            return '';
        }

        // Kiểm tra address
        function validateAddress(address) {
            if (address.length < 5) {
                return "Địa chỉ phải có ít nhất 5 ký tự.";
            }
            return '';
        }

        // Kiểm tra mỗi trường khi người dùng nhập
        function checkInputField(inputElement, validateFunction, errorElement) {
            let value = inputElement.value;
            let errorMessage = validateFunction(value);
            if (errorMessage) {
                errorElement.textContent = errorMessage;
                inputElement.classList.add("is-invalid");
            } else {
                errorElement.textContent = "";
                inputElement.classList.remove("is-invalid");
            }
        }

        document.getElementById("username").addEventListener("input", function() {
            checkInputField(this, validateUsername, document.getElementById("username-error"));
        });

        document.getElementById("password").addEventListener("input", function() {
            checkInputField(this, validatePassword, document.getElementById("password-error"));
        });

        document.getElementById("name").addEventListener("input", function() {
            checkInputField(this, validateName, document.getElementById("name-error"));
        });

        document.getElementById("email").addEventListener("input", function() {
            checkInputField(this, validateEmail, document.getElementById("email-error"));
        });

        document.getElementById("phone").addEventListener("input", function() {
            checkInputField(this, validatePhone, document.getElementById("phone-error"));
        });

        document.getElementById("address").addEventListener("input", function() {
            checkInputField(this, validateAddress, document.getElementById("address-error"));
        });

        // Hàm kiểm tra form khi submit
        function validateForm() {
            let isValid = true;
            let username = document.getElementById("username").value;
            let password = document.getElementById("password").value;
            let name = document.getElementById("name").value;
            let email = document.getElementById("email").value;
            let phone = document.getElementById("phone").value;
            let address = document.getElementById("address").value;

            // Kiểm tra username
            let usernameError = validateUsername(username);
            if (usernameError) {
                document.getElementById("username-error").textContent = usernameError;
                isValid = false;
            }

            // Kiểm tra password
            let passwordError = validatePassword(password);
            if (passwordError) {
                document.getElementById("password-error").textContent = passwordError;
                isValid = false;
            }

            // Kiểm tra name
            let nameError = validateName(name);
            if (nameError) {
                document.getElementById("name-error").textContent = nameError;
                isValid = false;
            }

            // Kiểm tra email
            let emailError = validateEmail(email);
            if (emailError) {
                document.getElementById("email-error").textContent = emailError;
                isValid = false;
            }

            // Kiểm tra phone
            let phoneError = validatePhone(phone);
            if (phoneError) {
                document.getElementById("phone-error").textContent = phoneError;
                isValid = false;
            }

            // Kiểm tra address
            let addressError = validateAddress(address);
            if (addressError) {
                document.getElementById("address-error").textContent = addressError;
                isValid = false;
            }

            return isValid;
        }
    </script>
</body>

</html>