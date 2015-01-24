<img class='sitelogo' style="width:100px;" src='<?=$this->url->asset("img/7logo.png")?>' alt='Prot Logo'/>
<span class='sitetitle'><?=$siteTitle?></span>
<span class='siteslogan'><?=$siteTagline?></span>

<?php  
if (!isset($_SESSION['user'])){
            $url = $this->url->create('users/loggaIn'); 
    echo "<span class='siteslogin'> <a href='".$url."'>Logga in</a>
</span>"; }
else if (isset($_SESSION['user'])){
            $url = $this->url->create('users/loggaUt'); 
            $id = $this->di->session->get('user')->id;
            $profil = $this->url->create('users/id/'.$id);
    echo "<span class='siteslogin'> Välkommen, <b>".$this->di->session->get('user')->acronym."</b> <br><a href='".$profil."'>Min profil</a> <a href='".$url."'>Logga ut</a>
</span>"; 
}
?>


