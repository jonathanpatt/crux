<!doctype html>
<html lang="<?php bloginfo('language') ?>">
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <title><?php bloginfo('name') ?> <?php wp_title() ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <?= $this->content() ?>
</body>
</html>
