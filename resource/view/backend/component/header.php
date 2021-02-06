<?php
if (session_status() != 2){
    session_start([
        'cookie_domain' => $_SERVER['SERVER_NAME'],
        'cookie_path' => '/'
    ]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Melody Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php asset('backend/vendors/iconfonts/font-awesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?php asset('backend/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?php asset('backend/vendors/css/vendor.bundle.addons.css') ?>">
    <link rel="stylesheet"
          href="<?php asset('backend/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css') ?>">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php asset('backend/css/style.css') ?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php asset('backend/images/favicon.png') ?>"/>
</head>

<body>