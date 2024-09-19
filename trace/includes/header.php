<?php
include("../admin/config/dbcon.php");
include("baseurl.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">

    <title><?php if(isset($page_title)) { echo "$page_title"; } else { echo "vs"; } ?></title>
    <meta name="description" content="<?php if(isset($meta_description)) { echo '$meta_description'; } ?>" />
    <meta name="keyword" content="<?php if(isset($meta_keyword) ) { echo '$meta_keywords'; } ?>" />
    <meta name="author" content="vs" />
    <link rel="shortcut icon" href="<?= base_url('admin/assets/images/favicon.png') ?>" />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <link href="<?= base_url('admin/assets/css/icons.css') ?>" rel="stylesheet" type="text/css"/>
    <script src="<?= base_url('trace/assets/js/bootstrap.min.js') ?>"></script>
    <link href="<?= base_url('trace/assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('trace/assets/slick/slick.css') ?>" rel="stylesheet">
    <link href="<?= base_url('trace/assets/slick/slick-theme.css') ?>" rel="stylesheet">
    <link href="<?= base_url('trace/assets/css/colors.css') ?>" rel="stylesheet">
    <link href="<?= base_url('trace/assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('trace/assets/css/owl.carousel.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/button.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('assets/css/product.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('trace/assets/css/news.css') ?>" rel="stylesheet">
</head>
<body>
<?php
include('../basic.php');
?>
