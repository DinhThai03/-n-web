<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/app.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



  <title>XGAER</title>

  <style>
    .btn-buy {
      height: 10%;
      width: 60%;
    }

    body {
      background-color: #ececec;
    }



    @media only screen and (max-width:576px) {
      .img-select img {
        width: 100%;
      }

      .ccc {
        display: none;
      }

    }

    @media only screen and (min-width:576px) and (max-width:769px) {
      .img-select {
        display: flex;
        flex-wrap: wrap;
      }

      .img-select img {
        width: 90px;
      }

      .ccc {
        display: none;
      }

    }

    @media only screen and (min-width:769px) and (max-width:1400px) {
      .img-select img {
        width: 100%;
      }

    }
  </style>
</head>

<body>
  <?php
  if ($prodetail == 0) {
    echo "<h2> khong ton tai </h2>";
  } else {

    echo ' <div class="product-detail">
        <div class="container bg-white" style="margin-bottom: 50px; padding-bottom: 20px;">
          <div class="row"> <!--hinh anh minh hoa-->
            <div class="col col-sm-5 col-md-5 col-lg-5">
             <img src="./image/' . $prodetail['anhlaptop'] . '"  alt="">
            </div>
            <div class="col col-sm-6 col-md-1 col-lg-1 ccc"></div>
            <div class="col col-sm col-md-6 col-lg-6"> <!-- thong tin mua hang-->
              <h3 style="text-transform: uppercase;"> ' . $prodetail['tensp'] . '; </h3> <br>
              <div class="icon-rating text-danger">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half" aria-hidden="true"></i>
                (20 đánh giá )
              </div>
              <form action="index.php?page_layout=addcart" method=post>
              <div>
              <input type="submit" class="btn btn-danger" value="Mua hàng" name="addtocart">
              </div>
              <input type="hidden" value="' . $prodetail['id'] . '" name="id">
              <input type="hidden" value="' . $prodetail['tensp'] . '" name="tensp">
              <input type="hidden" value="' . $prodetail['anhlaptop'] . '" name="anhlaptop">
              <input type="hidden" value="' . $prodetail['price'] . '" name="price">
              </form>
              <p><i class="fa-solid fa-check"></i> Bảo hành chính hãng 24 tháng. </p>
              <p><i class="fa-solid fa-check"></i> Hỗ trợ đổi mới trong 7 ngày. </p>
              <p><i class="fa-solid fa-check"></i> Windows bản quyền tích hợp. </p>
              <hr>
              <h4 class="text-danger">Quà tặng:</h4>
              <p><i class="fa-solid fa-gift text-warning"></i> Balo ROG (kèm máy) </p>
  
              <div class="khuyenmai" style="border: solid 1px gainsboro; border-radius: 3px;">
  
  
                <h4 style="background-color: gainsboro;">Khuyến mãi</h4>
                <p><i class="fa-solid fa-check text-success"></i>Giảm thêm 500.000đ khi mua kèm màn hình với laptop. </p>
                <p><i class="fa-solid fa-check text-success"></i>Giảm thêm 500.000đ khi mua kèm màn hình với laptop. </p>
                <p><i class="fa-solid fa-check text-success"></i>Giảm thêm 500.000đ khi mua kèm màn hình với laptop. </p>
                <p><i class="fa-solid fa-check text-success"></i>Giảm thêm 500.000đ khi mua kèm màn hình với laptop. </p>
              </div>
  
  
            </div>
          </div>
        </div>
        <div class="container margin-top-100">
          <div class="row">
            <div class="col col-sm-6 col-md-6 col-lg-6 bg-white" style="border-radius: 3px;"><!-- thong tin chi tiet san pham-->
              <br>
              <h3><b>Thông số kĩ thuật</b></h3>
                ' . $prodetail['mota'] . '

            </div>
        ';
  } ?>
  <div class="col-12 col-sm-6 col-md-6 col-lg-6 "> <!--San pham tuong tu-->
    <div class="suggest bg-white" style="border-radius: 3px; ">
      <h2>Sản phẩm tương tự</h2>
      <br>
      <div class="product-suggest">
        <div class="container">
          <div class="row">
            <div class="col col-lg-4"><img width="100%" src="./image./image-removebg-preview-1_637937502599473597.webp" alt=""></div>
            <div class="col col-lg-8" style="display: flex;justify-content: center;align-items: center;">
              <span>
                <h4>Laptop Gaming Tuf F15 fx515hf</h4>
                <del>29.990.000đ</del>
                <h3 class="text-danger">27.990.000đ <span class="text-danger" style="font-size: small; font-weight: normal;">-7%</span></h3>
                <p>0.0<i class="fa fa-star text-warning" aria-hidden="true"></i>(đánh giá)</p>

              </span>
            </div>
          </div>
          <div class="row">
            <div class="col col-lg-4"><img width="100%" src="./image/acer-gaming.webp" alt=""></div>
            <div class="col col-lg-8" style="display: flex;justify-content: center;align-items: center;">
              <span>
                <h4>Laptop Acer Aspire 3 A314 42P </h4>
                <del>29.990.000đ</del>
                <h3 class="text-danger">27.990.000đ <span class="text-danger" style="font-size: small; font-weight: normal;">-7%</span></h3>
                <p>0.0<i class="fa fa-star text-warning" aria-hidden="true"></i>(đánh giá)</p>

              </span>
            </div>
          </div>


        </div>

      </div>

    </div>

  </div>

  </div>
  </div>
  </div>
  </div>



  <script>
    const imgs = document.querySelectorAll('.img-select a')
    const imgBtns = [...imgs]
    let imgId = 1

    imgBtns.forEach((imgItem) => {
      imgItem.addEventListener('click', (even) => {
        event.preventDefault()
        imgId = imgItem.dataset.id
        slideImg()
      })

    })

    function slideImg() {
      const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth

      document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId -1)*displayWidth}px)`
    }
  </script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>