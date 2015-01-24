
<?php if (is_array($taggar) && !empty($taggar)) : ?>
    <h1>Alla taggar</h1>
    <?php foreach ($taggar as $tag) : ?>
        <a href="<?=$this->url->create('comment/selectTag/' . $tag->tag) ?>"><button><i class="fa fa-tag"></i> <?=$tag->tag ?> (<?=$tag->antal ?>)</button></a>

    <?php endforeach; ?>
<?php endif; ?>

<?php if (empty($taggar)) : ?>
    <h2>Det finns ingen tagg <i class="fa fa-meh-o"></i></h2>
<?php endif; ?>