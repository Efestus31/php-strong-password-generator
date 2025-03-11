<?php
// Avviamo la sessione
session_start();

// Recuperiamo la password generata dalla sessione
$password_generata = isset($_SESSION['password_generata']) ? $_SESSION['password_generata'] : null;

var_dump($_SESSION); // Per debug

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generata</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center">Password Generata</h1>
                <?php if ($password_generata) { ?>
                    <div class="alert alert-success mt-4" role="alert">
                        <h4 class="alert-heading">La tua password generata è:</h4>
                        <p><strong><?php echo htmlentities($password_generata); ?></strong></p>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger mt-4" role="alert">
                        <h4 class="alert-heading">Errore</h4>
                        <p>Non è stato possibile generare la password. Per favore, torna indietro e riprova.</p>
                    </div>
                <?php } ?>
                <a href="index.php" class="btn btn-primary mt-3">Torna indietro</a>
            </div>
        </div>
    </div>
</body>
</html>
