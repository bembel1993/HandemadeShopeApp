<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/styleloginregister.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <style>
        .hiddenreg2 {

            display: none;
        }
        body{
            background: url(assets/images/leather.jpg);
        }
    </style>
</head>

<body >
    <?php
include('header.php');
    ?>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div id="LogForm" class="wrapper">

        <form id="sendform" action="" method="">
            <h3>Login</h3>
            <div id="my_messagelog"></div>
            <p class="error"><?php echo @$user->error ?></p>
            <p class="error"><?php echo @$user->errorLogin ?></p>
            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3cg">Email</label>
                <input id="login" type="text" name="email" class="form-control form-control-lg" />
            </div>
            <p class="error"><?php echo @$user->errorPassword ?></p>

            <div class="form-outline mb-4">
                <div id="my_messagepass"></div>
                <label class="form-label" for="form3Example4cg">Password</label>
                <input id="password" type="password" name="password" class="form-control form-control-lg" />
            </div>

            <div class="input-box button">
                <input type="submit" id="submit" name="submit" value="Login">
            </div>

            <p class="text-center text-muted mt-5 mb-0">Don't have an account?
                <a href="" type="button" id="registrbtn" class="fw-bold text-body">
                    <u>Registration here</u>
                </a>
            </p>

            <p class="success"><?php echo @$user->success ?></p>
        </form>

    </div>
    <div id="registerFormShow">
    </div>
    </section>

    <div id="body2">
    </div>
    <?php
    //   }
    ?>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>