<?php 

require "mail.php";

$name = strip_tags(isset($_POST["fullname"]) ? (empty($_POST["fullname"]) ? "" : $_POST["fullname"]) : "");
$email = strip_tags(isset($_POST["email"]) ? (empty($_POST["email"]) ? "" : $_POST["email"]) : "");
$subject = strip_tags(isset($_POST["subject"]) ? (empty($_POST["subject"]) ? "" : $_POST["subject"]) : "");
$message = strip_tags(isset($_POST["message"]) ? (empty($_POST["message"]) ? "" : $_POST["message"]) : "");

$request = "";
$alert_message = "";

if (isset($_POST["form"])) {
  if ($name && $email && $subject && $message) {

    SendMail($subject, $message, $email, $name);

    $request = "success";
    $alert_message = "Your request has been sent.";
  } else {
    $request = "error";
    $alert_message = "Error: All the fields must be filled.";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css">
  <title>Contact Page</title>
</head>
<body>
  <main class="container" id="container">
    <?php if($request == "success"): ?>
      <script>
        const container = document.querySelector("#container")
        const alertStatus = document.createElement("div")
        alertStatus.textContent = "<?= $alert_message ?>"
        alertStatus.className = "alert-successful"
        container.prepend(alertStatus)
        setTimeout(() => {
          alertStatus.remove()
        }, 3000)
      </script>
    <?php elseif($request == "error"): ?>
      <script>
        const container = document.querySelector("#container")
        const alertStatus = document.createElement("div")
        alertStatus.textContent = "<?= $alert_message ?>"
        alertStatus.className = "alert-error"
        container.prepend(alertStatus)
        setTimeout(() => {
            alertStatus.remove()
          }, 3000)
      </script>
    <?php endif; ?>
    <form action="./" method="post">
      <h1>Contact Us!</h1>
      <div class="input-field">
        <label for="fullname">Name:</label>
        <input type="text" name="fullname" id="fullname" />
      </div>
      <div class="input-field">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" />
      </div>
      <div class="input-field">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" />
      </div>
      <div class="input-field">
        <label for="message">Message:</label>
        <textarea name="message" id="message"></textarea>
      </div>
      <div class="btn-container">
        <button name="form" type="submit" class="btn">Send</button>
      </div>
    </form>
  </main>
</body>
</html>