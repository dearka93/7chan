<h1 style='border-bottom:1px solid black;'><i class="fa fa-user"></i> <?=$user->name?> </h1>
<h3>Användarnamn: <?=$user->acronym?></h3> 
<p><img src="http://www.gravatar.com/avatar/<?=md5($user->email);?>.jpg?s=300"/>
<h3><i class="fa fa-envelope-o"></i>  <?=$user->email?></h3> 
<p><b>Skapad: <i class="fa fa-pencil-square-o"></i> <?=$user->created?></b></p> 
<?php if (isset($user->active)): ?> 
<p><b>Aktiv sedan: <i class="fa fa-clock-o"></i> <?=$user->active?></b></p> 
<p><b>Rank: <i class="fa fa-rocket"></i> <?=$user->rank?></b></p>
<?php endif ?> 
<h2><i class="fa fa-comment-o"></i> <?=$user->acronym?>s frågor:</h2>

<?php
$comments= array_reverse($comments);
foreach ($comments as $comment){
echo "<b><a href='".$this->url->create('comment/id/'.$comment->id)."'>".$comment->title."</a></b>";
$stamp = strtotime($comment->timestamp);
$nu = strtotime(date('Y-m-d H:i:s'));
$skillnad = $nu - $stamp;
if ($skillnad < 3600) {
    $tid = $skillnad / 60;
    $tid = round($tid,0);
    $tid .= " minuter sedan";
}
else if ($skillnad < 43200) {
    $tid = $skillnad / 3600;
    $tid = round($tid,0);
    $tid .= " timmar sedan"; 
}
else {
    $tid = $skillnad / 86400;
    $tid = round($tid, 0);
    $tid .= " dagar sedan"; 
}
$tidsskillnad = "<i>Frågade för ".$tid."</i>";

$sql = "SELECT COUNT(*) AS antal FROM projekt_answers WHERE questionId = ?";
$params = array($comment->id);
$res = $this->db->executeFetchAll($sql, $params);
$number = $res[0]->antal;

echo " - ".$tidsskillnad;
echo "<b> (".$number."svar)</b>";
echo "<br>";
}     
?>  
<h2><i class="fa fa-comments-o"></i> <?=$user->acronym?>s svar:</h2>

<?php
$answers= array_reverse($answers);
foreach ($answers as $answer){
echo "<b><a href='".$this->url->create('comment/id/'.$answer->questionId)."'>".strip_tags($answer->content)."</a></b>";
$stamp = strtotime($answer->timestamp);
$nu = strtotime(date('Y-m-d H:i:s'));
$skillnad = $nu - $stamp;
if ($skillnad < 3600) {
    $tid = $skillnad / 60;
    $tid = round($tid,0);
    $tid .= " minuter sedan";
}
else if ($skillnad < 43200) {
    $tid = $skillnad / 3600;
    $tid = round($tid,0);
    $tid .= " timmar sedan"; 
}
else {
    $tid = $skillnad / 86400;
    $tid = round($tid, 0);
    $tid .= " dagar sedan"; 
}
$tidsskillnad = "<i>Svarade för ".$tid."</i>";
echo " - ".$tidsskillnad;
echo "<br>";
}     
?>  

<br>    
<p><a href='<?=$this->url->create('users/list')?>'><i class="fa fa-arrow-left"></i> Tillbaka</a>&nbsp
<?php
if (isset($_SESSION['user'])&&$this->di->session->get('user')->acronym === $user->acronym){
echo "<a href=".$this->url->create('users/update/' . $user->id)."><i class='fa fa-pencil-square-o'></i> Editera</a> <a href='".$this->url->create('users/loggaUt')."'><i class='fa fa-sign-out'></i> Logga ut</a>";    
} ?>

</p>

