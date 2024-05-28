<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM tbl_team ORDER BY id DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<tr><td colspan="7">No team member added yet</td></tr>';
    } else {
        foreach ($result as $row) {
            $output .= '
            <tr>
            <td class="footable-first-visible" style="display: table-cell;"><img src="../images/'.$row['team_image'].'" width="48" alt="'.$row['team_name'].'"></td>
            <td style="display: table-cell;">'.$row['team_name'].'</td>
            <td style="display: table-cell;"><span class="text-muted">'.$row['team_position'].'</span></td>
            <td class="footable-last-visible" style="display: table-cell;">
                <a href="#" class="btn btn-danger waves-effect waves-float waves-red btn_delete_team" id="'.$row['id'].'"><i class="zmdi zmdi-delete"></i></a>
                <a href="#" class="btn btn-primary waves-effect waves-float waves-red btn_edit_team" id="'.$row['id'].'"><i class="zmdi zmdi-edit"></i></a>
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