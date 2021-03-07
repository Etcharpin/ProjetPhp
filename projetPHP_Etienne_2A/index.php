<!DOCTYPE html>
<html>

<head>
    <link href="vues/css/bootstrap.min.css" rel="stylesheet">
    <link href="vues/css/autres.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Que de news !</title>
</head>

<body>
        

<?php
	    
	    require_once(__DIR__.'/config/config.php');

	    require_once(__DIR__.'/config/Autoload.php');
            
	    Autoload::charger();

       	    $cont = new FrontControleur();

  ?> 
    </body>
</html>