
  
  <style>
    /* Preloader styles */
    #preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #fff; /* or any background color */
      z-index: 9999;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>


  <!-- Preloader Container -->
  <div id="preloader">
    <img src="images/loader.gif" alt="Loading..." />
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    // Hide preloader after the page loads
    $(window).on('load', function() {
      $('#preloader').fadeOut('slow'); // You can adjust the speed of fading
    });
  </script>


