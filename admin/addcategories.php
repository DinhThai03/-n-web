<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<div class="">
    <div class="card">
        <div class="card-header d-block  justify-content-between">
            <h2 class="text-center">them</h2>

        </div>
        <?php
        $nsxList = getallnsx();
        $manhasanxuat = isset($_POST['manhasanxuat']) ? $_POST['manhasanxuat'] : null;
        $categories = [];
        if ($manhasanxuat) {
            $categories = getallcate_byID($manhasanxuat);
        }
        ?>
        <form class="" action="index.php?page_layout=addcate" method="post">
            <div class="container">
                <div class="form">
                    <div class="col"><input name="id" type="hidden"></div>
                    <br>
                    <h5>Nhập tên loại sản phẩm </h5>
                    <div class="col"><input class="form-control form-control-lg " name="tenloaisanpham" type="text"></div>
                    <h5>Nhập mã nhà sản xuất</h5>
                    <div class="col"> <select name="manhasanxuat" class="form-select" onchange="this.form.submit()">
                            <?php
                            foreach ($nsxList as $nsx) {
                                $selected = ($manhasanxuat == $nsx['manhasanxuat']) ? 'selected' : '';
                                echo "<option value='{$nsx['manhasanxuat']}' $selected>{$nsx['tennhasanxuat']}</option>";
                            }
                            ?>
                        </select></div>


                </div>
                <input style="margin-left: 45%;" class="btn btn-primary btn-md" type="submit" name="themcate" value="Thêm sp">

        </form>


    </div>
</div>