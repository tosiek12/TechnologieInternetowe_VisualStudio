<?php include 'templates/header.html.php'; ?>

<p>Wpisz swoje dane!</p>

<form action='welcome_post.php' method='post'>
    Name: <input type='text' name='name'><br/>
    E-mail: <input type='text' name='email'><br/>
      <input type='submit' value ='Zapisz mnie!'>
</form>

<?php include 'templates/footer.html.php'; ?>