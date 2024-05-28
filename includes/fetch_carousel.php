<?php
include_once('connect.php');
$output = '';
$letters = range('A', 'Z'); // Array containing alphabet letters

try {
    $sql = "SELECT * FROM carousel_item ORDER BY date_added DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $key => $row) {
        // Determine the active class
        $active_class = ($key == 0) ? 'active' : 'activ' . $letters[$key - 1]; // First item gets 'active', subsequent items get 'activ' plus previous letter

        $output .= '
        <div class="item ' . $active_class . '">
        <div class="slider-overlay"></div>
         <img src="images/' . $row['img'] . '" alt="Slider Image for ' . $row['img'] . '">
         <div class="container">
             <div class="row">
                 <div class="col-md-6 col-sm-12 col-xs-12 slider-content">
                     <div class="slider-content-inner">
                         <h2>'.$row['header_text'].'</h2>
                         <h1 class="delay1">'.$row['sub_header_text'].'</h1>
                     </div>
                 </div>
             </div>
         </div>
        </div>
        ';
    }
    $output .= '
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <i class="fa fa-angle-left" aria-hidden="true"></i>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <i class="fa fa-angle-right" aria-hidden="true"></i>
    </a>	
    ';
} catch (PDOException $e) {
    $output .= $e->getMessage();
}
echo $output;
?>