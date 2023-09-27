<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">

    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Login</title>
</head>

<body>


    <main id="">
        <!-- NAVBAR -->
        <nav>

            <!-- <h3>Bus Booking System</h3> -->

        </nav>
        <!-- NAVBAR -->

        <?php if (isset($_GET['empty'])) {
            echo '<div class="alert alert-danger">Enter Username or Password</div>';
        } elseif (isset($_GET['loginE'])) {
            echo '<div class="alert alert-danger">Username or Password Don\'t Match</div>';
        } ?>


<div class="login-container ">
                

                <form action="../ajax/ajax.php" class="form" method="post">
                <h1 style="text-align: center;">Login</h1>
                    <div class="input-container">
                        <label for="" class="form-label">
                            Email
                        </label>
                        <input type="text" name="email" id="email" class="form-input">
                    </div>

                    <div class="input-container">
                    <label for="" class="form-label">
                            Password
                        </label>
                        <input type="password" name="password" id="password" class="form-input">
                    </div>
                    <button class="btn btn-success" name="login">Login</button>
                </form>
            </div>
        </section>

        </main>

</body>
</html>