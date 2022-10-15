<?php if ( empty(session_id()) ) session_start(); ?>

    <?php include 'shared/header.php'; ?>
    <link rel="stylesheet" href="styles/index.css">
    <title>Home</title>
</head>
<body>
    <?php include 'shared/navbar.php'; ?>

    <?php include 'templates/landing.php'; ?>

    <?php include 'shared/footer.php'; ?>

    <?php
    if (!isset($_SESSION['userPseudo'])) {
        echo "<script>window.location.href='templates/login.php'</script>";
        exit();
    }
    ?>
</body>
</html>
