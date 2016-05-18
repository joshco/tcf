<?php

return array(
    'scfp' => array(
        'page_title' => 'Contact Form', 
        'menu_title' => 'Contact Form', 
        'capability' => 'manage_options',
        'function' => '',
        'icon_url' => '',  
        'position' => null, 
        'hideInSubMenu' => TRUE,
        'icon_url'   => 'dashicons-email-alt',    
        'submenu' => array(
            'edit.php?post_type=form-entries' => array(
                'page_title' => 'Inbox', 
                'menu_title' => 'Inbox', 
                'capability' => 'manage_options',
                'function' => '',   
            ),               
            'scfp_plugin_options' => array(
                'page_title' => 'Settings', 
                'menu_title' => 'Settings', 
                'capability' => 'manage_options',
                'function' => array('SCFP_Settings', 'renderSettingsPage'),                         
            ),   
        ),
    ),
);
    