<?php
require_once('./login.php');
require_once('./db_connect.php'); // Assicurati di includere la connessione al database

// Controllo di accesso per l'utente
if (!isset($_SESSION['user_id'])) {
    echo "Accesso non autorizzato. Ritorna alla pagina di login.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Skill Up™ - User dashboard </title>
    <link rel="stylesheet" href="../css/user.css">
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
                    <a href="./user.php">
                        <i class="fa-solid fa-book"></i> Lezioni
                    </a>
                    <a href="./course.php">
                        <i class="fa-solid fa-graduation-cap"></i> Corsi
                    </a>
                    <a href="./board.php">
                        <i class="fa-solid fa-chalkboard"></i> Bacheca
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

    <main class="lessons-main">
        <h2 class="lessons-title">Lezioni Disponibili</h2>
        <ul class="lessons-list">
            <?php
            // Recupera le lezioni dal database
            $sql = "SELECT title, decription, file FROM lession";
            $result = $connection->query($sql);

            // Verifica se ci sono lezioni disponibili
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='lesson-item'>";
                    echo "<strong class='lesson-title'>Titolo:</strong> " . htmlspecialchars($row['title']) . "<br>";
                    echo "<strong class='lesson-details'>Dettagli:</strong> " . htmlspecialchars($row['decription']) . "<br>";
                    if ($row['file'] !== 'Nessun file caricato') {
                        echo "<a class='download-link' href='uploads/" . htmlspecialchars($row['file']) . "' target='_blank'>Scarica PDF</a>";
                    } else {
                        echo "<span class='no-file'>Nessun file caricato.</span>";
                    }
                    echo "</li>";
                }
            } else {
                echo "<li class='no-lessons'>Nessuna lezione disponibile.</li>";
            }
            ?>
        </ul>
    </main>
</body>
</html>
