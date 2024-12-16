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

    <div class="container">

        <form action="index.php?page_layout=signup" method="post" class="row justify-content-center">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                <div class="mb-3">
                    <label class="form-label">User name</label>
                    <input type="username" name="tentk" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" name="matkhau" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="ten">
                </div>


                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="dienthoai" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="diachi">
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="signup" value="đăng ký">
                </div>
            </div>

        </form>
    </div>


</body>

</html>