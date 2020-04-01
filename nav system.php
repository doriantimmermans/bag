
<?php
  $page_url = 'blog.php?page=' . $previous_page;
?>
<button <?php if($page == 1){ echo 'class="disabled"';} ?> onclick="location.href='<?php echo $page_url ; ?>'">
  <
</button>

<?php
for ($i=1; $i < $page_number+1; $i++) {
  $page_url = 'blog.php?page=' . $i;
  ?>
  <button <?php ?>onclick="location.href='<?php echo $page_url ; ?>'">
    <?php echo $i ; ?>
  </button>
<?php
}
?>

<?php
  $page_url = 'blog.php?page=' . $next_page;
?>
<button <?php if($page == $page_number){ echo 'class="disabled"';} ?> onclick="location.href='<?php echo $page_url ; ?>'">
  >
</button>
