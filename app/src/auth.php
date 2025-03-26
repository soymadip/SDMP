<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>

  <?php

    $SiteTitle = 'Redirecting...';

    include '../config.php';
    include 'head.php';

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    $error_message = '';
    $spinner_level = 'danger';
    $redirect_url = $hostUrl;
    $redirect_delay = 2500;
    $action = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $username = isset($_POST['username']) ? $_POST['username'] : '';
      $password = isset($_POST['password']) ? $_POST['password'] : '';
      $action   = isset($_POST['action']) ? $_POST['action'] : '';

      if ($action == 'login') {

        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
          $error_message = 'Query failed: ' . mysqli_error($conn);
          // die("Query failed: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) == 1) {

          $user = mysqli_fetch_assoc($result);

          if ($password == $user['pass']) {

            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = $user['type'];
            $_SESSION['dashUrl'] = $hostUrl . '/dash/' . $user['type'].'.php';
            $usertype = $user['type'];
            $spinner_level = 'success';
            $redirect_url = "../dash/$usertype.php";
            $redirect_delay = 1500;

          } else {
            $error_message = 'Incorrect password.';
          }

        } else {
          $error_message = 'Username not found.';
        }

      } elseif ($action == 'signup') {

        // Check if already exists
        $check_query = "SELECT * FROM users WHERE username = '$username'";
        $check_result = mysqli_query($conn, $check_query);

        if (!$check_result) {

          $error_message = 'Query failed: ' . mysqli_error($conn);
          // die("Query failed: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($check_result) > 0) {
          $error_message = 'Username already exists.';

        } else {
          $usertype = $_POST['usertype'];
          $query = "INSERT INTO users (username, pass, type) VALUES ('$username', '$password', '$usertype')";

          if (mysqli_query($conn, $query)) {
            $spinner_level = 'success';
            $redirect_url = '../index.php';
            $redirect_delay = 1500;

          } else {
            $error_message = 'Registration failed.';
          }
        }

      } elseif ($action == 'logout') {
          
          $spinner_level = 'success';
          $redirect_delay = 1500;

          $_SESSION = array(); // Clear all session data
          session_destroy();

      } elseif ($action == 'fgtpass') {
        
        $redirect_delay = 5500;

        if (isset($_SESSION['username']) && in_array($_SESSION['usertype'], $masterUserType)) {
          $error_message = 'Please go to sudo mode & Perform a HARD RESET.';
        } else {
          $error_message = 'Please contact Admin to reset password.';
        }

      } else {
        $error_message = 'Invalid action.';
      }

    // If accessed directly
    } elseif (basename($_SERVER['PHP_SELF']) == 'auth.php') {
      $error_message = 'This Page can\'t be accessed directly.';
      $redirect_delay = 3000;

    } else {
      $error_message = 'Invalid request.';
    }
  ?>
</head>

<body>
  <!-- import navbar -->
  <?php
    include 'navbar.php';
  ?>

  <!-- Message Box -->
  <div class="container d-flex justify-content-center align-items-center div-index">
    <div class="text-center border border-2 border-<?php echo $spinner_level ?> rounded-3 p-4 abd">
      <div class="spinner-border text-<?php echo $spinner_level ?> m-4 mt-2" role="status"></div>
      <h4 class="mrnwthr text-<?php echo $spinner_level ?> mb-2">
        <?php
          if ($action == 'login') {
            if ($spinner_level == 'success') {
              echo '<i class="fas fa-check-circle"></i> Authentication success.';
            } else {
              echo '<i class="fas fa-times-circle"></i> Authentication error.';
            }
          } elseif ($action == 'signup') {
            if ($spinner_level == 'success') {
              echo '<i class="fas fa-check-circle"></i> Registration success.';
              echo '<p class="small">Please login now.</p>';
            } else {
              if (isset($error_message)) {
                echo '<i class="fas fa-times-circle"></i> Registration error.';
              }
            }
          } elseif ($action == 'logout') {
            echo '<i class="fas fa-check-circle"></i> Logout success.';
          } else {
            echo '<i class="fas fa-times-circle"></i> Authentication error.';
          }
        ?>
      </h4>
      <?php if (isset($error_message) && $error_message != '') { ?>
      <p class="small text-warning roboto-font pt-2"><?php echo $error_message; ?></p>
      <?php } ?>
      <?php if ($spinner_level == 'success' && $action != 'logout' || ($spinner_level == 'danger' && $action == 'signup' && isset($error_message))) { ?>
      <div class="row mt-3 ps-4">
        <div class="col-6 text-start fw-bold text-nowrap">
          <i class="fas fa-user me-1"></i> User Name:
        </div>
        <div class="col-6 text-start text-muted text-nowrap"><?php echo $username; ?></div>
      </div>
      <?php if (isset($usertype)) { ?>
      <div class="row mt-1 ps-4">
        <div class="col-6 text-start fw-bold">
          <i class="fas fa-user-tag"></i> User Type:
        </div>
        <div class="col-6 text-start text-muted"><?php echo $usertype; ?></div>
      </div>
      <?php } ?>
      <?php } ?>
    </div>
  </div>

  <!-- Link Bootstrap & Custom JS -->
  <script src="<?php echo $BtpJs ?>"></script>
  <script src="<?php echo $CstmJs ?>"></script>

  <!-- change redirection Url -->
  <script>
  redirect("<?php echo $redirect_url ?>", <?php echo $redirect_delay; ?>);
  </script>
</body>

</html>