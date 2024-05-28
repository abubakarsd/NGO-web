<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM tbl_program ORDER BY date_added DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<tr><td colspan="7">No program uploaded yet</td></tr>';
    } else {
        foreach ($result as $row) {
            // Calculate the number of days left
            $dateNeed = new DateTime($row['prog_date']);
            $currentDate = new DateTime();
            $interval = $currentDate->diff($dateNeed);
            $daysLeft = $interval->days;

            $output .= '
            <tr>
            <td class="footable-first-visible" style="display: table-cell;"><img src="../images/'.$row['program_img'].'" width="48" alt="'.$row['program_head'].'"></td>
            <td style="display: table-cell;">'.$row['program_head'].'</td>
            <td style="display: table-cell;"><span class="col-red">'.$row['prog_location'].'</span></td>
            <td style="display: table-cell;"><span class="text-muted">'.$daysLeft.' Days left</span></td>
            <td class="footable-last-visible" style="display: table-cell;">
                <a href="#" class="btn btn-default waves-effect waves-float waves-green btn_edit_program" id="'.$row['id'].'"><i class="zmdi zmdi-edit"></i></a>
                <a href="#" class="btn btn-default waves-effect waves-float waves-red btn_delete_program" id="'.$row['id'].'"><i class="zmdi zmdi-delete"></i></a>
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