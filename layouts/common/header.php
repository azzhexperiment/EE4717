</head>

<body>
    <!-- Content container -->
    <div class="container">
        <div id="header">
            <!-- Header -->
            <header>
                <div class="header__wrapper">
                    <div class="placeholder"></div>
                    <div class="header text--center">
                        <a href="index.php">
                            <img src="assets/img/common/logo.png" alt="Cleo & AZZH">
                        </a>
                    </div>
                    <div class="member text--right">
                        <ul>
                            <?php if (empty($_SESSION['adminId'])) { ?>
                                <li>
                                    <a href="user.php">
                                        <img src="assets/img/common/user.png" id="user">
                                    </a>
                                </li>
                                <li>
                                    <a href="cart.php">
                                        <img src="assets/img/common/cart.png" id="cart">
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="dashboard.php">
                                        <img src="assets/img/common/user.png" id="user">
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </header>

            <?php include_once('nav.php') ?>
        </div>
    </div>
