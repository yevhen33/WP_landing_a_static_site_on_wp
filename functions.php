<?php
    add_action( 'wp_enqueue_scripts', 'childhood_styles' );
    add_action('wp_enqueue_scripts', 'childhood_scripts');

    function childhood_styles() {
        wp_enqueue_style('childhood-style', get_stylesheet_uri(  ));
    };

    function childhood_scripts() {
        wp_enqueue_script('childhood-script', get_template_directory_uri() . '/assets/js/main.min.js', array(), null, true);
        wp_deregister_script( 'jquery' );  // отключаем jquery
        wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js' ); // подключаем через CDN
        wp_enqueue_script( 'jquery' ); // включаем скрипт
    };
    
    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' ); // установили изображение записи в админке (для установки превьюшки)

    // подключаем google_map
    
    function my_acf_google_map_api( $api ){
	
        $api['key'] = 'AIzaSyDySY8hrMvJbDt1ZatRr7xZK9cNqE8VN3w'; // Ваш ключ Google API
        
        return $api;
        
    }
    
    add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
?>