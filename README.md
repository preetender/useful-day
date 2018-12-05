# useful-day
Obtém o dia útil da data informada.


Com DateTime:

```php
$dezembro = new DateTime('2018-12-01');
$date = UsefulDay::create($dezembro, 5);
printf("O 5º dia util de dezembro é %s <hr>", $date->getUsefulDayDate('d/m/Y'));
```

Ira retornar

`O 5º dia util do mês de dezembo é 07/12/2018`

Com Carbon

```php
$novembro = Carbon::createFromDate(2018, 11, 1);
$date = UsefulDay::create($novembro, 10);
printf("O 10º dia util do mês de novembro é %s", $date->getUsefulDayDate('d/m/Y'));
```

Ira retornar

`O 10º dia util do mês de dezembo é 14/11/2018`
