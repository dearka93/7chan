<article class="article1">
 
<?=$content?>

    
<h2>Senaste trådar:</h2>
<?php $comments= array_reverse($comments); ?>
<?php foreach ($comments as $comment) : ?>
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
$tidsskillnad = "<i> - Kommenterade för ".$tid."</i>";
?>
    

<a href="<?=$this->url->create('users/id/'.$comment->userId)?>"><img src="http://www.gravatar.com/avatar/<?=md5($comment->userMail);?>.jpg?s=40"/></a>    
<?=$comment->userAcr;?> <i class="fa fa-comments-o"></i> <a href="<?= $this->url->create('comment/id/'.$comment->id) ?> "title="Visa kommentar" class="title"><?=$comment->title?></a> 
<b><?=$comment->content;?></b>
<?=$tidsskillnad?>

<hr class='fade'>    
<?php endforeach; ?>
    

<?php if(isset($byline)) : ?>
<footer class="byline">
<?=$byline?>
</footer>
<?php endif; ?>
 
</article>