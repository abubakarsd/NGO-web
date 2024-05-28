<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM urgent_donation WHERE MONTH(data_send) = MONTH(CURRENT_DATE())
    AND YEAR(data_send) = YEAR(CURRENT_DATE()) ORDER BY data_send DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<tr><td colspan="5">No donation available now</td></tr>';
    } else {
        foreach ($result as $row) {
            // Calculate the percentage raised towards the goal
            $percentage = min(($row['raised_amount'] / $row['Goal_amount']) * 100, 100);
            $output .= '
            <tr>
            <td>'.$row['donation_title'].'</td>
            <td>
                <strong>₦'.$row['Goal_amount'].'</strong>
            </td>
            <td>
                <strong>₦'.$row['raised_amount'].'</strong>
            </td>
            <td class="hidden-md-down">
                <div class="progress">
                    <div class="progress-bar l-blue" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: '.$percentage.'%;"></div>
                </div>
            </td>
            <td>'.date('d M Y', strtotime($row['date_need'])).'</td>
            </tr>
            ';
        }
    }
} catch (PDOException $e) {
    $output .= $e->getMessage();
}
echo $output;
?>