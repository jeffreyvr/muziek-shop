<?php echo SITE_NAME; ?>

<div class="flex-grid products">

  <?php foreach( han_get_producten() as $product ) { ?>

    <div class="col product-item">
      <a href="index.php?page=product&amp;productnummer=<?php echo $product['PRODUCTNUMMER']; ?>">
        <img src="<?php echo $product['AFBEELDING_KLEIN']; ?>">
      </a>
      <h3><?php echo $product['PRODUCTNAAM']; ?></h3>
      <strong class="price"><?php echo han_format_price( $product['PRIJS'] ); ?></strong>
    </div>

  <?php } ?>

</div>
