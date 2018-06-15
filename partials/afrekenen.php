<article>
  <h1>Afrekenen</h1>

  <?php if ( !empty( han_get_cart() ) ) { ?>
    <form method="post">

      <p>Wanneer u de bestelling heeft afgerond wordt er een factuur naar uw adres gestuurd.</p>

      <button type="submit">Bestelling afronden</button>

      <input type="hidden" name="form_action" value="complete_order">

    </form>
  <?php } else { ?>

    <p>U heeft geen bestelling om af te ronden.</p>
    
  <?php } ?>

</article>
