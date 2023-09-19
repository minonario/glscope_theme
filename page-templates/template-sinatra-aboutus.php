<?php
/**
 * Template Name: Sinatra AboutUs
 *
 * 100% wide page template without vertical spacing.
 *
 * @package     Sinatra
 * @author      Sinatra Team <hello@sinatrawp.com>
 * @since       1.0.0
 */
get_header();
?>
<div class="page-header">
  <div class="page-header-image">
    <div class="headerView">
      <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIAAMACgMBEQACEQEDEQH/xAGiAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgsQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+gEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoLEQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/APuPxn+zv8FNT/Y9+JHxnn+HmiW3xK8P/Fz9p3xPpPiLSGv9BS21rQf2mvib4G0m4k0TQ7zTvDt3bWfhHwt4c0BdMvdJuNLl0/RdOinspTbRsPisxw9DL8p/tLB0aWHx39oRp/WIQjzqEs4dOUVzJxinCUlZRW999T7jA4zFY/NKWUYzEVsRlv8AZntvqk6k/Zuqsip1FUk01OU1OKacpNrVbSkn8v3nh3w5pl3dabY+G/DtvY6fcT2NnbroOkMsFraStBbwq0lm8jCKGNEDO7OQuWZmyT9XPHYqM5JVbJSkkuSnok2l9g+KhgsNKEW6bbcYtv2lXVtJv7Z//9k=" alt="imgBlur">
    <?php 
          $image = get_field('imagen_de_cabecera');
          if( !empty( $image ) ): ?>
      <img class="segunda" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>
    </div>
  </div>
  <div class="page-header-mini-carousel">
    <h3 class="h3-responsive"><?php the_field('cinta_texto'); ?></h3>
  </div>
</div>

<div class="page-nosotros">
    <div data-test="container" class="container">
        <div data-test="row" class="row upper"><h1><?php the_title()?></h1></div>
        <div data-test="row" class="row row">
            <?php 
             if ( have_posts() ) :
                while (have_posts()) :
                the_post();

                the_content();
                endwhile;
            endif;
            ?>
        </div> 
<?php
if( have_rows('contenido') ):
    while ( have_rows('contenido') ) : the_row();

        // Case: Fila layout.
        if( get_row_layout() == 'fila' ): ?>
        <div data-test="row" class="row">
            <?php echo get_sub_field('texto', false, false)?>
        </div>
        <?php
        // Case: Dos columnas layout.
        elseif( get_row_layout() == 'dos_columnas' ): ?>
        <div data-test="row" class="row row">
            <div data-test="col" class="col-sm-6 col-nosotros col">
                <?php echo get_sub_field('columna_izq') ?>
            </div>
            <div data-test="col" class="col-sm-6 col-nosotros">
                <?php echo get_sub_field('columna_der') ?>
            </div>
        </div>
        <?php
        endif;
    endwhile;
endif;
?>
    </div>
</div>


<?php
get_footer();
