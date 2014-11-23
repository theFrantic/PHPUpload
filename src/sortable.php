<?php
/**
 * Default view
 */
require_once('./mvm.images.php');
require_once('./logger/log.configurator.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHPUpload Sample - Sortable</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        /* show the move cursor as the user moves the mouse over the panel header.*/
        #draggablePanelList .panel-heading {
            cursor: move;
        }
    </style>
</head>
<body>
<div class="container">
    <div id="row-1st" class="row">
        <div class="col-xs-12">
            <h1>Sortable Images</h1>
        </div>
    </div>

    <div id="row-2nd" class="row">
        <div class="col-xs-12">
            <h1>Sort the images using drag and drop</h1>
        </div>
    </div>

    <div id="row-3rd" class="row">
        <div class="col-xs-12">
            <!-- Bootstrap 3 panel list. -->
            <ul id="draggablePanelList" class="list-unstyled">
                <!--<li class="panel panel-info">
                    <div class="panel-heading">You can drag this panel.</div>
                    <div class="panel-body">Content ...</div>
                </li>
                <li class="panel panel-info">
                    <div class="panel-heading">You can drag this panel too.</div>
                    <div class="panel-body">Content ...</div>
                </li>-->
                <?php echo list_images(); ?>
            </ul>
        </div>
    </div>
</div>
<!-- Libs -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<!-- jquery ui (draggable support) -->
<script src="js/jquery-ui-1.10.4.custom.min.js"></script>

<!-- app script -->
<script src="app/sortable_logic.js"></script>

</body>
</html>