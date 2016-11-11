<?php
 
require("RClass.php");

//Instancia de clase; 
$rObject = new R();
//Configuracion de clase;
$rObject -> temp_dir = "tmp";
$rObject -> R_path = "c:/R-2.3.0/bin/Rterm.exe";
$rObject -> R_options_1 = "--quiet --no-restore --no-save  < ";
$rObject -> R_options_2 = " > ";
$rObject -> graphic = "jpeg";
$rObject -> bannedCommandConfigFile = "security.txt";
$rObject -> executeRCode($r_code);


?>
