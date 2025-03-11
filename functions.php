<?php
// Avviamo la sessione
session_start();

function generatore_password($lunghezza_caratteri, $lettere, $numeri, $simboli, $ripetizione_caratteri)
{
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
        $indice_casuale = mt_rand(0, strlen($caratteri_disponibili) - 1);
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

if (isset($_GET['lunghezza_caratteri'], $_GET['ripetizione_caratteri'])) {
    // Recupero i valori inviati dal form
    $lunghezza_caratteri = $_GET['lunghezza_caratteri'];
    $ripetizione_caratteri = $_GET['ripetizione_caratteri'];
    $lettere = isset($_GET['lettere']) ? true : false;
    $numeri = isset($_GET['numeri']) ? true : false;
    $simboli = isset($_GET['simboli']) ? true : false;

    // Validazione della lunghezza della password
    if ($lunghezza_caratteri <= 0) {
        echo "Errore: la lunghezza della password deve essere maggiore di 0!";
        exit();
    }

    // Se non è stato selezionato nessun tipo di carattere, ritorniamo un errore
    if (empty($lettere) && empty($numeri) && empty($simboli)) {
        echo "Errore: seleziona almeno un tipo di carattere!";
        exit();
    }

    // Se sono stati inviati i dati, generiamo la password
    if ($lunghezza_caratteri > 0) {
        $password_generata = generatore_password($lunghezza_caratteri, $lettere, $numeri, $simboli, $ripetizione_caratteri);
        // Memorizziamo la password generata nella sessione
        $_SESSION['password_generata'] = $password_generata;

        // Redirigiamo a result.php
        header('Location: result.php');
        exit();
    }
}
?>
