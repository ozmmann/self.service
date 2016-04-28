<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <title>Login Page</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/assets/css/materialize.min.css" media="screen,projection"/>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="blue-grey lighten-5">
<div class="container">
    <div class="row">
        <form action="<?= $this->action ?>" method="<?= $this->method ?>" accept-charset="UTF-8"
              enctype="<?= $this->enctype ?>" class="col s12 m8 l4 offset-l4 offset-m2">
            <?php
            foreach ($this->fields as $field):
                switch ($field['field']):
                    case'input':
                        switch ($field['type']):
                            case 'checkbox':
                            case 'radio':
                                ?>
                                <div class="input-field s12">
                                    <div class="divider"></div>
                                    <input type="<?= $field['type'] ?>" id="<?= $field['name'] ?>"
                                           name="<?= $field['name'] ?>">
                                    <label for="<?= $field['name'] ?>"><?= $field['label'] ?></label>
                                </div>
                                <?php
                                break;
                            default:
                                ?>
                                <div class="input-field s12">
                                    <i class="material-icons prefix"><?= $field['text'] ?></i>
                                    <input id="<?= $field['name'] ?>" type="<?= $field['type'] ?>" class="validate"
                                           name="<?= $field['name'] ?>">
                                    <label for="<?= $field['name'] ?>"><?= $field['label'] ?></label>
                                </div>
                                <?php
                                break;
                        endswitch;
                        break;
                endswitch;
            endforeach;
            ?>
            <div class="input-field s12">
                <br>
                <button class="btn waves-effect waves-light col s12" type="submit"
                        name="action"><?= $this->button_text ?>
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
</body>
</html>