<?php
$fechas = ["01/10/2045", "15/03/2009", "30/10/1989", "08/01/2015", "23/04/2010", "20/08/2005", "09/06/2003",
    "21/02/2012", "16/11/2020", "19/10/2000", "03/07/1998", "11/09/2004", "13/10/2009", "07/08/2001", "01/05/2008",
    "11/07/2022", "03/12/2008", "05/10/2021", "27/04/2019", "19/04/1980", "04/05/2003"];

$fechasDateTime = array_map(fn($x) => $dateTime = DateTime::createFromFormat('d/m/Y', $x), $fechas);
$fechas19982010 = array_filter($fechasDateTime, fn($x) => (($x >= new DateTime('1998-01-01') && $x <= new DateTime('2010-12-31'))));
$ordenFechas = function ($x, $y) {
    return ($x <=> $y);
};
usort($fechas19982010, $ordenFechas);
$fechasFormateadas = array_map(fn($x) => $x->format('j F Y'), $fechas19982010);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php foreach ($fechasFormateadas as $fechaFormateada): ?> 
            <?= $fechaFormateada ?>
            </br>
        <?php endforeach ?>
    </body>
</html>
