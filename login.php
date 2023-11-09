<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login Pages</title>
  <link href='assets/fonts.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="assets/style-pages-login.css">
  <?php
  if (isset($_GET['my_variable'])) {
    $my_variable = $_GET['my_variable'];
    ?>
    <script>
      setTimeout(function () {
        history.replaceState({}, document.title, window.location.href.split('?')[0]);
      }, 0);
      alert('<?= $my_variable ?>');
    </script>
    <?php
  }
  ?>
</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="form">

    <ul class="tab-group">
      <li class="tab active"><a href="#signup">Sign Up</a></li>
      <li class="tab"><a href="#login">Log In</a></li>
    </ul>

    <div class="tab-content">
      <div id="signup">
        <h1>Sign Up</h1>

        <form action="register_process.php" method="post">

          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="first_name" required autocomplete="off" />
            </div>

            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="last_name" required autocomplete="off" />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name="username" required autocomplete="off" />
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off" />
          </div>

          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off" />
          </div>

          <button type="submit" class="button button-block" />Get Started</button>

        </form>

      </div>

      <div id="login">
        <h1>Welcome Back!</h1>

        <form action="login_process.php" method="post">

          <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name="username" required autocomplete="off" />
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off" />
          </div>

          <p class="forgot"><a href="#">Forgot Password?</a></p>

          <button class="button button-block" />Log In</button>

        </form>

      </div>

    </div><!-- tab-content -->

  </div> <!-- /form -->
  <!-- partial -->
  <script src='assets/jquery.min.js'></script>
  <script src="assets/script.js"></script>

</body>

</html>