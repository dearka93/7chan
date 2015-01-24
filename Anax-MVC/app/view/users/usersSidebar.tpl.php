<?php if (is_array($users) && !empty($users)) : ?>
    <h2>Mest aktiva användre: </h2>
    <?php foreach ($users as $user) : ?>
        <a href="<?=$this->url->create('comment/id/' . $user->id) ?>"><button><i class="fa fa-user"></i> <?=$user->acronym ?>(<?=$user->points ?> Poäng)</button></a>

    <?php endforeach; ?>
<?php endif; ?>

<?php if (empty($users)) : ?>
    <h2>Det finns ingen användare <i class="fa fa-meh-o"></i></h2>
<?php endif; ?>