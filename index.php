<?php
require_once( 'includes/setup.php' );

// Simple page routing
$page = (!empty( $_GET['page'] ) ? $_GET['page'] : 'home' );

switch ( $page ) {

  case "home":
    $template = 'producten';
    $title = 'Producten';
    break;

  case "login":
    $template = 'login';
    $title = 'Inloggen';
    break;

  case "over-ons":
    $template = 'over-ons';
    $title = 'Over ons';
    break;

  case "product":
    if ( ! empty( $_GET['productnummer'] ) ) {
      $template = 'product';
      $product = han_get_product_by_productnummer( $_GET['productnummer'] );
    }

    if ( empty( $product ) ) {
      header("location: index.php?page=404");
    } else {
      $title = $product['PRODUCTNAAM'];
    }

    break;

  case "registreren":
    $template = 'registreren';
    $title = 'Registreren';
    break;

  case "winkelwagen":
    $template = 'winkelwagen';
    $title = 'Winkelwagen';
    break;

  case "afrekenen":
    $template = 'afrekenen';
    $title = 'Afrekenen';
    break;

  default:
    $template = '404';
    $title = 'Pagina niet gevonden';

}

include $config['paths']['partial'] . 'header.php';
?>

<div class="container">

  <?php include $config['paths']['partial'] . $template . '.php'; ?>

</div>

<?php include $config['paths']['partial'] . 'footer.php'; ?>
