<?php require_once '../config.php'; ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>

  <?php

    $SiteTitle = 'Redirecting...';

    include 'head.php';

    $error_message = '';
    $spinner_level = 'danger';
    $redirect_url = $hostUrl;
    $redirect_delay = 2500;
    $action = '';

    try {
      $conn = new PDO(
        "mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=utf8mb4",
        $db_user,
        $db_pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
      );
    } catch (PDOException $exception) {
      $conn = null;
      $error_message = 'Database connection failed.';
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $username = isset($_POST['username']) ? $_POST['username'] : '';
      $password = isset($_POST['password']) ? $_POST['password'] : '';
      $action   = isset($_POST['action']) ? $_POST['action'] : '';

      if (!$conn) {
        $error_message = 'Database connection failed.';
      } elseif ($action == 'login') {
        $statement = $conn->prepare('SELECT username, pass, type FROM users WHERE username = :username');
        $statement->execute(['username' => $username]);
        $user = $statement->fetch();

        if ($user && (password_verify($password, $user['pass']) || hash_equals($user['pass'], $password))) {
          if (!password_verify($password, $user['pass'])) {
            $updatedPassword = password_hash($password, PASSWORD_DEFAULT);
            $update = $conn->prepare('UPDATE users SET pass = :pass WHERE username = :username');
            $update->execute(['pass' => $updatedPassword, 'username' => $username]);
          }

            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = $user['type'];
            $dashboardPage = $dashboardPages[$user['type']] ?? $user['type'];
            $_SESSION['dashUrl'] = $hostUrl . '/dash/' . $dashboardPage . '.php';
            $usertype = $user['type'];
            $spinner_level = 'success';
            $redirect_url = "../dash/$dashboardPage.php";
            $redirect_delay = 1500;

        } else {
          $error_message = $user ? 'Incorrect password.' : 'Username not found.';
        }

      } elseif ($action == 'signup') {
        $statement = $conn->prepare('SELECT 1 FROM users WHERE username = :username');
        $statement->execute(['username' => $username]);

        if ($statement->fetch()) {
          $error_message = 'Username already exists.';
        } else {
          $usertype = $_POST['usertype'] ?? 'user';
          $statement = $conn->prepare('INSERT INTO users (username, pass, type) VALUES (:username, :pass, :type)');
          $statement->execute([
            'username' => $username,
            'pass' => password_hash($password, PASSWORD_DEFAULT),
            'type' => $usertype
          ]);
          $spinner_level = 'success';
          $redirect_url = '../index.php';
          $redirect_delay = 1500;
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