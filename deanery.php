<?php 
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
$query = mysqli_query($con, 'select * from submenu where id=1');
$row = mysqli_fetch_array($query); ?>
<title><?php echo htmlentities($row['sub_sahifa_' . $_SESSION['language']]); ?></title>         
<!---======= Links start =======--->
<?php include('includes/link.php'); ?>
<!---======= End Links ==========--->

<body>

   <!-- ======= Header ======= -->
   <?php include('includes/header.php');?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
          <?php
            $query = mysqli_query($con, 'select * from submenu where id=3');
            $row = mysqli_fetch_array($query); ?>
        <div class="d-flex justify-content-between align-items-center">
          <h2><?php echo htmlentities($row['sub_sahifa_' . $_SESSION['language']]); ?></h2>
          <ol>

            <?php
            $query = mysqli_query($con, 'select * from language where id=4');
            $row = mysqli_fetch_array($query); ?>
            <li><a href="index.php"><?php echo $row[$_SESSION['language']]; ?></a></li>

            <?php
            $query = mysqli_query($con, 'select * from submenu where id=3');
            $row = mysqli_fetch_array($query); ?>
            <li><?php echo htmlentities($row['sub_sahifa_' . $_SESSION['language']]); ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <!-- <div class="section-title" data-aos="fade-up">
          <h2>Our <strong>Team</strong></h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
 -->
        <div class="row">
        <?php
          if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
          } else {
            $pageno = 1;
          }
          $no_of_records_per_page = 12;
          $offset = ($pageno - 1) * $no_of_records_per_page;

          $total_pages_sql = "SELECT COUNT(*) FROM rahbar";
          $result = mysqli_query($con, $total_pages_sql);
          $total_rows = mysqli_fetch_array($result)[0];
          $total_pages = ceil($total_rows / $no_of_records_per_page);

          $query4 = mysqli_query($con, "select rahbar.id as pid,rahbar.mail as mail,rahbar.ism_uzb as ism_uzb,rahbar.ism_rus as ism_rus,rahbar.ism_eng as ism_eng,rahbar.daraja_uzb as daraja_uzb,rahbar.daraja_rus as daraja_rus,rahbar.daraja_eng as daraja_eng,rahbar.lavozim_uzb as lavozim_uzb,rahbar.lavozim_rus as lavozim_rus,rahbar.lavozim_eng as lavozim_eng,rahbar.rahbar_img from rahbar where rahbar.Is_Active=1 order by rahbar.id desc  LIMIT $offset, $no_of_records_per_page");
          while ($row4 = mysqli_fetch_array($query4)) {
          ?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-4">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="uploads/<?php echo htmlentities($row4['rahbar_img']); ?>" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4><?php echo ($row4['ism_' . $_SESSION['language']]); ?></h4>
                <span><?php echo ($row4['daraja_' . $_SESSION['language']]); ?><br><b><?php echo ($row4['lavozim_' . $_SESSION['language']]); ?></b></span>
                <hr style="padding: 0; margin: 0;">
                <div class="social">
                  <a href="mailto:<?php echo $row4['mail']; ?>"><i class="bi bi-envelope-at-fill"></i></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
              </div>
            </div>
          </div>
          <?php } ?>         
        </div>

      </div>
    </section><!-- End Our Team Section -->

</main><!-- End #main -->

 <!-- ======= Footer ======= -->
 <?php include('includes/footer.php'); ?>
  <!-- End Footer -->

</body>

</html>