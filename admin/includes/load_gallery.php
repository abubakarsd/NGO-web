<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM tbl_galary ORDER BY data_add DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<div class="col-lg-2 col-md-4 col-sm-12"><div class="card product_item">No more image yet</div></div>';
    } else {
        foreach ($result as $row) {
            $output .= '
            <div class="col-lg-2 col-md-4 col-sm-8">
            <div class="card product_item">
                <div class="body">
                    <div class="cp_img">
                        <img src="../images/'.$row['img'].'" alt="Product" class="img-fluid">
                        <div class="hover">
                            <a href="#" class="btn btn-primary waves-effect btn-delete-image" id="'.$row['id'].'"><i class="zmdi zmdi-delete"></i></a>
                        </div>
                    </div>
                    <div class="product_details">
                        <h5><a href="ec-product-detail.html">'.$row['img_tile'].'</a></h5>
                    </div>
                </div>
            </div>                
        </div>';
        }
    }
} catch (PDOException $e) {
    $output .= $e->getMessage();
}
echo $output;
?>