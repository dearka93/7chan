<br>
<br>
<br>

<?php
if (isset($_SESSION['user'])&&$this->di->session->get('user')->type ==='admin'){
echo "<a href='".$this->url->create('comment/removeAll')."'><button><i class='fa fa-trash'></i>Återställa databasen</button></a>";
}
else{
echo "<a href='".$this->url->create('users/add')."'><button><i class='fa fa-pencil-square-o'></i>Skapa ett konto</button></a>";
}
?>
