<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php // Cílem úkolu je vypsat košík (Náročnější úkol - upraven tak, abyste si procvičili to, co jsme dělali)
           $ukol2 = [
                'kosik' => [
                    'produkty' => [
                        // ID je unikátní číslo produktu (nejčastěji z databáze)
                        // Cena je za jeden kus (MJ)
                        ['id' => 521, 'nazev' => 'Kalendář', 'cena' => 150, 'pocet' => 6],
                        ['id' => 205, 'nazev' => 'Počítač', 'cena' => 15890.50, 'pocet' => 1],
                        ['id' => 124, 'nazev' => 'Mobil', 'cena' => 4500, 'pocet' => 1],
                    ],
                        // produkt je ID produktu, ke kterému se sleva váže
                        // sleva je uvedena v procentech
                    'slevy' => [
                        ['kod' => 'MOBIL50', 'produkt' => 521, 'sleva' => 50],
                        ['kod' => 'PC25', 'produkt' => 205, 'sleva' => 25],
                    ],
                ],
            ];



$price=0;

        echo '<h2>Váš nákup</h2>';
        echo '<h3>položky: </h3>';

    foreach($ukol2['kosik']['produkty'] as $produkt){
            echo '<span>id: '.$produkt['id'].'</span>';
            echo '<span>název: '.$produkt['nazev'].'</span>';
            echo '<span>cena: '.$produkt['cena'].'</span>';
            echo '<span>pocet: '.$produkt['pocet'].'</span>';
            echo '<p></p>';
            $price+=round(($produkt['cena']*$produkt['pocet']));



    }
    echo '<p>cena bez slevy: '.$price.'Kč</p>';   
$price=0;
echo '<hr>';
        echo'<h4>Vaše slevy</h4>';
    foreach($ukol2['kosik']['slevy'] as $sleva){
            echo '<span>id: '.$sleva['kod'].'</span>';
            echo '<span>        název: '.$sleva['produkt'].'</span>';
            echo '<span>           cena: '.$sleva['sleva'].'</span>';
            echo '<p></p>';

            foreach($ukol2['kosik']['produkty'] as $produkt){
                if($produkt['id']==$sleva['produkt']){
                    $price+=(($produkt['cena']-$sleva['sleva'])*$produkt['pocet']);
                }
                else{
                    $price+=($produkt['cena']*$produkt['pocet']);
                }
    
    
    
        }
       

    }
echo '<p>cena včetně slev: '.$price.'Kč</p>'; 



?>
</body>
</html>