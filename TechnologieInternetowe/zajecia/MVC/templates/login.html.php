<?php
require_once 'PageBouilder.php';
includeHeader(); 
?>


<p>Wpisz swoje dane!</p>

<form action='welcome_post.php' method='post'>
  <table style='width: auto;'>
    <tr>
      <td>Login:</td>
      <td>
        <input type='text' name='name'/>
      </td>
    </tr>
    <tr>
      <td>Password:</td>
      <td>
        <input type='password' name='password'/>
      </td>
    </tr>
  </table>
    <input type='submit' name='submitLogin' value ='Zaloguj!'/>
</form>

<?php include 'templates/footer.html.php'; ?>