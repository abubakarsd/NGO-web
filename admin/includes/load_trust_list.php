<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM tbl_partners ORDER BY id DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<tr><td colspan="7">No partner added yet</td></tr>';
    } else {
        foreach ($result as $row) {
            $output .= '
            <tr>
            <td class="footable-first-visible" style="display: table-cell;"><img src="../images/'.$row['pertner_img'].'" width="48"></td>
            <td class="footable-last-visible" style="display: table-cell;">
                <a href="#" class="btn btn-default waves-effect waves-float waves-red btn_delete_trust" id="'.$row['id'].'"><i class="zmdi zmdi-delete"></i></a>
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