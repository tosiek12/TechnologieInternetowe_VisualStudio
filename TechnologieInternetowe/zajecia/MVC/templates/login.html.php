<?php
require_once 'PageBuilder.php';
includeHeader(); 
?>


<div class='body'>
  <h2>Wpisz swoje dane!</h2>

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
</div>
<?php includeFooter(); ?>