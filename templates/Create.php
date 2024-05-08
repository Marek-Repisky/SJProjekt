<?php
require_once('../partials/header.php');
require_once('../_inc/functions.php');
?>
  
  <section class="list_wrapper">
    <article class="list">
      <form action="../_inc/insert.php" method="post">
        <textarea class="txtarea nadpis" name="title" cols="39" rows="1" placeholder="Nadpis..."></textarea>
        <textarea class="txtarea opis" name="description" cols="39" rows="1" placeholder="Opis..."></textarea>
        <section class="zoznam_riadok">
          <div class="poradie">1.</div>
          <textarea class="txtarea zoznam" name="listItem" cols="39" rows="1" placeholder="Prvok..."></textarea>
        </section>
        <button type="submit" class="pridat_prvok" name="Submit">Vytvoriť</button>
      </form>
      <?php
      CreateTable("List_Database", "List_Table")
      ?>
    </article>
  </section>

<?php
  include_once('../partials/footer.php');
?>