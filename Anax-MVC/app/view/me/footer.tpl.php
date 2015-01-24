<footer><span class='sitefooter'>Copyright (c) Guanglei Huang | <a href='https://github.com/dearka93/Anax-MVC-master'>Anax-MVC på Github</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a> | </span>
<?php  
if (!isset($_SESSION['user'])){
            $url = $this->url->create('users/loggaIn'); 
    echo "<span> <a href='".$url."'>Logga in</a>
</span>"; }
else if (isset($_SESSION['user'])){
            $url = $this->url->create('users/loggaUt'); 
    echo "<span> Välkommen, <b>".$this->di->session->get('user')->acronym."</b> <a href='".$url."'>Logga ut</a>
</span>"; 
}
?>

</footer>

