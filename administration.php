<?php
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
$query = mysqli_query($con, 'select * from submenu where id=7');
$row = mysqli_fetch_array($query); ?>            
<title><?= $row['sub_sahifa_'.$_SESSION['language']]; ?></title>
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
            $query = mysqli_query($con, 'select * from submenu where id=7');
            $row = mysqli_fetch_array($query); ?>
        <div class="d-flex justify-content-between align-items-center">
          <h2><?php echo htmlentities($row['sub_sahifa_' . $_SESSION['language']]); ?></h2>
          <ol>

            <?php
            $query = mysqli_query($con, 'select * from language where id=4');
            $row = mysqli_fetch_array($query); ?>
            <li><a href="index.php"><?php echo $row[$_SESSION['language']]; ?></a></li>

            <?php
            $query = mysqli_query($con, 'select * from submenu where id=7');
            $row = mysqli_fetch_array($query); ?>
            <li><?php echo htmlentities($row['sub_sahifa_' . $_SESSION['language']]); ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">
        <article class="entry">
        <?php
            $query = mysqli_query($con, 'select * from submenu where id=7');
            $row = mysqli_fetch_array($query); ?>
            <div class="entry-content">
              <p>
                <?php echo ($row['sub_text_' . $_SESSION['language']]); ?>
              </p>
            </div>
        </article><!-- End blog entry -->

      </div>


    </section><!-- End Blog Section -->

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <?php include('includes/footer.php'); ?>
  <!-- End Footer -->

</body>

</html>