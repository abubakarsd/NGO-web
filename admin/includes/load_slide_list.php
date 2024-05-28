<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM carousel_item ORDER BY date_added DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<tr><td colspan="7">No Urgent Causes Donation for now</td></tr>';
    } else {
        foreach ($result as $row) {
            $output .= '
            <tr>
            <td class="footable-first-visible" style="display: table-cell;"><img src="../images/'.$row['img'].'" width="48" alt="'.$row['header_text'].'"></td>
            <td style="display: table-cell;">'.$row['header_text'].'</td>
            <td style="display: table-cell;"><span class="text-muted">'.$row['sub_header_text'].'</span></td>
            <td style="display: table-cell;"><span class="col-red">'.$row['date_added'].'</span></td>
            <td class="footable-last-visible" style="display: table-cell;">
                <a href="#" class="btn btn-default waves-effect waves-float waves-red btn_delete_slide" id="'.$row['id'].'"><i class="zmdi zmdi-delete"></i></a>
            </td>
            </tr>
            ';
        }
    }
} catch (PDOException $e) {
    $output .= $e->getMessage();
}
echo $output;
?>
