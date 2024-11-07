<?php
session_start();
require_once('./db_connect.php');

// Controllo di accesso per l'utente
if (!isset($_SESSION['user_id'])) {
    echo "Accesso non autorizzato. Ritorna alla pagina di login.";
    exit();
}

$userId = $_SESSION['user_id'];

// Gestione dell'invio del messaggio
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['message'];

    if (!empty($message)) {
        $sql = "INSERT INTO messages (user_id, message) VALUES ('$userId', '$message')";
        if ($connection->query($sql)) {
            echo "<script>alert('Messaggio inviato con successo');</script>";
        } else {
            echo "<script>alert('Errore durante l\'invio del messaggio');</script>";
        }
    } else {
        echo "<script>alert('Il messaggio non può essere vuoto');</script>";
    }
}

// Recupero dei messaggi
$sql = "SELECT messages.id, messages.message FROM messages ORDER BY messages.id DESC";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Skill Up™ - Bacheca </title>
    <link rel="stylesheet" href="../css/board.css">
    <link rel="icon" href="../image/icon.webp">
    <script src="https://kit.fontawesome.com/4b5158fde0.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <a style="text-decoration: none;" href="../index.html">
                    <div class="logo">
                        <img src="../image/logo.png" alt="SkillUp Logo" width="200" height="200">
                        <h1 class="logo-title">Skill Up</h1>
                    </div>
                </a>
                <div class="navlinks">
                    <a href="./board.php">
                        <i class="fa-solid fa-chalkboard"></i> Bacheca
                    </a>
                    <a href="./news.php">
                        <i class="fa-solid fa-newspaper"></i> News
                    </a>
                    <a href="./user.php">
                        <i class="fa-solid fa-book"></i> Lezioni
                    </a>
                    <div class="user-log">
                        <?php if (isset($_SESSION['username'])): ?>
                            <i class="fa-solid fa-user"></i>
                            <span>Benvenuto <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="message-board">
    <h2 class="message-board__title">Bacheca dei Messaggi</h2>
    
    <form action="" method="post" class="message-board__form">
        <textarea name="message" rows="4" cols="50" placeholder="Scrivi il tuo messaggio..." class="message-board__textarea"></textarea><br>
        <button type="submit" class="message-board__button">Invia Messaggio</button>
    </form>

    <h3 class="message-board__header">Tutti i Messaggi</h3>
    <ul class="message-board__list">
        <?php
        // Recupero dei messaggi con l'username dell'utente
            $sql = "SELECT messages.id, messages.message, user.username 
            FROM messages 
            JOIN user ON messages.user_id = user.user_id 
            ORDER BY messages.id DESC";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            echo "<li class='message-board__item'><strong>" . htmlspecialchars($row['username']) . ":</strong> " . htmlspecialchars($row['message']) . "</li>";
            }
            } else {
            echo "<li class='message-board__item'>Nessun messaggio disponibile.</li>";
            }
        ?>
    </ul>
</main>

</body>
</html>
