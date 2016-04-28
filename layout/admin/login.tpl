<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <title>Login Page</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/assets/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="blue-grey lighten-5">
    <div class="container">
        <div class="row">
            <form class="col s12 m8 l4 offset-l4 offset-m2" action="/admin" method="post">
                <h3 class="center">Sign in!</h3>
                <div class="divider"></div><br>
                <div class="row">
                    <div class="input-field s12">
                        <i class="material-icons prefix">person</i>
                        <input id="login" type="text" class="validate" name="login">
                        <label for="login">Login</label>
                    </div>
                    <div class="input-field s12">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="password" type="password" class="validate" name="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field s12">
                        <div class="divider"></div>
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <div class="input-field s12">
                        <br>
                        <button class="btn waves-effect waves-light col s12" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
</body>
</html>