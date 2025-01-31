

        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
      
    </div>

    <script src="<?=URL?>public/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?=URL?>public/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?=URL?>public/assets/vendor/js/bootstrap.js"></script>
    <script src="<?=URL?>public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=URL?>public/assets/vendor/js/menu.js"></script>
    <script src="<?=URL?>public/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="<?=URL?>public/assets/js/main.js"></script>
    <script src="<?=URL?>public/assets/js/dashboards-analytics.js"></script>
    <script src="<?=URL?>public/assets/js/toastify-js.js"></script>
    <script src="<?=URL?>public/assets/js/custom.js"></script>

    <audio id="error_sound" src="<?=URL?>public/assets/audio/error.mp3" preload="auto"></audio>
    <audio id="success_sound" src="<?=URL?>public/assets/audio/success.mp3" preload="auto"></audio>

    <script>
      // Error Toast
       function errorToast(info, sound = true) {
          Toastify({
              text: info,
              close: true,
              backgroundColor: "linear-gradient(to right, #6E32CF, #FFA300)",
              className: "error",
          }).showToast();
          if (sound) {
              document.getElementById('error_sound').play();
          }
      }

      // Success Toast
      function successToast(info, sound = true) {
          Toastify({
              text: info,
              close: true,
              backgroundColor: "linear-gradient(to right, #269E70, #00BFA6)",
              className: "success",
          }).showToast();
          if (sound) {
              document.getElementById('success_sound').play();
          }
      }

      // Validate Form
      function validateForm(formId) {
          var hasError = false;

          $(`#${formId} input[required]`).each(function () {
              var input = $(this);
              var fieldName = input.data("field-name");
              var inputType = input.attr("type");

              var value = input.val().trim();

              if (value == "") {
                  var message = fieldName + " is required.";
                  errorToast(message);
                  hasError = true;
              } else {
                  if (inputType == "email" && !isValidEmail(value)) {
                      var message = fieldName + " must be a valid email address.";
                      errorToast(message);
                      hasError = true;
                  } else if (inputType == "number" && isNaN(value)) {
                      var message = fieldName + " must be a valid number.";
                      errorToast(message);
                      hasError = true;
                  }
              }
          });

          return hasError;
      }

      function isValidEmail(email) {
          var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
          return emailPattern.test(email);
      }

      window.onload = function() {
        <?php if(!empty($_SESSION['message'])): ?>
            var message = "<?php echo $_SESSION['message']; ?>";
            var status = "<?php echo $_SESSION['status']; ?>";
            
            if(status === "success") {
                successToast(message);
            } 
            else{
                errorToast(message);
            }

            <?php 
                unset($_SESSION['message']);
                unset($_SESSION['status']);
            ?>
        <?php endif; ?>
    };

    </script>

  </body>
</html>