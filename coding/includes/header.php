<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, viewport-fit=cover, initial-scale=1.0">
    <meta name="author" content="Abradu Frimpong Kwame">
    <meta name="description" content="Your website's purpose or main content in one or two sentences.">

    <!-- Page Title -->
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Website'; ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
          integrity="sha512-..." crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- AOS (Animate on Scroll) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" 
          integrity="sha512-..." crossorigin="anonymous">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo isset($styleCss) ? htmlspecialchars($styleCss) : './assets/css/style.css'; ?>">
</head>
<body>
    <!-- Content Goes Here -->
</body>
</html>
