<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title><?php echo ( !empty( $title ) ? $title . ' - ' : null ) . $config['site']['name']; ?></title>
  <link href="assets/css/style.css" rel="stylesheet" media="screen">
  <script src="assets/js/script.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <!-- Start header -->
  <header>
    <div class="site-header">
      <div class="site-title">
        <a href="<?php echo $config['site']['home_url']; ?>"><img src="assets/images/logo.png" alt="logo"></a>
      </div>
      <div class="site-login">
        <a href="index.php?page=login" id="login-toggle" onclick="login_toggle()" class="button">Inloggen</a>
        <?php include $config['paths']['partial'] . 'login.php'; ?>
      </div>
    </div>

    <nav>
      <div class="container">
        <button id="nav-toggle" onclick="nav_toggle()">Menu</button>

        <ul id="nav">
          <li>
            <a href="index.php">Webshop</a>
            <ul>
              <li><a href="index.php?page=winkelwagen">Winkelwagen</a></li>
              <li><a href="index.php?page=categorie-overzicht">Categorie-overzicht</a></li>
            </ul>
          </li>
          <li><a href="index.php?page=nieuws">Nieuws</a></li>
          <li><a href="index.php?page=acties">Acties</a></li>
          <li><a href="index.php?page=over-ons">Over ons</a></li>
          <li><a href="index.php?page=vacatures">Vacatures</a></li>
        </ul>

        <form method="get" class="search-form">
          <input type="text" style="display: inline-block;" name="search" value="<?php echo han_get_search_query(); ?>" placeholder="Zoeken...">
          <button type="submit">Zoek</button>
        </form>
      </div>
    </nav>

  </header>
  <!-- Eind header -->

  <!-- Start Main -->
  <main>
