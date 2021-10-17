<?php
//Connect Database
include ('config/db.php');

session_start();
if (!isset($_SESSION['email'])) {
    header('location: index');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: index");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name=description content="Baykins Pharmacy staff intranet for in-house communication.">
    <meta name=author content="ThankGod Okoro">
    <meta property="og:url" content="https://www.baykins.com"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Baykins Pharmacy&trade; :: We love you healthy."/>
    <meta name="og:description" content="Baykins Pharmacy is a provider of Pharmacy Services and Medical Supplies in Lagos, Nigeria.">
    <meta name="keywords" content="Pharmacy,Drugstore,Medical Supplies,Over The Counter,OTC,Diabetic Care,Health Screening,Pharmacy Lagos,Drugstore Lagos,Medical Supplies Lagos,Over The Counter Lagos,OTC Lagos,Diabetic Care Lagos,Health Screening Lagos,Pharmacy Nigeria,Drugstore Nigeria,Medical Supplies Nigeria,Over The Counter Nigeria,OTC Nigeria,Diabetic Care Nigeria,Health Screening Nigeria">

    <link rel="shortcut icon" type="image" href="assets/images/favicon.png">

    <link href="assets/fonts/feather/feather.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
    <link href="assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="assets/libs/prismjs/themes/prism.css" rel="stylesheet" />
    <link href="assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
    <link href="assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="assets/libs/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <link href="assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
    <link href="assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
    <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="assets/css/theme.min.css">
    <title>Dashboard :: Baykins Intranet&trade;</title>
</head>

<body>