<?php
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
        $pid = intval($_GET['page']);
        $query = mysqli_query($con, "select submenu.sub_sahifa_uzb as sub_sahifa_uzb,submenu.sub_sahifa_rus as sub_sahifa_rus,submenu.sub_sahifa_eng as sub_sahifa_eng from submenu where submenu.id='$pid'");
        while ($row = mysqli_fetch_array($query)) {
        ?>
<title><?= $row['sub_sahifa_'.$_SESSION['language']]; ?></title>
<?php } ?>
<!---======= Links start =======--->
<?php include('includes/link.php'); ?>
<!---======= End Links ==========--->

<body>
  <!-- ======= Header ======= -->
  <?php include('includes/header.php'); ?>
  <!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <?php
        $pid = intval($_GET['page']);
        $query = mysqli_query($con, "select submenu.sub_sahifa_uzb as sub_sahifa_uzb,submenu.sub_sahifa_rus as sub_sahifa_rus,submenu.sub_sahifa_eng as sub_sahifa_eng from submenu where submenu.id='$pid'");
        while ($row = mysqli_fetch_array($query)) {
        ?>
          <div class="d-flex justify-content-between align-items-center">
            <h2><?php echo htmlentities($row['sub_sahifa_' . $_SESSION['language']]); ?></h2>
            <ol>

              <?php
              $query1 = mysqli_query($con, 'select * from language where id=4');
              $row1 = mysqli_fetch_array($query1); ?>
              <li><a href="index.php"><?php echo $row1[$_SESSION['language']]; ?></a></li>
              <li><?php echo htmlentities($row['sub_sahifa_' . $_SESSION['language']]); ?></li>
            </ol>
          </div>
        <?php } ?>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">
        <article class="entry">
          <?php
          $pid = intval($_GET['page']);
          $currenturl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
          $query = mysqli_query($con, "select submenu.sub_sahifa_uzb as sub_sahifa_uzb,submenu.sub_sahifa_rus as sub_sahifa_rus,submenu.sub_sahifa_eng as sub_sahifa_eng,submenu.sub_text_uzb as sub_text_uzb,submenu.sub_text_rus as sub_text_rus,submenu.sub_text_eng as sub_text_eng from submenu where submenu.id='$pid'");
          while ($row = mysqli_fetch_array($query)) {
          ?>
            <div class="entry-content">
              <p>
                <?php echo ($row['sub_text_' . $_SESSION['language']]); ?>
              </p>
            </div>
          <?php } ?>
        </article><!-- End blog entry -->

      </div>


    </section><!-- End Blog Section -->

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <?php include('includes/footer.php'); ?>
  <!-- End Footer -->

</body>

</html>