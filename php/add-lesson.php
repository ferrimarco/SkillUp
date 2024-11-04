<?php
session_start();
require_once('./db_connect.php');

if (!isset($_SESSION['admin_id'])) {
    echo "Accesso non autorizzato. Ritorna alla pagina di login.";
    exit();
}

// Recupera l'ID dell'amministratore dalla sessione
$adminId = $_SESSION['admin_id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera i dati dal modulo
    $title = $_POST['title'];
    $details = $_POST['details'];

    // Verifica se un file è stato caricato
    if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
        $pdfName = $_FILES['pdf']['name'];
        $pdfTmpPath = $_FILES['pdf']['tmp_name'];
        
        // Imposta il percorso di destinazione
        $uploadDir = 'uploads/'; 
        $pdfFilePath = $uploadDir . basename($pdfName);

        // Verifica se la cartella uploads esiste
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Crea la cartella se non esiste
        }

        // Muovi il file caricato nella cartella uploads
        if (move_uploaded_file($pdfTmpPath, $pdfFilePath)) {
            $sql = "INSERT INTO lession (id_admin, title, decription, file) VALUES ('$adminId', '$title', '$details', '$pdfName')";
            if ($connection->query($sql)) {
                echo "<script>alert('Lezione caricata con successo');</script>";
                header('Location: ./admin.php');
                exit();
            } else {
                echo "<script>alert('Errore durante il caricamento nel database');</script>";
            }
        } else {
            echo "<script>alert('Errore durante il caricamento del file');</script>";
        }
    }
}

?>
