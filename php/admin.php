<?php
    require_once ('./reserved-access.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Up™ - Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
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
                    <a href="./manage_courses.php">
                        <i class="fa-solid fa-book-open"></i> Aggiungi Lezione
                    </a>
                    <a href="../index.html">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                    </a>
                    <div class="user-log">
                        <i class="fa-solid fa-user"></i>
                        <span> Prof. <?php echo ($_SESSION['name']); ?>!</span>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="add-lesson">
            <div class="add-lesson-content">
                <h2>Aggiungi una nuova lezione</h2>
            </div>
        </section>
        <section class="form-lesson">
            <form action="./add-lesson.php" class="form-lession" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Titolo:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                
                <div class="form-group">
                    <label for="details">Dettagli:</label>
                    <textarea id="details" name="details" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="pdf">Carica PDF:</label>
                    <input type="file" id="pdf" name="pdf" accept="application/pdf">
                </div>

                <button type="submit">Aggiungi Lezione</button>
            </form>
        </section>  
    </main>

    <footer>
        <div class="footer-content">
            <p>© 2024 Skill Up™ - Cresci con Noi</p>
            <div class="social-icons">
                <p>Seguici su:</p>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>