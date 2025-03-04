<?php
if (isset($_GET['lunghezza_caratteri'], $_GET['ripetizione_caratteri'], $_GET['lettere'], $_GET['numeri'], $_GET['simboli'])) {
    // Recupero i valori inviati dal form
    $lunghezza_caratteri = $_GET['lunghezza_caratteri'];
    $ripetizione_caratteri = $_GET['ripetizione_caratteri'];
    $lettere = isset($_GET['lettere']) ? true : false;
    $numeri = isset($_GET['numeri']) ? true : false;
    $simboli = isset($_GET['simboli']) ? true : false;

    function generatore_password()
    {
        global $lunghezza_caratteri, $lettere, $numeri, $simboli, $ripetizione_caratteri;

        // Stringhe di caratteri
        $lettere_minuscole = "abcdefghijklmnopqrstuvwxyz";
        $lettere_maiuscole = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numeri_da_usare = "0123456789";
        $simboli_da_usare = "!@#$%^&*()-_=+[]{}|;:'\",.<>?/";

        // Set di caratteri consentiti
        $caratteri_disponibili = '';

        if ($lettere) {
            $caratteri_disponibili .= $lettere_minuscole . $lettere_maiuscole;
        }
        if ($numeri) {
            $caratteri_disponibili .= $numeri_da_usare;
        }
        if ($simboli) {
            $caratteri_disponibili .= $simboli_da_usare;
        }

        // Se non è stato selezionato nessun tipo di carattere, ritorniamo un errore
        if (empty($caratteri_disponibili)) {
            return "Errore: selezionare almeno uno dei tipi di carattere (lettere, numeri, simboli).";
        }

        // Generazione della password
        $password_generata = '';
        $caratteri_usati = [];

        for ($i = 0; $i < $lunghezza_caratteri; $i++) {
            // Otteniamo un carattere casuale dal set di caratteri disponibili
            $indice_casuale = random_int(0, strlen($caratteri_disponibili) - 1);
            $carattere_casuale = $caratteri_disponibili[$indice_casuale];

            // Se la ripetizione dei caratteri è vietata e il carattere è già stato usato, lo scegliamo di nuovo
            if ($ripetizione_caratteri == "no" && in_array($carattere_casuale, $caratteri_usati)) {
                $i--; // Riproviamo
                continue;
            }

            // Aggiungiamo il carattere alla password e segnaliamo che è stato usato
            $password_generata .= $carattere_casuale;
            $caratteri_usati[] = $carattere_casuale; // Registriamo il carattere come usato
        }

        return $password_generata;
    }

    // Se sono stati inviati i dati, generiamo la password
    if ($lunghezza_caratteri > 0) {
        $password_generata = generatore_password();
    }
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
        <input type="radio" name="ripetizione_caratteri" value="si" id="si">
        <label for="ripetizione_caratteri">Sì</label>
        <input type="radio" name="ripetizione_caratteri" value="no" id="no">
        <label for="ripetizione_caratteri">No</label><br>

        <input type="checkbox" name="lettere" id="lettere">
        <label for="lettere">Lettere</label>

        <input type="checkbox" name="numeri" id="numeri">
        <label for="numeri">Numeri</label>

        <input type="checkbox" name="simboli" id="simboli">
        <label for="simboli">Simboli</label>

        <button>Genera Password</button>
        <button>Annulla</button>
    </form>

    <!-- Se la password è stata generata, la mostriamo -->
    <?php if (isset($password_generata)) { ?>
        <h3>La tua password generata è:</h3>
        <p><strong><?php echo htmlspecialchars($password_generata); ?></strong></p>
    <?php } ?>

</body>

</html>