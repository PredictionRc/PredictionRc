<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>PRC Forgot Password</title>
    <link rel="icon" href="data:, ">
<body class="bg">
  <div class="divcenter">
    <img src="image/indexLogo.jpg" alt="Avatar"  class="avatar">
  </div>
  <div class="divcenter">
    <h2>Forgot Password</h2>
    <form action="send_reset_email.php" method="post">
        <label for="email">Enter your email address:</label><br>
        <input type="email" id="email" name="email" required><br>
        <button class="buttonRed" onclick="redirectToMainPage()">Cancel</button>
        <button class="buttonGreen" type="submit">Submit</button>
    </form>
  </div>
</body>
<script>
    function redirectToMainPage() {
        window.location.href = 'index.html';
    }
</script>
</html>
