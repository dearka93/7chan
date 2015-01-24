<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',
 
    // Here comes the menu strcture
    'items' => [

        // This is a menu item
        'tillbaka'  => [
            'text'  => 'Tillbaka',
            'url'   => 'index.php',
            'title' => 'Tillbaka till Startsidan'
        ],
 

        
        // This is a menu item
        'regioner' => [
            'text'  =>'Regioner',
            'url'   => 'theme.php?tema',
            'title' => 'Regioner'
        ],
        

 
        // This is a menu item
        'fontawesome' => [
            'text'  =>'Font-Awesome',
            'url'   => 'theme.php?font-awesome',
            'title' => 'Font-Awesome exemplar'
        ],

        // This is a menu item
        'typografi' => [
            'text'  =>'Typografi',
            'url'   => 'theme.php?typografi',
            'title' => 'Font-Awesome exemplar'
        ],
    ],
 
    // Callback tracing the current selected menu item base on scriptname
    'callback' => function ($url) {
        if ($url == $this->di->get('request')->getRoute()) {
                return true;
        }
    },

    // Callback to create the urls
    'create_url' => function ($url) {
        return $this->di->get('url')->create($url);
    },
];
