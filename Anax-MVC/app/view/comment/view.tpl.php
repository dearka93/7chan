<figure class="pic-right">
<a href="<?=$this->url->create('users/id/'.$comment->userId)?>"><img src="http://www.gravatar.com/avatar/<?=md5($comment->userMail);?>.jpg?s=100"/></a>
<figcaption><a href="<?=$this->url->create('users/id/'.$comment->userId)?>"><?=$comment->userAcr?></a></figcaption>
</figure>
<h1><i class="fa fa-comment-o"></i> <?=$comment->title?></h1>
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

<a href="<?=$this->url->create('comment/voteUp/'.$comment->id)?>"><i class="fa fa-thumbs-o-up"></i></a>
<?php
if ($comment->points > '-1'){
echo 
"<span style= 'color: green'>".$comment->points." </span></h5>";
}
else {
echo 
"<span style= 'color: red'>".$comment->points." </span></h5>";
}    
?>
<a href="<?=$this->url->create('comment/voteDown/'.$comment->id)?>"><i class="fa fa-thumbs-o-down"></i></a>

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
<h5><?=$tidsskillnad?> <span style= "color: rgb(7, 154, 154)"></span>
<a href="<?= $this->url->create('comment/answer/'.$comment->id) ?>" style='padding-left: 10px;' class='pull-right'><button><i class="fa fa-comment"></i> Svara</button></a>
<a href="<?= $this->url->create('comment/comment/'.$comment->id) ?>"  style='padding-left: 10px;' class='pull-right'><button><i class="fa fa-comments"></i> Kommentera</button></a></h5>
<hr class='dash'>
<h5>Kommentarer:</h5>
<?php $kommentar= array_reverse($kommentar); ?>
<?php foreach ($kommentar as $kommentaret) : ?>
<?php
$stamp = strtotime($kommentaret->timestamp);
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
$tidsskillnad = "<i> - Kommenterade för ".$tid."</i>";
?>
<p>
<a href="<?=$this->url->create('users/id/'.$kommentaret->userId)?>"><img src="http://www.gravatar.com/avatar/<?=md5($kommentaret->userMail);?>.jpg?s=40"/></a>    
<?=$kommentaret->userAcr;?> <i class="fa fa-comments-o"></i>
<b> <?=strip_tags($kommentaret->content);?></b>
<?=$tidsskillnad?>
<span class = "pull-right">
<a href="<?=$this->url->create('comment/voteUpComment/'.$kommentaret->id)?>"><i class="fa fa-thumbs-o-up"></i></a>
<?php
if ($kommentaret->points > '-1'){
echo 
"<span style= 'color: green'>".$kommentaret->points." </span></h5>";
}
else {
echo 
"<span style= 'color: red'>".$kommentaret->points." </span></h5>";
}    
?>
<a href="<?=$this->url->create('comment/voteDownComment/'.$kommentaret->id)?>"><i class="fa fa-thumbs-o-down"></i></a>
</span>
</p>
<?php endforeach ?>
<hr class='fade'>
<?php
$sql = "SELECT COUNT(*) AS antal FROM projekt_answers WHERE questionId = ?";
$params = array($comment->id);
$res = $this->db->executeFetchAll($sql, $params);
$number = $res[0]->antal;    
?>
<h2><i class="fa fa-comment-o fa-flip-horizontal"></i> <?=$number?> Svar:</h2>
<?php $answers= array_reverse($answers); ?>
<?php foreach ($answers as $answer) : ?>
<?php
$stamp = strtotime($answer->timestamp);
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
$tidsskillnad = "<i>Svarade för ".$tid."</i>";
?>

<figure class="picAns">
<a href="<?=$this->url->create('users/id/'.$answer->userId)?>"><img src="http://www.gravatar.com/avatar/<?=md5($answer->userMail);?>.jpg?s=60"/></a>
<figcaption><a href="<?=$this->url->create('users/id/'.$answer->userId)?>"><?=$answer->userAcr?></a></figcaption>
</figure>

<b><?=$answer->content;?></b>
<a href="<?=$this->url->create('comment/voteUpAnswer/'.$answer->id)?>"><i class="fa fa-thumbs-o-up"></i></a>
<?php
if ($answer->points > '-1'){
echo 
"<span style= 'color: green'>".$answer->points." </span></h5>";
}
else {
echo 
"<span style= 'color: red'>".$answer->points." </span></h5>";
}    
?>
<a href="<?=$this->url->create('comment/voteDownAnswer/'.$answer->id)?>"><i class="fa fa-thumbs-o-down"></i></a>
<h5>
<b><?=$tidsskillnad?></b>
<?=($answer->choose == false) ? '<a href="'.$this->url->create('comment/accept/'.$answer->id).'" style="padding-left: 10px;" class="pull-right"><button><i class="fa fa-check"></i> Acceptera svaret</button></a>'   : '<a href="'.$this->url->create('comment/accept/'.$answer->id).'" style="padding-left: 10px;" class="pull-right"><button><i class="fa fa-close"></i> Avmarkera svaret</button></a>'?>       
<a href="<?=$this->url->create('comment/commentAnswer/'.$answer->id)?>" class='pull-right'><button><i class="fa fa-comments"></i> Kommentera</button></a>
</h5>
<hr class="slim">
<?php $ansCom= array_reverse($ansCom); ?>

<?php foreach ($ansCom as $kommentar) : ?>
<?php
if ($kommentar->id == $answer->id){
$stamp = strtotime($kommentar->timestamp);
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
$tidsskillnad = "<i> - Kommenterade för ".$tid."</i>";
echo 
"<a href='".$this->url->create('users/id/'.$kommentar->userId)."'><img src='http://www.gravatar.com/avatar/".md5($kommentar->userMail).".jpg?s=40'/></a> ".$kommentar->userAcr." <i class='fa fa-comments-o'></i>
<b>".strip_tags($kommentar->content)."</b>".
$tidsskillnad;
echo
'<span class = "pull-right"> <a href="'.$this->url->create('comment/voteUpCommentAns/'.$kommentar->commentId).'"><i class="fa fa-thumbs-o-up"></i></a> ';
if ($kommentar->points > '-1'){
echo 
"<span style= 'color: green'>".$kommentar->points." </span></h5>";
}
else {
echo 
"<span style= 'color: red'>".$kommentar->points." </span></h5>";
}    
echo    
' <a href="'.$this->url->create('comment/voteDownCommentAns/'.$kommentar->commentId).'"><i class="fa fa-thumbs-o-down"></i></a>
</span>';
}
?>
<?php endforeach ?>
<hr class='fade'>
<?php endforeach ?>

