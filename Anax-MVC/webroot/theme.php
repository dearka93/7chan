<?php 

require __DIR__.'/config_with_app.php';

$app->theme->configure(ANAX_APP_PATH . 'config/theme-grid.php');
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_tema.php');

$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);


$app->router->add('tema', function() use ($app) {
 

    $app->theme->setTitle("Regioner");
    $app->theme->addStylesheet('css/anax-grid/regioner.css'); 

 
    $app->views->addString('flash', 'flash')
               ->addString('featured-1', 'featured-1')
               ->addString('featured-2', 'featured-2')
               ->addString('featured-3', 'featured-3')
               ->addString('main', 'main')
               ->addString('sidebar', 'sidebar')
               ->addString('triptych-1', 'triptych-1')
               ->addString('triptych-2', 'triptych-2')
               ->addString('triptych-3', 'triptych-3')
               ->addString('footer-col-1', 'footer-col-1')
               ->addString('footer-col-2', 'footer-col-2')
               ->addString('footer-col-3', 'footer-col-3')
               ->addString('footer-col-4', 'footer-col-4');
 
});

$app->router->add('font-awesome', function() use ($app) { 
    $app->theme->setTitle("Font-Awesome"); 
        
         $app->views->addString('<i class="fa fa-rebel fa-4x fa-spin"></i>', 'flash')

               ->addString('<span class="fa-stack fa-lg">
  <i class="fa fa-wifi fa-stack-1x"></i>
  <i class="fa fa-ban fa-stack-2x"></i>
</span>', 'sidebar')

               ->addString('<i class="fa fa-cc-visa fa-2x fa-rotate-90"></i>', 'triptych-2')
               ->addString('<i class="fa fa-space-shuttle fa-3x fa-spin"></i>', 'triptych-3')
               ->addString('<i class="fa fa-hospital-o"></i>', 'footer-col-1')
               ->addString('<i class="fa fa-jpy"></i>', 'footer-col-2')
               ->addString('<i class="fa fa-money"></i>', 'footer-col-3')
               ->addString('<i class="fa fa-wheelchair fa-spin"></i>', 'footer-col-4');
    
    $font = $app->fileContent->get('iconer.html');

        $app->views->addString($font, 'featured-1');

    $font = $app->fileContent->get('spinning.html');

        $app->views->addString($font, 'featured-2');

    $font = $app->fileContent->get('bordered.html');

        $app->views->addString($font, 'featured-3');

    $font = $app->fileContent->get('rotated.html');

        $app->views->addString($font, 'main');             
    $font = $app->fileContent->get('list.html');

        $app->views->addString($font, 'triptych-1');
    

}); 

$app->router->add('typografi', function() use ($app) {
 
    $app->theme->setTitle("Typografi");
     
    $content = $app->fileContent->get('typografi.html'); 
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown'); 
     
    $app->views->addString($content, 'main') 
               ->addString($content, 'sidebar');

    $app->views->addString('', 'flash')
               ->addString('', 'featured-1')
               ->addString('', 'featured-2')
               ->addString('', 'featured-3')
               ->addString('', 'triptych-1')
               ->addString('', 'triptych-2')
               ->addString('', 'triptych-3')
               ->addString('', 'footer-col-1')
               ->addString('', 'footer-col-2')
               ->addString('', 'footer-col-3')
               ->addString('', 'footer-col-4');
});


$app->router->handle();
$app->theme->render();
