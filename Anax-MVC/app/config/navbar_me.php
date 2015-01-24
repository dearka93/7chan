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
        'home'  => [
            'text'  => '<i class="fa fa-home"></i> Hem',
            'url'   => '',
            'title' => 'Startsida'
        ],
        
        // This is a menu item
        'questions'  => [
            'text'  => '<i class="fa fa-question"></i> Frågor',
            'url'   => 'fragor',
            'title' => 'Frågor'
        ],

        // This is a menu item
        'tags'  => [
            'text'  => '<i class="fa fa-tags"></i> Taggar',
            'url'   => 'taggar',
            'title' => 'Taggar'
        ],

        //This is a menu item 
        'database'  => [ 
            'text'  => '<i class="fa fa-users"></i> Användare',    
            'url'   => 'users/list',    
            'title' => 'Database lista',

            // Here we add the submenu, with some menu items, as part of a existing menu item
            'submenu' => [

                'items' => [

                    // This is a menu item of the submenu
                    'item 1'  => [
                        'text'  => 'List',
                        'url'   => 'users/list',
                        'title' => 'Lista alla användare'
                    ],
                    'item 2'  => [
                        'text'  => 'Ny användare',
                        'url'   => 'users/add',
                        'title' => 'Lägga till en användare'
                    ],
                    'item 3'  => [
                        'text'  => 'Återställa',
                        'url'   => 'Users.php/setup',
                        'title' => 'Återställa databasen'
                    ],
                ],
            ],
        ],
        
        // This is a menu item
        'om'  => [
            'text'  => '<i class="fa fa-heart"></i> Om oss',
            'url'   => 'about',
            'title' => 'Om oss'
        ],
        
        // This is a menu item
        'rss' => [
            'text'  =>'<i class="fa fa-rss"></i> Rss',
            'url'   => 'rss',
            'title' => 'Rss läsare'
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
