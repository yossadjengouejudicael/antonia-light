<?php
/**
 * Antonia Frontend Application
 *
 * @author Eng. YOSSA DJENGOUE Judicaël (yossadjengoue@gmail.com/judicael.yossa@polytechnique.cm)
 * @phone: (+00237) 679-635-319 / 699-580-614
 * @skype: judicael.yossa
 * @address: Molyko, Buea, South East, Cameroon.
 */
include_once '../kernel/autoload.php';
$app = new cm\antonia\kernel\system\FrontendApplication();
$app->run();