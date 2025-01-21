<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="author" content="Abradu Frimpong Kwame">
    <meta name="description" content="An interactive platform where students can practice objective questions to enhance their exam preparation and improve their chances of success.">

    <!-- Dynamic Title -->
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : "PassOneTouch"; ?></title>

    <!-- Favicon -->
    <link rel="icon" href="./favicon.ico" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-..." crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- AOS (Animate on Scroll) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-..." crossorigin="anonymous">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo isset($styleCSS) ? htmlspecialchars($styleCSS) : './style/style.css'; ?>">
</head>

