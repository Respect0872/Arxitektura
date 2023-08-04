<?php 
session_start();
include('includes/config.php');
$pid = intval($_GET['page']);

$sql = "SELECT viewcounter FROM news WHERE id = '$pid'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $visits = $row["viewcounter"];
    $sql = "UPDATE news SET viewCounter = $visits+1 WHERE id ='$pid'";
    $con->query($sql);
  }
} else {
  echo "no results";
}

?>
<!DOCTYPE html>
<html lang="en">

<?php
        $pid = intval($_GET['page']);
        $query = mysqli_query($con, "select news.newstitle_uzb as newstitle_uzb,news.newstitle_rus as newstitle_rus,news.newstitle_eng as newstitle_eng from news where news.id='$pid'");
        while ($row = mysqli_fetch_array($query)) {
        ?>
<title><?= $row['newstitle_'.$_SESSION['language']]; ?></title>
<?php } ?>
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
            $query = mysqli_query($con, 'select * from language where id=5');
            $row = mysqli_fetch_array($query); ?>
          <div class="d-flex justify-content-between align-items-center">
            <h2><?php echo $row[$_SESSION['language']]; ?></h2>
            <ol>
            <?php
            $query = mysqli_query($con, 'select * from language where id=4');
            $row = mysqli_fetch_array($query); ?>
              <li><a href="index.php"><?php echo $row[$_SESSION['language']]; ?></a></li>

              <?php
            $query = mysqli_query($con, 'select * from language where id=5');
            $row = mysqli_fetch_array($query); ?>
              <li><?php echo $row[$_SESSION['language']]; ?></li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
    <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog blog1">
    <div class="container">
      <article class="entry">

            <?php
              $pid = intval($_GET['page']);
              $currenturl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
              $query = mysqli_query($con, "select news.newstitle_uzb as newstitle_uzb,news.newstitle_rus as newstitle_rus,news.newstitle_eng as newstitle_eng,news.newsdetails_uzb as newsdetails_uzb,news.newsdetails_rus as newsdetails_rus,news.newsdetails_eng as newsdetails_eng,news.newsdate,news.viewcounter,news.postedby from news where news.id='$pid'");
              while ($row = mysqli_fetch_array($query)) {
              ?>

                <h2 class="entry-title"><?php echo htmlentities($row['newstitle_' . $_SESSION['language']]); ?></h2>
                <div class="entry-content">
                  <p>
                    <?php echo ($row['newsdetails_' . $_SESSION['language']]); ?>
                  </p>
                </div>
                <hr>
                <div class="entry_icons">
                    <a href="" class="entry_icon"><i class="bi bi-telegram" style="color: #0088cc;"></i> Telegram </a>
                    <a href="" class="entry_icon"><i class="bi bi-facebook" style="color: #3c5a99;"></i> Facebook</a>
                    <a href="" class="entry_icon"><i class="bi bi-instagram" style="color: #c13584;"></i> Instagram</a>
                    <a href="" class="entry_icon"><i class="bi bi-youtube" style="color: #ff0000;"></i> Youtube</a>
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