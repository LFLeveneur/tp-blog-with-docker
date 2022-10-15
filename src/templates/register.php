    <?php include '../shared/header.php'; ?>
    <title>Home</title>
</head>
<body class="text-center" cz-shortcut-listen="true">
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }
        body {
            display: flex;
            align-items: center;
            padding: 40px;
            background-color: #f5f5f5;
        }
        main {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
    </style>
    <main class="form-signin w-100 m-auto">
        <form method="POST" action="../include/register.inc.php">
            <h1 class="h3 mb-3 fw-normal">Please register</h1>

            <div class="form-floating">
                <input type="user" name="userPseudo" class="form-control" id="floatingInput" placeholder="user">
                <label for="floatingInput">User</label>
            </div>
            <div class="form-floating">
                <input type="email" name="userMail" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="userPassword" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" name="userPasswordRepeat" class="form-control" id="floatingPassword" placeholder="Password repeat">
                <label for="floatingPassword">Password repeat</label>
            </div>
            <br/>
            <button class="w-100 btn btn-lg btn-primary mb-3" type="submit" name="submit">Sign in</button>
            <button class="w-100 btn btn-lg btn-secondary"><a href="login.php" style="text-decoration: none; color: #fff;">Login</a></button>
            <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>