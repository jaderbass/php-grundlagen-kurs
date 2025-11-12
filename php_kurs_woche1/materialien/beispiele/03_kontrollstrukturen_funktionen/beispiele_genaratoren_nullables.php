<?php 
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
 ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatoren und nullbare Typen</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
    <h1>Generatoren und nullbare Typen</h1>
    </header>
    <main class="container">
        <h2>Generatoren</h2>
        <?php
        function wuerfelgenerator(){
            for($i = 1; $i <= 10; $i++){
                $ergebnis = random_int(1, 6);
                // yield gibt den Wert zurück, aber die Funktion wird nicht beendet
                yield $ergebnis;
            }
        }
        ?>

        <!-- Generatoren liefern Werte immer ein Objekt, über welches iteriert werden kann! -->

        <?php 
        echo '<pre>' . var_dump(wuerfelgenerator()) . '</pre>'; ?> 

        <p>
        <?php foreach(wuerfelgenerator() as $wurf){
            echo "Gewürfelte Zahl: $wurf <br>";
        } ?>
        </p>

        <h2>nullbare Typen</h2>

        <?php 
        

        function ausgabe( ?array $a ): string {
            if(is_null($a)) {
                return 'Keine Wert gefunden.';
            }
            $ausg = '';
            foreach($a as $v) $ausg .= "$v, ";
            return $ausg;
        }

        ?>

        <p><?= ausgabe(['Apfel', 'Birne', 'Banane']); ?></p>

        <p><?= ausgabe(null) ?></p>
       
    </main>
</body>
</html>