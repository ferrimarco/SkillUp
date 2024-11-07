<?php
session_start();
require_once('./db_connect.php');

if (!isset($_SESSION['admin_id'])) {
    echo "Accesso non autorizzato. Ritorna alla pagina di login.";
    exit();
}

$adminId = $_SESSION['admin_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $details = $_POST['details'];
    $pdfFilePath = null;

    // Verifica se un file è stato caricato
    if (!empty($_FILES['pdf']['name']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
        $pdfName = $_FILES['pdf']['name'];
        $pdfTmpPath = $_FILES['pdf']['tmp_name'];
        
        $uploadDir = 'uploads/'; 
        $pdfFilePath = $uploadDir . basename($pdfName);

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (!move_uploaded_file($pdfTmpPath, $pdfFilePath)) {
            echo "<script>alert('Errore durante il caricamento del file');</script>";
            exit();
        }
    }

    // Inserimento nel database, considerando il caso in cui $pdfFilePath è vuoto
    $fileField = $pdfFilePath ? "'$pdfFilePath'" : "NULL";
    $sql = "INSERT INTO lession (id_admin, title, decription, file) VALUES ('$adminId', '$title', '$details', $fileField)";
    
    if ($connection->query($sql)) {
        echo "<script>alert('Lezione caricata con successo');</script>";
        header('Location: ./admin.php');
        exit();
    } else {
        echo "<script>alert('Errore durante il caricamento nel database');</script>";
    }
}
?>
