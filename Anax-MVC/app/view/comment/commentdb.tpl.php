<h2><?= count($comments) .  (count($comments)!=0&&count($comments)!=1 ? " frågor:" : " fråga:") ?></h2>

<div class='comments'>
<?php $comments= array_reverse($comments); ?>
<?php foreach ($comments as $comment) : ?>
<figure class="pic-right">
<a href="<?=$this->url->create('users/id/'.$comment->userId)?>"><img src="http://www.gravatar.com/avatar/<?=md5($comment->userMail);?>.jpg?s=100"/></a>
<figcaption><a href="<?=$this->url->create('users/id/'.$comment->userId)?>"><?=$comment->userAcr?></a></figcaption>
</figure>

<h4><a href="<?= $this->url->create('comment/id/'.$comment->id) ?> "title="Visa kommentar" class="title"><?=$comment->title?></a> 
</h4>
    
<p><b>Taggar: </b>   
<?php
$wholeTag = $comment->tag;
$tags = explode(" ", $wholeTag);
foreach ($tags as $tag){
echo "<a href='".$this->url->create('comment/selectTag/'.$tag)."' class = 'id'>#".$tag."</a>";}
?>
</p>
    
<?=$comment->content?>
<br/>

<?php
if (isset($_SESSION['user'])&&$this->di->session->get('user')->acronym === $comment->userAcr){
echo
"<a href=".$this->url->create('comment/delete/'.$comment->id)." style='padding-left: 10px;' class='pull-right'><button>Radera</button></a>    
<a href=".$this->url->create('comment/update/'.$comment->id)." class='pull-right'><button>Editera</button></a>
";    
}
?>
<?php
$stamp = strtotime($comment->timestamp);
$nu = strtotime(date('Y-m-d H:i:s'));
$skillnad = $nu - $stamp;
if ($skillnad < 120) {
    $tid = "1 minut sedan";
}
else if ($skillnad < 3600) {
    $tid = $skillnad / 60;
    $tid = round($tid,0);
    $tid .= " minuter sedan";
}
else if ($skillnad < 7200) {
    $tid = " 1 timme sedan";
}
else if ($skillnad < 86400) {
    $tid = $skillnad / 3600;
    $tid = round($tid,0);
    $tid .= " timmar sedan"; 
}
else if ($skillnad < 172800) {
    $tid = " 1 dag sedan"; 
}
else {
    $tid = $skillnad / 86400;
    $tid = round($tid, 0);
    $tid .= " dagar sedan"; 
}
$tidsskillnad = "<i>Frågade för ".$tid."</i>";
?>
<?php

$sql = "SELECT COUNT(*) AS antal FROM projekt_answers WHERE questionId = ?";
$params = array($comment->id);
$res = $this->db->executeFetchAll($sql, $params);
$number = $res[0]->antal;
?>
<h5><?=$tidsskillnad?> <span style= "color: rgb(7, 154, 154)"><?=$number?> Svar</span> <i class="fa fa-sort"></i>
<?php
if ($comment->points > '-1'){
echo 
"<span style= 'color: green'>".$comment->points."</span></h5>";
}
else {
echo 
"<span style= 'color: red'>".$comment->points."</span></h5>";
}
?>
<hr class='fade'>
<?php endforeach; ?>
    
</div>
