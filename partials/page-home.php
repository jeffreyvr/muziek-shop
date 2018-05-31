<?php echo SITE_NAME; ?>

<div class="grid">

  <?php foreach( han_get_producten() as $product ) { ?>

    <div class="product-item">
      <h3><?php echo $product['PRODUCTNAAM']; ?><h3>
      <img src="<?php echo $product['AFBEELDING_KLEIN']; ?>">
      <strong><?php echo han_format_price( $product['PRIJS'] ); ?></strong>
    </div>
<p>Harry</p>
  <?php } ?>

</div>
