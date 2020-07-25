<?php

add_theme_support('post-thumbnails');

function cadastrando_post_type_imoveis() {
  $nomeSingular = 'Imóvel';
  $nomePlural = 'Imóveis';
  $description = 'Imóveis da imobiliária Malura';
  
  $labels = array(
    'name' => $nomePlural,
    'name_singular' => $nomeSingular,
    'add_new_item' => 'Adicionar novo ' . $nomeSingular,
    'edit_item' => 'Editar ' . $nomeSingular,
  );

  $supports = array(
    'title',
    'editor',
    'thumbnail'
  );
  
  $args = array(
    'labels' => $labels,
    'public' => true,
    'description' => $description,
    'menu_icon' => 'dashicons-admin-home',
    'supports' => $supports,
  );
  
  register_post_type( 'imovel' , $args );
}

function registrar_menu_navegacao() {
  register_nav_menu('header-menu', 'main-menu');

}

function geraTitulo() {
  bloginfo('name');  
  if( !is_home() ) { 
    echo ' | ';
    the_title(); 
  }
}

function registra_taxonomia_localizacao() {

  $nomeSingular = 'Localização';
  $nomePlural = 'Localizações';

  $labels = array(
    'name' => $nomePlural,
    'name_singular' => $nomeSingular,
    'edit_item' => 'Editar ' . $nomeSingular,
    'add_new_item' => 'Adicionar nova ' . $nomeSingular,
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'hierarchical' => true
  );

  register_taxonomy( 'localizacao', 'imovel', $args );

}


add_action( 'init', 'cadastrando_post_type_imoveis' );
add_action( 'init', 'registrar_menu_navegacao' );
add_action( 'init', 'registra_taxonomia_localizacao' );
