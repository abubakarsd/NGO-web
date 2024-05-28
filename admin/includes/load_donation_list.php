<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM urgent_donation WHERE status = 1 ORDER BY data_send DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<tr><td colspan="7">No Urgent Causes Donation for now</td></tr>';
    } else {
        foreach ($result as $row) {
            // Calculate the number of days left
            $dateNeed = new DateTime($row['date_need']);
            $currentDate = new DateTime();
            $interval = $currentDate->diff($dateNeed);
            $daysLeft = $interval->days;

            $output .= '
            <tr>
            <td class="footable-first-visible" style="display: table-cell;"><img src="../images/'.$row['donation_img'].'" width="48" alt="'.$row['donation_title'].'"></td>
            <td style="display: table-cell;">'.$row['donation_title'].'</td>
            <td style="display: table-cell;"><span class="text-muted">'.$daysLeft.'</span></td>
            <td style="display: table-cell;"><span class="col-red">'.$row['location'].'</span></td>
            <td style="display: table-cell;">₦'.number_format($row['Goal_amount'], 2).'</td>
            <td style="display: table-cell;">₦'.number_format($row['raised_amount'], 2).'</td>
            <td class="footable-last-visible" style="display: table-cell;">
                <a href="#" class="btn btn-default waves-effect waves-float waves-green btn_edit_donation" id="'.$row['id'].'"><i class="zmdi zmdi-edit"></i></a>
                <a href="#" class="btn btn-default waves-effect waves-float waves-red btn_delete_donation" id="'.$row['id'].'"><i class="zmdi zmdi-delete"></i></a>
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