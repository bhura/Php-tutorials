<?php
  // form validation
  $error =  $successMessage = "";
  $email = $subject = $comment = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST['email']);
    $subject = test_input($_POST['subject']);
    $content = test_input($_POST['comment']);
    $emailTo = "info.bhuwanraj@gmail.com";
    $subject = $_POST['subject'];
    $content = $_POST['comment'];
    $headers = "From: ".$email;

    if (mail($emailTo, $subject, $content, $headers)) {
        $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';
    } else {
        $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent - please try again later</div>';

    }
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>The Quiz Test </title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
     <link rel="stylesheet" href="css/style.css">
     <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina|Open+Sans" rel="stylesheet">
   </head>

   <body>
     <div class="container">
      <div class="row">
        <div class="col-12">
          <h1> Get in Touch!</h1>
          <div id="error"><? echo $error.$successMessage; ?></div>

          <form method="post" action="<?php echo $_SERVER[PHP_SELF]; ?>">
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
            </div>

            <div class="form-group">
              <label for="content">What would you like to ask us?</label>
              <textarea class="form-control" name="comment" id="content" rows="3"></textarea>
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>

     </div>
     <!-- End container -->

     <footer>
       <div class='footnote'>
         <h2> Bhuwan </h2>
         <a href="https://www.linkedin.com/in/bhuwan-shrestha-34406b98/" target="_blank">
         <img src="http://www.freeiconspng.com/uploads/linkedin-icon-14.png">

         <a href="https://github.com/deesk/Tic-Tac-reTro" target="_blank">
           <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Ei-sc-github.svg/768px-Ei-sc-github.svg.png">
         </a>
       </div>
     </footer>
     <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-3.1.1.js"
     integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
     crossorigin="anonymous"></script>
     <script type="text/javascript">
          $("form").submit(function(e) {
              var error = "";
              if ($("#email").val() == "") {
                  error += "The email field is required."
              }
              if ($("#subject").val() == "") {
                  error += "<br>The subject field is required."
              }

              if ($("#content").val() == "") {
                  error += "<br>The content field is required.<br>"
              }

              if (error != "") {
                  $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                  return false;
              } else {
                  $("#error").html('');
                  return true;
              }
          });

    </script>
 </body>
 </html>
