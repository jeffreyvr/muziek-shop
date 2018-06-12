<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Webshop</title>
  <link href="assets/css/style.css" rel="stylesheet" media="screen">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <!-- Start header -->
  <header>
    <div class="site-header">
      <div class="site-title">
        <img src="assets/images/logo.png" alt="logo">
      </div>
      <div class="site-login">
        <?php include PARTIAL_PATH . 'page-login.php'; ?>
      </div>
    </div>

    <nav>
      <ul>
        <li>
          <a href="index.php">Webshop</a>
          <ul>
            <li><a href="index.php?page=winkelwagen">Winkelwagen</a></li>
          </ul>
        </li>
        <li><a href="index.php?page=nieuws">Nieuws</a></li>
        <li><a href="index.php?page=acties">Acties</a></li>
        <li><a href="index.php?page=over-ons">Over ons</a></li>
        <li><a href="index.php?page=vacatures">Vacatures</a></li>
      </ul>
    </nav>

  </header>
  <!-- Eind header -->

  <!-- Start Main -->
  <main>
