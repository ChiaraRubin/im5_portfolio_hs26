<!DOCTYPE html>
<html lang="<?php bloginfo('language') ?>">
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover" />
    <title><?php bloginfo('name') ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Betania+Patmos&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/frontend/styles/main.css">
    <?php wp_head(); ?>
</head>
<body>
