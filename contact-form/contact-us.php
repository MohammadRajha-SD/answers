<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Contactez-Moi !</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link rel="icon" type="icon" href="contact-form/cdf7ad61-0549-4442-a349-d17717288163.svg" sizes="16x16 24x24 32x32 48x48" />

  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js"></script>
</head>

<body>
  <div class="container">
    <div class="divider"></div>

    <div class="heading">
      <h2> Contact Us</h2>
    </div>

    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
        <form id="contact-form" method="POST" action="php/contact.php" role="form" class="contact-form">
          <div class="row">
            <div class="col-md-6">
              <label for="firstname">First Name <span class="blue">*</span></label>
              <input required type="text" name="firstname" class="form-control" id="firstname">
              <p class="comments"> </p>
            </div>

            <div class="col-md-6">
              <label for="lastname">Last Name <span class="blue">*</span></label>
              <input required type="text" name="name" class="form-control" id="name">
              <p class="comments"> </p>
            </div>

            <div class="col-md-6">
              <label for="email">Email <span class="blue">*</span></label>
              <input required type="email" name="email" class="form-control" id="email">
              <p class="comments"> </p>
            </div>

            <div class="col-md-6">
              <label for="phone">Telephone</span></label>
              <input type="tel" name="phone" class="form-control" id="phone">
              <p class="comments"> </p>
            </div>

            <div class="col-md-12">
              <label for="message">Message <span class="blue">*</span></label>
              <textarea required name="message" id="message" class="form-control" rows="4"> </textarea>
              <p class="comments"> </p>
            </div>

            <div class="col-md-12">
              <p class="blue"><strong> * Those field are mandatory !</strong> </p>
            </div>

            <div class="col-md-12">
              <input type="submit" class="button1" value="Send Message">
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  <script src="js/sweet-alert.js"></script>
  <script>
    $(document).ready(function() {
      $("body").on("submit", ".contact-form", function(e) {
        e.preventDefault();

        let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let firstname = document.getElementById("firstname").value;
        let phone = document.getElementById("phone").value;
        let message = document.getElementById("message").value;

        $.ajax({
          type: "POST",
          url: "php/contact.php",
          data: {
            name: name,
            email: email,
            firstname: firstname,
            phone: phone,
            message: message,
          },
          success: function(data) {
            if (data.status === "success") {
              swal(data.message, {
                title: "Successfully sent.",
                icon: "success",
              }).then(() => {
                window.location.reload();
              });

            } else if (data.status === "error") {
              swal("Invalid Fields", {
                title: data.message,
                icon: "error",
              });
            } else {
              swal("Invalid Fields", {
                title: data.message,
                icon: "error",
              });
            }
          },
          error: function(xhr, status, error) {
            console.log(error);
          },
        });
      });
    });
  </script>
</body>

</html>