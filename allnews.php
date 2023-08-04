<?php 
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
$query = mysqli_query($con, 'select * from language where id=6');
$row = mysqli_fetch_array($query); ?>
<title><?php echo $row[$_SESSION['language']]; ?></title>         
<!---======= Links start =======--->
<?php include('includes/link.php'); ?>
<!---======= End Links ==========--->

<body>
<!-- ======= Header ======= -->
<?php include('includes/header.php'); ?>
<!-- End Header -->

<main id="main">
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container"> 
  
        <?php
            $query = mysqli_query($con, 'select * from language where id=6');
            $row = mysqli_fetch_array($query); ?>
          <div class="d-flex justify-content-between align-items-center">
            <h2><?php echo $row[$_SESSION['language']]; ?></h2>
            <ol>
            <?php
            $query = mysqli_query($con, 'select * from language where id=4');
            $row = mysqli_fetch_array($query); ?>
              <li><a href="index.php"><?php echo $row[$_SESSION['language']]; ?></a></li>

              <?php
            $query = mysqli_query($con, 'select * from language where id=6');
            $row = mysqli_fetch_array($query); ?>
              <li><?php echo $row[$_SESSION['language']]; ?></li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->
  <!-- ======= News Section ======= -->
  <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">

     <!--  <div class="section-title">
        
        <h3>E'lonlar va Yangiliklar</h3>
      </div> -->

      <div class="row" data-aos="zoom-in" data-aos-delay="100">

      <?php
          if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
          } else {
            $pageno = 1;
          }
          $no_of_records_per_page = 12;
          $offset = ($pageno - 1) * $no_of_records_per_page;

          $total_pages_sql = "SELECT COUNT(*) FROM news";
          $result = mysqli_query($con, $total_pages_sql);
          $total_rows = mysqli_fetch_array($result)[0];
          $total_pages = ceil($total_rows / $no_of_records_per_page);

          $query4 = mysqli_query($con, "select category.categorname_uzb as categorname_uzb,category.categorname_rus as categorname_rus,category.categorname_eng as categorname_eng,category.id as categorid, news.id as pid,news.newstitle_uzb as newstitle_uzb,news.newstitle_rus as newstitle_rus,news.newstitle_eng as newstitle_eng,news.short_uzb as short_uzb,news.short_rus as short_rus,news.short_eng as short_eng,news.newsdetails_rus,news.newsimage,news.viewcounter from news left join category on news.category_id=category.id where news.id and news.Is_Active=1 order by news.id desc  LIMIT $offset, $no_of_records_per_page");
          while ($row4 = mysqli_fetch_array($query4)) {
          ?>
        <div class="col-lg-4 mb-5 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="admincms/uploads/<?php echo htmlentities($row4['newsimage']); ?>" class="img-fluid" alt="TAQU">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4><?php echo htmlentities($row4['categorname_' .$_SESSION['language']]); ?></h4>
                <p class="price"><i class="bi bi-eye"></i>&nbsp;<?= $row4['viewcounter'] ?></p>
              </div>

              <h3><a href="course-details.html"><?php echo ($row4['newstitle_' . $_SESSION['language']]); ?></a></h3>
              <p><?php echo ($row4['short_' . $_SESSION['language']]); ?></p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center"><!-- Logo uchun --></div>
                <div class="trainer-rank d-flex align-items-center">
                  <a href="news.php?page=<?php echo htmlentities($row4['pid']) ?>"><span>Batafsil</span>&nbsp;<i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->
        <?php } ?>
        <hr>
              <?php if ($total_pages != 1) { ?>
                <nav aria-label="Page navigation example ">
                  <ul class="pagination justify-content-center mt-5">
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <!-- <span class="sr-only">Previous</span> -->
                      </a>
                    </li>
                    <?php
                    $begin = 1;
                    $end = $total_pages;
                    while ($begin <= $end) { ?>
                    <li class="page-item"><a class="page-link" href="<?php if ($pageno == $begin) {echo '#';} else {echo "?pageno=" . $begin;} ?>"><?php echo $begin; ?></a></li>
                    <?php
                    $begin += 1;
                      } ?>
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <!-- <span class="sr-only">Next</span> -->
                      </a>
                    </li>
                  </ul>
                </nav>
              <?php } ?>
        
  </section><!-- End News Courses Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include('includes/footer.php'); ?>
<!-- End Footer -->

</body>

</html>