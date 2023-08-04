<?php
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<title>TAQU | Menejment Fakulteti</title>
<!---======= Links start =======--->
<?php include('includes/link.php'); ?>
<!---======= End Links ==========--->

<body>

  <!-- ======= Header ======= -->
  <?php include('includes/header.php'); ?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <?php
          $query1 = mysqli_query($con, 'select * from slider where id=1');
          $row1 = mysqli_fetch_array($query1); ?>
        <div class="carousel-item active" style="background-image: url(uploads/<?php echo htmlentities($row1['slayd_image']); ?>);"> 
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2><?php echo htmlentities($row1['slayd_title_' . $_SESSION['language']]); ?></h2>
              <p><?php echo htmlentities($row1['short_' . $_SESSION['language']]); ?></p>
              <div class="text-center"><a href="<?php echo htmlentities($row1['link']) ?>" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <?php
          $query1 = mysqli_query($con, 'select * from slider where id=2');
          $row1 = mysqli_fetch_array($query1); ?>
        <div class="carousel-item active" style="background-image: url(uploads/<?php echo htmlentities($row1['slayd_image']); ?>);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2><?php echo htmlentities($row1['slayd_title_' . $_SESSION['language']]); ?></h2>
              <p><?php echo htmlentities($row1['short_' . $_SESSION['language']]); ?></p>
              <div class="text-center"><a href="<?php echo htmlentities($row1['link']) ?>" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <?php
          $query1 = mysqli_query($con, 'select * from slider where id=3');
          $row1 = mysqli_fetch_array($query1); ?>
        <div class="carousel-item active" style="background-image: url(uploads/<?php echo htmlentities($row1['slayd_image']); ?>);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2><?php echo htmlentities($row1['slayd_title_' . $_SESSION['language']]); ?></h2>
              <p><?php echo htmlentities($row1['short_' . $_SESSION['language']]); ?></p>
              <div class="text-center"><a href="<?php echo htmlentities($row1['link']) ?>" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= News Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <?php
          $query = mysqli_query($con, 'select * from language where id=5');
          $row = mysqli_fetch_array($query); ?>
          <h3><?php echo $row[$_SESSION['language']]; ?></h3>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <?php
          if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
          } else {
            $pageno = 1;
          }
          $no_of_records_per_page = 3;
          $offset = ($pageno - 1) * $no_of_records_per_page;

          $total_pages_sql = "SELECT COUNT(*) FROM news";
          $result = mysqli_query($con, $total_pages_sql);
          $total_rows = mysqli_fetch_array($result)[0];
          $total_pages = ceil($total_rows / $no_of_records_per_page);

          $query1 = mysqli_query($con, "select category.categorname_uzb as categorname_uzb,category.categorname_rus as categorname_rus,category.categorname_eng as categorname_eng,category.id as categorid, news.id as pid,news.newsurl as url,news.newstitle_uzb as newstitle_uzb,news.newstitle_rus as newstitle_rus,news.newstitle_eng as newstitle_eng,news.short_uzb as short_uzb,news.short_rus as short_rus,news.short_eng as short_eng,news.newsdetails_rus,news.newsimage,news.viewcounter from news left join category on news.category_id=category.id where news.id and news.Is_Active=1 order by news.id desc  LIMIT $offset, $no_of_records_per_page");
          while ($row1 = mysqli_fetch_array($query1)) {
          ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="course-item">
                <img src="uploads/<?php echo htmlentities($row1['newsimage']); ?>" class="img-fluid" alt="TAQU">
                <div class="course-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4><?php echo htmlentities($row1['categorname_' .$_SESSION['language']]); ?></h4>
                    <p class="price"><i class="bi bi-eye"></i>&nbsp;<?php echo $row1['viewcounter']; ?></p>
                  </div>

                  <h3><a href="course-details.html"><?php echo ($row1['newstitle_' . $_SESSION['language']]); ?></a></h3>
                  <p><?php echo ($row1['short_' . $_SESSION['language']]); ?></p>
                  <div class="trainer d-flex justify-content-between align-items-center">
                    <div class="trainer-profile d-flex align-items-center"><!-- Logo uchun --></div>
                    <div class="trainer-rank d-flex align-items-center">
                      <?php 
                      $query = mysqli_query($con, 'select * from language where id=7');
                      $row = mysqli_fetch_array($query);
                      ?>
                      <a href="news.php?page=<?php echo ($row1['pid']) ?>"><span><?php echo $row[$_SESSION['language']]; ?></span>&nbsp;<i class="bi bi-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?><!-- End Course Item-->
        </div>
        <?php 
        $query = mysqli_query($con, 'select * from language where id=6');
        $row = mysqli_fetch_array($query);
        ?>
        <center><button class="news"><a href="allnews.php" class="news1"><?php echo $row[$_SESSION['language']]; ?>&nbsp;&nbsp;<i
                class="bi bi-arrow-right"></i></a></button></center>
      </div>
    </section><!-- End News Courses Section -->
<hr>
    <!-- ====== History section ===== -->
    <!-- <section id="call-to-action" class="call-to-action">

      <img src="assets/img/taqu1.jpg" alt="">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>Fakultet Tarixi</h3>
              <p>1929 yilda O’rta Osiyo Politexnika instituti tarkibida tashkil topgan qurilish fakultetining
                arxitektura bo’limida O’zbekiston hududida arxitektor kadrlar tayyorlashga asos solindi. 1934 yilda
                birinchilar qatorida ushbu bo’limni bitirgan Abdulla Boboxonov, S.Asaturov, G.Jaxongirovlar keyinchalik
                mashxur arxitektor-muxandis, taniqli pedagog olim bo’lib yetishdilar</p>
              <a class="news1" href="#">Batafsil o'qish uchun bosing&nbsp;&nbsp;<i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>

    </section>End History Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">
        <?php 
        $query = mysqli_query($con, 'select * from language where id=8');
        $row = mysqli_fetch_array($query);
        ?>
        <div class="section-title">
          <h3><?php echo $row[$_SESSION['language']]; ?></h3>
        </div>
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-person-video2"></i>
              <?php 
              $query = mysqli_query($con, 'select * from language where id=9');
              $row = mysqli_fetch_array($query);
              ?>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p><?php echo $row[$_SESSION['language']]; ?></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <?php 
              $query = mysqli_query($con, 'select * from language where id=10');
              $row = mysqli_fetch_array($query);
              ?>
              <span data-purecounter-start="0" data-purecounter-end="1521" data-purecounter-duration="1" class="purecounter"></span>
              <p><?php echo $row[$_SESSION['language']]; ?></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <?php 
              $query = mysqli_query($con, 'select * from language where id=11');
              $row = mysqli_fetch_array($query);
              ?>
              <span data-purecounter-start="0" data-purecounter-end="463" data-purecounter-duration="1" class="purecounter"></span>
              <p><?php echo $row[$_SESSION['language']]; ?></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-book"></i>
              <?php 
              $query = mysqli_query($con, 'select * from language where id=12');
              $row = mysqli_fetch_array($query);
              ?>
              <span data-purecounter-start="0" data-purecounter-end="10421" data-purecounter-duration="1" class="purecounter"></span>
              <p><?php echo $row[$_SESSION['language']]; ?></p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('includes/footer.php'); ?>
  <!-- End Footer -->

</body>

</html>