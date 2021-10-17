<?php
// Connect database
include "./config/db.php";

    //Password Change
    if(isset($_POST['password_change_btn'])) {

        $newPassword    = $conn->real_escape_string($_POST['newPassword']);
        $password       = $conn->real_escape_string($_POST['password']);

        $password = sha1($_POST['password']);
        $id = $_SESSION['id'];
        $newPassword = sha1($_POST['newPassword']);
        $sql=mysqli_query($conn,"SELECT * FROM users where password='$password' && id='".$_SESSION['id']."'");
        $num=mysqli_fetch_array($sql);
        if($num>0)
        {
            $conn=mysqli_query($conn,"UPDATE users SET password='$newPassword' where id='".$_SESSION['id']."'");
            $_SESSION['success_message'] = "Please login with the new password 👍";
            echo "<meta http-equiv='refresh' content='3; URL=logout'>";
        }
        else
        {
            $_SESSION['error_message'] = "Current password mismatch";
            echo "<meta http-equiv='refresh' content='3; URL=security'>";
        }
    }


    //Profile Update
    if(isset($_POST['update_profile_btn'])) {

        $firstName = $conn->real_escape_string($_POST['firstName']);
        $lastName = $conn->real_escape_string($_POST['lastName']);
        $email = $conn->real_escape_string($_POST['email']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $dateOfBirth = $conn->real_escape_string($_POST['dateOfBirth']);
        $address = $conn->real_escape_string($_POST['address']);
        $nameOfNOK = $conn->real_escape_string($_POST['nameOfNOK']);
        $nokTel = $conn->real_escape_string($_POST['nokTel']);
        $nokAddress = $conn->real_escape_string($_POST['nokAddress']);
        $nokRelationship = $conn->real_escape_string($_POST['nokRelationship']);

        $id = $_SESSION['id'];
        $sql=mysqli_query($conn,"SELECT * FROM users where id='".$_SESSION['id']."'");
        $result=mysqli_fetch_array($sql);
        if($result>0)
        {
            $conn=mysqli_query($conn,"UPDATE users SET firstName='$firstName', lastName='$lastName', firstName='$firstName', email='$email', phone='$phone', dateOfBirth='$dateOfBirth', address='$address', nameOfNOK='$nameOfNOK', nokTel='$nokTel', nokAddress='$nokAddress', nokRelationship='$nokRelationship' where id='".$_SESSION['id']."'");
            $_SESSION['success_message'] = "Profile updated 👍";
            echo "<meta http-equiv='refresh' content='2; URL=profile'>";
        }
        else
        {
            $_SESSION['error_message'] = "Error updating profile.";
            echo "<meta http-equiv='refresh' content='2; URL=profile'>";
        }
    }


    //Upload Profile Picture
    if (isset($_POST['profile_picture_btn'])) {

        $id = $_SESSION['id'];
        $id = $conn->real_escape_string($_POST['id']);
        $picture_path  = $conn->real_escape_string('./upload/'.$_FILES['picture']['name']);

        if (file_exists($picture_path))
        {
            $picture_path = $conn->real_escape_string('./upload/'.uniqid().rand().$_FILES['picture']['name']);
        }

        $checker = 0;

        //make sure file type is image
        if (preg_match("!image!", $_FILES['picture']['type'])) {
            $checker ++;
        }
        if ($checker < 1){
            exit;
        }

        $sql=mysqli_query($conn,"SELECT * FROM users where id='".$_SESSION['id']."'");
        $num=mysqli_fetch_array($sql);
        if($num>0)
        {
            $conn=mysqli_query($conn,"UPDATE users SET picture='$picture_path'  where id='".$_SESSION['id']."'");

            //copy image to upload folder
            copy($_FILES['picture']['tmp_name'], $picture_path);

            $_SESSION['success_message'] = "Profile picture updated 👍";
            echo "<meta http-equiv='refresh' content='2; URL=profile'>";
        }
        else
        {
            $_SESSION['error_message'] = "Error updating profile.";
            echo "<meta http-equiv='refresh' content='2; URL=profile'>";
        }
    }


    //Send Report
    if (isset($_POST['send_report_btn'])) {

        $id = $conn->real_escape_string($_POST['id']);
        $staffID = $conn->real_escape_string($_POST['staffID']);
        $branch = $conn->real_escape_string($_POST['branch']);
        $staffName = $conn->real_escape_string($_POST['staffName']);
        $workShift = $conn->real_escape_string($_POST['workShift']);
        $salesCash = $conn->real_escape_string($_POST['salesCash']);
        $fcmbAmount = $conn->real_escape_string($_POST['fcmbAmount']);
        $firstBankAmount = $conn->real_escape_string($_POST['firstBankAmount']);
        $diamondBankAmount = $conn->real_escape_string($_POST['diamondBankAmount']);
        $sterlingBankAmount = $conn->real_escape_string($_POST['sterlingBankAmount']);
        $zenithBankAmount = $conn->real_escape_string($_POST['zenithBankAmount']);
        $titanBankAmount = $conn->real_escape_string($_POST['titanBankAmount']);
        $gtBankAmount = $conn->real_escape_string($_POST['gtBankAmount']);
        $othersAmount = $conn->real_escape_string($_POST['othersAmount']);
        $creditSales = $conn->real_escape_string($_POST['creditSales']);
        $directTransferTitan = $conn->real_escape_string($_POST['directTransferTitan']);
        $directTransferOthers = $conn->real_escape_string($_POST['directTransferOthers']);
        $moneyTransferCash = $conn->real_escape_string($_POST['moneyTransferCash']);
        $moneyTransferCharges = $conn->real_escape_string($_POST['moneyTransferCharges']);
        $moneyTransferPos = $conn->real_escape_string($_POST['moneyTransferPos']);
        $voucherNetCash = $conn->real_escape_string($_POST['voucherNetCash']);
        $voucherNetPos = $conn->real_escape_string($_POST['voucherNetPos']);
        $changeOwed = $conn->real_escape_string($_POST['changeOwed']);
        $changeGivenOut = $conn->real_escape_string($_POST['changeGivenOut']);
        $cashPaidOut = $conn->real_escape_string($_POST['cashPaidOut']);
        $cashBalance = $conn->real_escape_string($_POST['cashBalance']);
        $reportRef = 'BKP'.rand(10000000000, 9999);
        $staffComment = $conn->real_escape_string($_POST['staffComment']);
        $status = $conn->real_escape_string($_POST['status']);



        $query = "INSERT INTO report (staffID, branch, staffName, workShift, salesCash, fcmbAmount, firstBankAmount, diamondBankAmount, sterlingBankAmount, zenithBankAmount, titanBankAmount, gtBankAmount, othersAmount, creditSales, directTransferTitan, directTransferOthers, moneyTransferCash, moneyTransferCharges, moneyTransferPos, voucherNetCash, voucherNetPos, changeOwed, changeGivenOut, cashPaidOut, cashBalance, reportRef, staffComment, status)"
            . "VALUES ('$staffID', '$branch', '$staffName', '$workShift', '$salesCash', '$fcmbAmount', '$firstBankAmount', '$diamondBankAmount', '$sterlingBankAmount', '$zenithBankAmount', '$titanBankAmount', '$gtBankAmount', '$othersAmount', '$creditSales', '$directTransferTitan', '$directTransferOthers', '$moneyTransferCash', '$moneyTransferCharges', '$moneyTransferPos', '$voucherNetCash', '$voucherNetPos', '$changeOwed', '$changeGivenOut', '$cashPaidOut', '$cashBalance', '$reportRef', '$staffComment', 'Pending')";

        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {

            $_SESSION['success_message'] = "Nice one champ👍  <strong>Report Sent!</strong>";
            echo "<meta http-equiv='refresh' content='3; URL=dashboard'>";
        }
        else {
            $_SESSION['error_message'] = "Error sending report.";
            echo "<meta http-equiv='refresh' content='3; URL=create-report'>";
        }

}

//Staff Query Response
if(isset($_POST['query_response_btn'])) {

    $response = $conn->real_escape_string($_POST['response']);

    $id = $_SESSION['id'];
    $sql=mysqli_query($conn,"SELECT * FROM queries where staffID='".$_SESSION['id']."'");
    $result=mysqli_fetch_array($sql);
    if($result>0)
    {
        $conn=mysqli_query($conn,"UPDATE queries SET response='$response' where staffID='".$_SESSION['id']."'");
        $_SESSION['success_message'] = "Response Sent! 👍";
        header('location: queries');
    }
    else
    {
        $_SESSION['error_message'] = "Error updating response.";
        header('location: queries');
    }
}


//Send Support Request
if (isset($_POST['support_request_btn'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $staffID = $conn->real_escape_string($_POST['staffID']);
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $purpose = $conn->real_escape_string($_POST['purpose']);
    $comment = $conn->real_escape_string($_POST['comment']);



    $query = "INSERT INTO support (staffID, firstName, lastName, purpose, comment)"
        . "VALUES ('$staffID', '$firstName', '$lastName', '$purpose', '$comment')";

    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {

        $_SESSION['success_message'] = "Nice one champ👍  <strong>Support Request Sent!</strong>";
        echo "<meta http-equiv='refresh' content='3; URL=support'>";
    }
    else {
        $_SESSION['error_message'] = "Error sending report.";
        echo "<meta http-equiv='refresh' content='3; URL=request-support'>";
    }

}