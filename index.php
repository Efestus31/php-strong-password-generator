<?php
if(isset($_GET['lunghezza_caratteri'], $_GET['ripetizione_caratteri'], $_GET['lettere'], $_GET['numeri'], $_GET['simboli'])) {

    //recupero i valori dei campi

    $lunghezza_caratteri = $_GET['lunghezza_caratteri'];
    $ripetizione_caratteri = $_GET['ripetizione_caratteri'];
    $lettere = $_GET['lettere'];
    $numeri = $_GET['numeri'];
    $simboli = $_GET['simboli'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatore password sicure</title>
</head>
<body>
<h1>Strong Password Generator</h1>
<h2>Genera una password sicura</h2>
<form action="" method="GET">
    <label for="lunghezza_caratteri">Lunghezza password:</label>
    <input type="number" id="lunghezza_caratteri" name="lunghezza_caratteri"><br>
    <span>Consenti ripetizioni di uno o più caratteri:</span>
    
    <input type="radio" name="ripetizione_caratteri" id="si">
    <label for="ripetizione_caratteri">Sì</label>
    <input type="radio" name="ripetizione_caratteri" id="no">
    <label for="ripetizione_caratteri">No</label><br>

    
    <input type="checkbox" name="lettere" id="lettere">
    <label for="lettere">Lettere</label>
    
    <input type="checkbox" name="numeri" id="numeri">
    <label for="numeri">Numeri</label>
    
    <input type="checkbox" name="simboli" id="simboli">
    <label for="simboli">Simboli</label>

    <button>Invia</button>
    <button>Annulla</button>
</form>
    
</body>
</html>