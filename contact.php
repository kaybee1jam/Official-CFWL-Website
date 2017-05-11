<?php ob_start();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Kerri-Ann Bates">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Contact us for a free quote and estimate for your removal services">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- fontawesome -->
    <script src="https://use.fontawesome.com/5453760b2f.js"></script>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700" rel="stylesheet">
    <!-- custom css -->
    <link rel="stylesheet" href="styles/css/main.css">
    <title>Central Florida Wildlife Removal | Contact</title>
  </head>
  <body>
    <header>
        <div class="clearfix container">
          <div class="row clearfix">
            <div id="brand">
              <img class="img-responsive" src="images/WR-logo.png" alt="">
            </div>
            <div id="hamburger">
              <i id="menu-icon" class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="clearfix" id="clear">

            </div>
            <div id="nav-bar">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
    </header>
    <main>
      <div class="contact-area">
        <div class="container">
          <h2>Contact us for a quote</h2>

            <section id="form-box">
              <h3>Fill out form for more info</h3>

              <!-- FORM VALIDAION -->
              <?php

                //Get user input
                $name = $_POST['name'];
                $email = $_POST['email'];
                $areaCode = $_POST['area-code'];
                $phonePart1 = $_POST['phone-part1'];
                $phonePart2 = $_POST['phone-part2'];
                $response = $_POST['response-method'];

                //error messages
                $missingName = "<p><strong>Please enter your name!</strong></p>";
                $missingEmail = "<p><strong>Please enter your Email address!</strong></p>";
                $invalidEmail = "<p><strong>Please enter a valid email address!</strong></p>";
                $missingMessage = "<p><strong>Please enter a message!</strong></p>";
                $missingTelephone = "<p><strong>Please enter your phone number!</strong></p>";
                $invalidTelephone = "<p><strong>Please enter a valid phone number!</strong></p>";
                $missingResponse = "<p><strong>Please choose a response type!</strong></p>";

                //Check if the user has submitted the form
                if ($_POST['submit']) {

                  //Check if there are any errors
                  //validate name input
                  if (!$name) {
                    $errors .= $missingName;
                  } else {
                    $name = filter_var($name, FILTER_SANITIZE_STRING);
                  }

                  //Validate email input
                  if (!$email) {
                    $errors .= $missingEmail;
                  } else {
                    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                    if ( !filter_var($email, FILTER_SANITIZE_EMAIL) ) { //if email not valid
                      $errors .= $invalidEmail;
                    }
                  }

                  //Validate phone number input
                  if (!$areaCode) {
                    $errors .= $missingTelephone;
                  } else {
                    $message = filter_var($areaCode, FILTER_SANITIZE_NUMBER_INT);
                    if( !is_numeric($areaCode) ) { //if phone number input does not have all numbers
                      $errors .= $invalidTelephone;
                    }
                  }
                  if (!$phonePart1) {
                    $errors .= $missingTelephone;
                  } else {
                    $message = filter_var($phonePart1, FILTER_SANITIZE_NUMBER_INT);
                    if( !is_numeric($phonePart1) ) { //if phone number input does not have all numbers
                      $errors .= $invalidTelephone;
                    }
                  }
                  if (!$phonePart2) {
                    $errors .= $missingTelephone;
                  } else {
                    $message = filter_var($phonePart2, FILTER_SANITIZE_NUMBER_INT);
                    if( !is_numeric($phonePart2) ) { //if phone number input does not have all numbers
                      $errors .= $invalidTelephone;
                    }
                  }

                  //Validate response radios
                  if (!$response) {
                    $errors .= $missingResponse;
                  } else {
                    $message = filter_var($response, FILTER_SANITIZE_STRING);
                  }

                    //If there are errors
                    if ($errors) {
                      #print error message
                      $resultsMessage = "<div class='alert alert-danger'>" . $errors . "</div>";
                    } else {
                      //If no errors
                      #send email
                      $to = "kaybee1jam@yahoo.com"; // this is your Email address
                      $from = $_POST['email']; // this is the sender's Email address
                      $message = "
                                  <html>
                                  <head></head>
                                  <body>
                                    <h1 style='color: orange; border: 1px solid #ddd;'>Central Florida Wildlife Removal Contact Form Submission</h1>
                                    <p><strong>$name</strong>, has submitted a quote request.</p>
                                    <p>Email address: <strong>$from</strong></p>
                                    <p>Phone number: <strong>$areaCode-$phonePart1-$phonePart2</strong></p>
                                    <p>Response method chosen: <strong>$response</strong></p>
                                  </body>
                                  </html>
                                ";
                      $subject = "Wildlife Removal Contact Form Submission";

                      // To send HTML mail, the Content-type header must be set
                      $headers = array(
                                        "Content-type: text/html; charset=utf-8",
                                        "From: $from"
                                      );
                      $headers = implode("\r\n", $headers);

                      //if success redirect user to thank you page print succes message
                      if ( mail($to, $subject, $message, $headers) ) {
                        // $resultsMessage = "<div class='alert alert-success'>Thank you for your submission! Someone will contact you within the next 24 to 48 hours.</div>";
                        header("Location: redirect.html");
                      } else {
                        //if not successfull print warning message
                          $resultsMessage = "<div class='alert alert-success'>Unable to send email. Please try again later.</div>";
                      }
                    }
                }
                //print result message
                echo $resultsMessage;
              ?>

              <!-- Contact form -->
              <form method="post">

                <p class="error" style="padding-bottom: 10px;">* required field</p>
                <!-- Text inputs -->
                <label for="name">Full Name:</label><span class="error">*</span><br>
                <input type="text" name="name" id="name" placeholder="Full Name" value="<?php echo $_POST['name']; ?>"><br>
                <label for="email">Email:</label><span class="error">*</span><br>
                <input type="email" name="email" id="email" placeholder="Email Address" value="<?php echo $_POST['email']; ?>"><br>
                <label for="phone-number">Phone Number:</label><span class="error">*</span><br>
                <input type="tel" name="area-code" id="phone-number" placeholder="XXX" value="<?php echo $_POST['area-code']; ?>" maxlength="3"> -
                <input type="tel" name="phone-part1" placeholder="XXX" value="<?php echo $_POST['phone-part1']; ?>" maxlength="3"> -
                <input type="tel" name="phone-part2" placeholder="XXXX" value="<?php echo $_POST['phone-part2']; ?>" maxlength="4"><br>

                <!-- Response options -->
                <label for="response-method">Choose preferred respond type:</label><span class="error">*</span><br>
                <input type="radio" name="response-method" id="email-back" value="Wants an email back">
                <label>I want an email back</label>
                <input type="radio" name="response-method" id="call-back" value="Wants a call back">
                <label>I want a call back</label><br>
                <input type="submit" name="submit" value="Submit">

                <!-- Let user know form has been submitted -->
                <?php echo $confirmToUser; ?>
              </form>
            </section>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer>
      <nav>
        <div class="clearfix container">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
            <a href="https://www.facebook.com/Central-Florida-Wildlife-Removal-116540548711419/"><span id="facebook-icon"><i class="fa fa-facebook-square" aria-hidden="true"></i></span></a>
        </div>
    </nav>
    </footer>
    <!-- jQuery cdn -->
    <script src="https://code.jquery.com/jquery-3.2.0.min.js" integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="scripts/wildlife_removal.js"></script>
  </body>
</html>
<?php ob_flush();?>
