<?php
include_once('connect.php');

// Get payment details from the request
$charityid = $_POST['charityid'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$amount = $_POST['amount']; // Convert amount to int



$reference = $_POST['reference'];

// Insert donation details into the database
$stmt = $con->prepare('INSERT INTO tbl_donation (type_id, first_name, last_name, phone_number, email, amount, reference) VALUES (:typeid, :first_name, :last_name, :phone_number, :email, :amount, :reference)');
$stmt->execute(
    array(
        ':typeid' => $charityid,
        ':first_name' => $firstName,
        ':last_name' => $lastName,
        ':phone_number' => $phoneNumber,
        ':email' => $email,
        ':amount' => $amount,
        ':reference' => $reference
    )
);

// If the donation is successfully inserted, update the raised_amount for the charity
if ($stmt) {
    // Fetch the current raised_amount for the charity
    $selectqry = $con->prepare("SELECT raised_amount FROM urgent_donation WHERE id = :charityid");
    $selectqry->execute([':charityid' => $charityid]);
    $row = $selectqry->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $currentAmount = $row['raised_amount'];

        // Calculate the new raised_amount by adding the donated amount
        $newAmount = $currentAmount + $amount;

        // Update the raised_amount for the charity
        $updateqry = $con->prepare("UPDATE urgent_donation SET raised_amount = :newAmount WHERE id = :charityid");
        $updateqry->execute([':newAmount' => $newAmount, ':charityid' => $charityid]);
    }
}
?>