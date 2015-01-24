<?php 

require __DIR__.'/config_with_app.php';

$app->theme->configure(ANAX_APP_PATH . 'config/theme-grid.php');
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');

$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);
/*
$di->set('CommentController', function() use ($di) {
    $controller = new Phpmvc\Comment\CommentController();
    $controller->setDI($di);
    return $controller;
});
*/
$di->set('CommentController', function() use ($di) {
    $controller = new \Anax\Comment\CommentController();
    $controller->setDI($di);
    return $controller;
});

$di->setShared('db', function() {
    $db = new \Mos\Database\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/config_mysql.php');
    $db->connect();
    return $db;
});

$di->set('form', '\Mos\HTMLForm\CForm');

//controller för databas funktioner
$di->set('UsersController', function() use ($di) {
    $controller = new \Anax\Users\UsersController();
    $controller->setDI($di);
    return $controller;
});

$app->session;


$app->router->add('', function() use ($app) {
    $app->theme->setTitle("Välkommen");
    $content = $app->fileContent->get('home.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
    
    
    $byline = $app->fileContent->get('byline.md');
    $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');

        $sql = "SELECT * FROM projekt_tags ORDER BY antal DESC limit 5;";
        $taggar = $app->db->executeFetchAll($sql);
//mest aktiva användare
        $sql = "SELECT * FROM projekt_user ORDER BY points DESC limit 5";
        $res = $app->db->executeFetchAll($sql);

        $sql = "SELECT * FROM projekt_comment";
        $all = $app->db->executeFetchAll($sql);

    
    $app->views->add('me/page', [
        'content' => $content,
        'comments' => $all,
    ]); 


    $app->views->add('comment/tagsSidebar', [
        'taggar' => $taggar,
    ],'sidebar'); 
    
    $app->views->add('users/usersSidebar', [
        'users' => $res,
    ],'sidebar'); 

});
 
$app->router->add('fragor', function() use ($app) {
 
    $app->theme->setTitle("Frågor");

    $app->dispatcher->forward([
        'controller' => 'comment',
        'action'     => 'view',
        'params' =>  [''], 
    ]);
    $app->dispatcher->forward([
        'controller' => 'comment',
        'action'     => 'add',
        'params' =>  [''],  
    ]);  
    $app->views->add('comment/commentSidebar', [
 
    ],'sidebar'); 
});
 
$app->router->add('taggar', function() use ($app) {
 
    $app->theme->setTitle("Taggar");

    $app->dispatcher->forward([
        'controller' => 'comment',
        'action'     => 'showTags',
        'params' =>  [''], 
    ]);

});


$app->router->add('kallkod', function() use ($app) {
 
    $app->theme->addStylesheet('css/source.css');
    $app->theme->setTitle("Källkod");
 
    $source = new \Mos\Source\CSource([
        'secure_dir' => '..', 
        'base_dir' => '..', 
        'add_ignore' => ['.htaccess'],
    ]);
 
    $app->views->add('me/source', [
        'content' => $source->View(),
    ]);
 
});


$app->router->add('rss', function() use ($app) {
 

    $feed = new Protein\Rssfeed\Rssfeed([
            'http://widget.websta.me/rss/n/dearka93'            
    ]);
    $app->theme->setTitle("RSS Läsare");

    $app->views->add('me/about', [
        'title' => 'RSS-flöde',        
        'content' => $feed->picRss(),
    ]); 
    $app->views->add('me/rssSidebar', [
    ],'sidebar');

});
$app->router->add('afton', function() use ($app) {
 

    $feed = new Protein\Rssfeed\Rssfeed([
            'http://www.aftonbladet.se/rss.xml'            
    ]);
    $app->theme->setTitle("RSS Läsare");

    $app->views->add('me/about', [
        'title' => 'RSS-flöde',        
        'content' => $feed->picRss(),
    ]); 
    $app->views->add('me/rssSidebar', [
    ],'sidebar');

});
$app->router->add('dbwebb', function() use ($app) {
 

    $feed = new Protein\Rssfeed\Rssfeed([
            'http://dbwebb.se/kunskap/rss'            
    ]);
    $app->theme->setTitle("RSS Läsare");

    $app->views->add('me/about', [
        'title' => 'RSS-flöde',        
        'content' => $feed->picRss(),
    ]); 
    $app->views->add('me/rssSidebar', [
    ],'sidebar');

});
$app->router->add('int', function() use ($app) {
 

    $feed = new Protein\Rssfeed\Rssfeed([
            'http://boards.4chan.org/int/index.rss'            
    ]);
    $app->theme->setTitle("RSS Läsare");

    $app->views->add('me/about', [
        'title' => 'RSS-flöde',        
        'content' => $feed->picRss(),
    ]); 
    $app->views->add('me/rssSidebar', [
    ],'sidebar');

});
$app->router->add('wsg', function() use ($app) {
 

    $feed = new Protein\Rssfeed\Rssfeed([
            'http://boards.4chan.org/wsg/index.rss'            
    ]);
    $app->theme->setTitle("RSS Läsare");

    $app->views->add('me/about', [
        'title' => 'RSS-flöde',        
        'content' => $feed->picRss(),
    ]); 
    $app->views->add('me/rssSidebar', [
    ],'sidebar');

});
$app->router->add('fit', function() use ($app) {
 

    $feed = new Protein\Rssfeed\Rssfeed([
            'http://boards.4chan.org/fit/index.rss'            
    ]);
    $app->theme->setTitle("RSS Läsare");

    $app->views->add('me/about', [
        'title' => 'RSS-flöde',        
        'content' => $feed->picRss(),
    ]); 
    $app->views->add('me/rssSidebar', [
    ],'sidebar');

});


$app->router->add('about', function() use ($app) {
    $app->theme->setTitle("Om oss");
    $content = $app->fileContent->get('me.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
    
    $sidebar = $app->fileContent->get('me-sidebar.md');
    $sidebar = $app->textFilter->doFilter($sidebar , 'shortcode, markdown'); 
    
    $about = $app->fileContent->get('about.md');
    $about = $app->textFilter->doFilter($about , 'shortcode, markdown'); 
    
    $byline = $app->fileContent->get('byline.md');
    $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');

    $app->views->add('me/about', [
        'content' => $content,
        'byline' => $byline,
    ]); 
    $app->views->add('me/about', [
        'content' => $sidebar,
    ],'sidebar');
    $app->views->add('me/about', [
        'content' => $about,
    ],'sidebar');


});

 
$app->router->handle();
$app->theme->render();