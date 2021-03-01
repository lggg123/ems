<?php   
    // All the PHP Stuff to happen here. 
    require_once ('core/config.php');
    // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Probably the most complete UI kit out there. Multiple functionalities and controls added,  extended color palette and beautiful typography, designed as its own extended version of Bootstrap at  the highest level of quality.                             ">
    <meta name="author" content="Webpixels">
    <title>March Madness</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800|Roboto:400,500,700" rel="stylesheet">
    <!-- Theme CSS -->
    <link type="text/css" href="assets/css/theme.css" rel="stylesheet">
    <!-- Demo CSS - No need to use these in your project -->
    <link type="text/css" href="assets/css/demo.css" rel="stylesheet">
    <head>
    <meta charset='utf-8' />
    <link href='fullcalendar/main.css' rel='stylesheet' />
    <script src='fullcalendar/main.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.min.js" integrity="sha256-rPPF6R+AH/Gilj2aC00ZAuB2EKmnEjXlEWx5MkAp7bw=" crossorigin="anonymous"></script>
    <script>
    

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>
  </head>
  </head>
  <body>
    <?php include('layouts/partials/navbar.php'); ?>

    <!-- MAIN PAGE SECTION -->

    <main class="main">
		<section class="py-xl bg-cover bg-size--cover" style="background-image: url('assets/images/backgrounds/march-madness-logo.jpg')">
			<span class="mask bg-tertiary alpha-6"></span>
			<div class="container d-flex align-items-center no-padding">
			<div class="col">
				<div class="row justify-content-center">
				<div class="col-lg-4">
					<div class="card bg-primary text-white">
					<div class="card-body">
              <div id="calendar"></div>
          </div>
        </div>
      </div>
    </section>

    
    
  
  
  <!-- Core -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/popper/popper.min.js"></script>
  <script src="assets/js/bootstrap/bootstrap.min.js"></script>
  <!-- FontAwesome 5 -->
  <script src="assets/vendor/fontawesome/js/fontawesome-all.min.js" defer></script>
  <!-- Page plugins -->
  <script src="assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script src="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
  <script src="assets/vendor/input-mask/input-mask.min.js"></script>
  <script src="assets/vendor/nouislider/js/nouislider.min.js"></script>
  <script src="assets/vendor/textarea-autosize/textarea-autosize.min.js"></script>
  <!-- Theme JS -->
  <script src="assets/js/theme.js"></script>
</body>
</html>

<?php 
    $conn->close();  
?>