<nav aria-label="Page table">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <?php for($i = 1; $i <= $nbPage; $i++) {?>
    <li class="page-item"><a class="page-link" href="recherche.php?page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    <?php } ?>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>