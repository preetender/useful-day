<?php
require('./vendor/autoload.php');

use Preetender\UsefulDay;
use Carbon\Carbon;

$dezembro = new DateTime('2018-12-01');
$date = UsefulDay::create($dezembro, 5);

printf("O 5º dia util de dezembro é %s <hr>", $date->getUsefulDayDate('d/m/Y'));

$novembro = Carbon::createFromDate(2018, 11, 1);
$date = UsefulDay::create($novembro, 10);

printf("O 10º dia util do mês de novembro é %s", $date->getUsefulDayDate('d/m/Y'));