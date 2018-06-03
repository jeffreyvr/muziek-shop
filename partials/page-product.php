<?php

if ( isset( $_GET['productnummer'] ) ) {
  $product = han_get_product_by_productnummer( $_GET['productnummer'] );
} else {
  header("location: index.php?page=404");
  exit;
}

?>

<h1><?php echo $product['PRODUCTNAAM']; ?></h1>

<?php echo $product['PRODUCTOMSCHRIJVING']; ?>

<p>
  <span>Categorie:</span>
  <?php echo $product['CATEGORIE']; ?>
</p>

<p>
  <span>Prijs:</span>
  <?php echo han_format_price( $product['PRIJS'] ); ?>
</p>

<img src="<?php echo $product['AFBEELDING_GROOT']; ?>">

<form method="post">
  <input type="hidden" name="productnummer" value="<?php echo $product['PRODUCTNUMMER']; ?>">
  <button type="submit">Toevoegen aan winkelwagen</button>
  <input type="hidden" name="form_action" value="winkelwagen">
</form>
