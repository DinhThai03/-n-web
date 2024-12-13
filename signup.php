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
    <form action="index.php?page_layout=signup" method="post" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">User name</label>
            <input type="username" name="username" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" name="userpass" class="form-control">
        </div>

        <div class="col-12">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>


        <div class="col-md-12">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="col-12">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="address">
        </div>

        <div class="col-12">
            <input type="submit" class="btn btn-primary" name="signup" value="đăng ký">
        </div>
    </form>



</body>

</html>