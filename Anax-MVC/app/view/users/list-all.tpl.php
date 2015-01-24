<h1 style='border-bottom:1px solid black;'><?=$title?></h1>

<table style='text-align: left;'>

<tr>
    <th><?='Id'?></th>
    <th><?='Akronym'?></th>
    <th><?='Namn'?></th>
    <th><?='E-mail'?></th>
    <th><?='Kontotyp'?></th>
    <th><?='Rank'?></th>
    <th><?='Radera'?></th>
    <th><?='Ändra'?></th>
</tr> 

<?php foreach ($users as $user) : ?>

<tr>
    <td><?=$user->id?></td>
    <td><?=$user->acronym?></td>
    <td><a href="<?=$this->url->create('users/id/'.$user->id)?>"><?=$user->name?></a></td> 
    <td><?=$user->email?></td>
    <td><?=($user->type==='admin') ? '<i class="fa fa-male"></i>' : '<i class="fa fa-child"></i>' ?></td>
    <td><?=$user->rank?></td>
    <td><?=isset($_SESSION['user'])&&$this->di->session->get('user')->type ==='admin' ? '<a href="' . $this->url->create('users/delete/' . $user->id) . '"><i class="fa fa-trash"></i></a>
' : '<a href="' . $this->url->create('users/loggaIn/') . '"><i class="fa fa-trash-o"></i></a>' ?></td>

<?php
if (isset($_SESSION['user'])&&$this->di->session->get('user')->acronym === $user->acronym || isset($_SESSION['user'])&&$this->di->session->get('user')->type ==='admin'){
echo "<td><a href=".$this->url->create('users/update/' . $user->id) ."><i class='fa fa-pencil-square-o'></i></a></td>    
</tr>";   
}
else {
echo "<td><a href=".$this->url->create('users/loggaIn') ."><i class='fa fa-pencil-square-o'></i></a></td>    
</tr>";
}
?>
<?php endforeach; ?>


</table>

<p><a href='<?=$this->url->create('')?>'><i class="fa fa-arrow-left"></i> Tillbaka</a></p>