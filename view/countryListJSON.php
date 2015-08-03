<?php

require $_SERVER['DOCUMENT_ROOT'].'/world/controller/Control.php';

// get the q parameter from URL, the parameter q is the start of the country
//$q = ;
echo Control::AutoCompleteCountriesJSON($_REQUEST['q'],7);


