<?php
require './functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatore password sicure</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center">Strong Password Generator</h1>
                <h2 class="card-subtitle mb-4 text-center">Genera una password sicura</h2>

                <form action="index.php" method="GET">
                    <div class="form-group">
                        <label for="lunghezza_caratteri">Lunghezza password:</label>
                        <input type="number" class="form-control" id="lunghezza_caratteri" name="lunghezza_caratteri" min="1" required>
                    </div>

                    <div class="form-group">
                        <span>Consenti ripetizioni di uno o più caratteri:</span><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ripetizione_caratteri" value="si" id="si">
                            <label class="form-check-label" for="si">Sì</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ripetizione_caratteri" value="no" id="no">
                            <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="lettere" id="lettere">
                        <label class="form-check-label" for="lettere">Lettere</label>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="numeri" id="numeri">
                        <label class="form-check-label" for="numeri">Numeri</label>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="simboli" id="simboli">
                        <label class="form-check-label" for="simboli">Simboli</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Genera Password</button>
                    <button type="reset" class="btn btn-secondary">Annulla</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
