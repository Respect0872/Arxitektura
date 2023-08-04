<?php 
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
 $query = mysqli_query($con, 'select * from language where id=2');
 $row1 = mysqli_fetch_array($query); ?>
<title><?php echo $row1[$_SESSION['language']]; ?></title>         
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
          $query = mysqli_query($con, 'select * from language where id=2');
          $row1 = mysqli_fetch_array($query); ?>
        <div class="d-flex justify-content-between align-items-center">
          <h2><?php echo $row1[$_SESSION['language']]; ?></h2>
          <ol>
          <?php
          $query = mysqli_query($con, 'select * from language where id=4');
          $row = mysqli_fetch_array($query); ?>
            <li><a href="index.php"><?php echo $row[$_SESSION['language']]; ?></a></li>
            <li><?php echo $row1[$_SESSION['language']]; ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <div class="map-section">
    <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11978.634352131538!2d69.304776!3d41.359774!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef3e6ddff9841%3A0xb895faaef342b335!2sTashkent%20University%20of%20Architecture%20and%20Civil%20Engineering!5e0!3m2!1sru!2sfr!4v1685680601483!5m2!1sru!2sfr"
          width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <section id="contact" class="contact">
      <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="bi bi-geo-alt"></i>
                  <?php
                    $query = mysqli_query($con, 'select * from language where id=13');
                    $row = mysqli_fetch_array($query); ?>
                  <h4><?php echo $row[$_SESSION['language']]; ?>:</h4>
                  <?php
                    $query = mysqli_query($con, 'select * from language where id=14');
                    $row = mysqli_fetch_array($query); ?>
                  <p><?php echo $row[$_SESSION['language']]; ?></p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@example.com<br>contact@example.com</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-phone"></i>
                  <h4>Tel:</h4>
                  <p>+99871<br>+99871</p>
                </div>
              </div>
            </div>

          </div>

        </div>

        <!-- <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div> -->

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

 <!-- ======= Footer ======= -->
 <?php include('includes/footer.php'); ?>
  <!-- End Footer -->

</body>

</html>