<?php

require_once '../helpers/auth-helper.php'; //Avoir acces au init_session

prevent_not_connected(true); // si c'est true on initialise le start_session iln'est plus false et on a acces a $_SESSION 

require './model.php';

require './view.php'; //liens