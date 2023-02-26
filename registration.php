<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/styleloginregister.css" />

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

</head>

<body>

    <div id="RegForm" class="wrapper">

        <form id="regform" method="post" action="" enctype="multipart/form-data" autocomplete="off">
            <h3>Create an account</h3>
            <div id="my_messagereg"></div>
            <!-- <div id="my_messagelog1" style="background-color: red;"></div>-->
            <p class="error"><?php echo @$user->error ?></p>
            <p class="success"><?php echo @$user->successMessage ?></p>

            <div id="my_messagelog1"></div>
            <label class="form-label" for="form3Example4cg">Name and Surname</label>
            <input type="text" id="login" name="name" class="form-control form-control-lg" />

            <div id="my_messagepass"></div>
            <label class="form-label" for="form3Example4cg">Password</label>
            <input type="password" id="password" name="password" class="form-control form-control-lg" />

            <div id="my_messagemail"></div>
            <label class="form-label" for="form3Example3cg">Email</label>
            <input type="email" id="email" name="email" class="form-control form-control-lg" />

            <div id="my_messagename"></div>
            <label class="form-label" for="form3Example1cg">Phone number</label>
            <input type="text" id="name" name="number" class="form-control form-control-lg" />

            <div class="input-box button">
                <input type="submit" id="submit" name="submitUs" value="Register">
            </div>
            <center>
                <p>Have already an account?
                    <a href="" id="loginbtn" class="fw-bold text-body login-link">
                        <u>Login here</u>
                    </a>
                </p>
            </center>

        </form>
    </div>

    <div class="loginFormShow">
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>