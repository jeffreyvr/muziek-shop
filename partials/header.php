<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title><?php echo ( !empty( $title ) ? $title : null ); ?></title>
  <link href="assets/css/style.css" rel="stylesheet" media="screen">
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
        <?php include $config['path']['partial'] . 'login.php'; ?>
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
