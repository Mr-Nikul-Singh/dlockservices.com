<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />

    <title>
        <?php 
        $site_name           = get_meta('site_name');
        $keyowrdsOfMedata    = get_meta('meta_keywords');
        $MedatDesc           = get_meta('meta_description');
        $TitleIco            = get_meta('site_favicon');
        $LogoOfWeb           = get_meta('site_logo');
        $footerText          = get_meta('footer_text');
        $GoogleAnalyticsCode = get_meta('google_analytics');
        $google_map          = get_meta('google_map');
        // echo $this->title;
        echo ($this->title != '') ? $this->title : $site_name;
        ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $MedatDesc ?>" />
    <meta name="keywords" content="<?= $keyowrdsOfMedata ?>" />
    <link rel="canonical" href="<?= base_url(uri_string()) ?>" />
    <!-- favicon -->
     <?php if(!empty($TitleIco)): ?>
        <link rel="shortcut icon" href="<?= base_url('assets/meta/'.$TitleIco) ?>">
    <?php else: ?>
        <link rel="shortcut icon" href="<?= base_url('assets/public/images/icon.png') ?>">
    <?php endif; ?>
    <!-- Bootstrap -->
    <link href="<?= base_url('assets/public/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Slider -->               
    <link rel="stylesheet" href="<?= base_url('assets/public/css/tiny-slider.css') ?>"/>
    <!-- Icons -->
    <link href="<?= base_url('assets/public/css/materialdesignicons.min.css') ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Css -->
    <link href="<?= base_url('assets/public/css/style.min.css') ?>?v=<?= filemtime('assets/public/css/style.min.css') ?>" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="<?= base_url('assets/public/css/colors/default.css') ?>" rel="stylesheet" id="color-opt">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>

