<?php 

require __DIR__.'/config_with_app.php'; 

$app->theme->configure(ANAX_APP_PATH . 'config/theme_me.php'); 
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');

$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);

$di->setShared('db', function() {
    $db = new \Mos\Database\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/config_mysql.php'); //
    $db->connect();
    return $db;
});

$di->set('UsersController', function() use ($di) {
    $controller = new \Anax\Users\UsersController();
    $controller->setDI($di);
    return $controller;
});

$app->session;

$app->router->add('setup', function() use ($app) {
 
    //$app->db->setVerbose();
    if (isset($_SESSION['user'])&&$app->session->get('user')->type ==='admin'){
    $app->db->dropTableIfExists('user')->execute();
 
    $app->db->createTable(
        'user',
        [
            'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
            'acronym' => ['varchar(20)', 'unique', 'not null'],
            'email' => ['varchar(80)'],
            'name' => ['varchar(80)'],
            'password' => ['varchar(255)'],
            'created' => ['datetime'],
            'updated' => ['datetime'],
            'active' => ['datetime'],
            'type' => ['varchar(15)'],
            'points' => ['integer', 'default 0'],
            'rank' => ['varchar(15)'],
        ]
    )->execute();
   
    //lägger in användare
    $app->db->insert(
        'user',
        ['acronym', 'email', 'name', 'password', 'created', 'active', 'type','rank']
    );
 
    $now = date('Y-m-d H:i:s');
 
    $app->db->execute([
        'admin',
        'admin@dbwebb.se',
        'Administrator',
        password_hash('admin', PASSWORD_DEFAULT),
        $now,
        $now,
        'admin',
        'Anonymous'
    ]);
 
    $app->db->execute([
        'doe',
        'doe@dbwebb.se',
        'John/Jane Doe',
        password_hash('doe', PASSWORD_DEFAULT),
        $now,
        $now,
        'user',
        'Anonymous'
    ]);
    
    $app->db->execute([
        'dearka',
        'guanglei.huang@gmail.com',
        'Guanglei Huang',
        password_hash('123', PASSWORD_DEFAULT),
        $now,
        $now,
        'admin',
        'Anonymous'
    ]);
    
    $url = $app->url->create('users/list'); 
    $app->response->redirect($url); 
    }
    else {
    $url = $app->url->create('users/loggaIn'); 
    $app->response->redirect($url); 
    }
}); 
    


    

$app->router->handle();
$app->theme->render();