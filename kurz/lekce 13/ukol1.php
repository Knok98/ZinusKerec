<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php $ukol1 = [
                'produkty' => [
                    ['nazev' => 'Jablko', 'cena' => 10, 'parametry' => ['typ' => 'zelené', 'puvod' => 'ČR',],],
                    ['nazev' => 'Hruška', 'cena' => 20, 'parametry' => ['puvod' => 'PL',],],
                    ['nazev' => 'Banán', 'cena' => 30, 'parametry' => []],
                    ['nazev' => 'Avokádo', 'cena' => 50, 'parametry' => ['puvod' => 'Peru',],],
                ],
            ];
function vypis($ukol1){

    foreach($ukol1['produkty'] as $x){
        if($x['parametry']['puvod']==null){
            $x['parametry']['puvod']='no information';
        }
        if($x['parametry']['typ']==null){
            $x['parametry']['typ']='no information';
        }
        echo '<h3>'.$x['nazev'].'</h3>';
        echo '<p>cena: '.$x['cena'].'<br></p>';
        echo '<p>typ: '.$x['parametry']['typ'].'<br></p>';
        echo '<p>původ: '.$x['parametry']['puvod'].'<br></p>';
        echo '<br><br>';
    }


}




echo vypis($ukol1)





            
            ?>
    
</body>
</html>