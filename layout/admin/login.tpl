<?php
    /**
     * var View $this
     */
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <title><?= $this->getTitle()?></title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/assets/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="blue-grey lighten-5">
<div class="container">
    <div class="row">
        <div class="col s12 m8 l4 offset-l4 offset-m2">
            <div class="card">
                <div class="card-content">
                    <p class="card-title center-align">Sign in!</p>
                    <div class="row no-mar-bot">
                    <?php $this->getForm()->showForm();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
</body>
</html>