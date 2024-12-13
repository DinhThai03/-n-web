<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <form action="index.php?page_layout=login" method="post">
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="text" name="tentk" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="matkhau" type="password" class="form-control">
        </div>

        <input type="submit" name="login" value="dangnhap">
        <?php
        if (isset($txt_error) && ($txt_error != "")) {
            echo $txt_error;
        }
        ?>

    </form>



    <a href="signup.php">dangky</a>
</body>

</html>