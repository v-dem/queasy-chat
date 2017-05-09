<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>Welcome to Queasy Chat!</title>

        <base href="<?= QUEASY_URL ?>" />

        <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link type="text/css" rel="stylesheet" href="css/app.css" />
    </head>

    <body>
        <nav class="navbar navbar-toggleable-md navbar-light">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="#"><span class="fa fa-comments-o"></span>&nbsp;Queasy Chat</a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about">About</a>
                    </li>

                    <!--
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                    -->
                </ul>

                <form class="form-inline" method="get" action="registration">
                    <button class="btn btn-primary" type="submit"><span class="fa fa-vcard-o"></span>&nbsp;Register</button>&nbsp;
                </form>

                <form class="form-inline" method="get" action="login">
                    <button class="btn btn-primary" type="submit"><span class="fa fa-sign-in"></span>&nbsp;Sign In</button>
                </form>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
