<?php
/**
 * Template Name: Sinatra Home
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
      <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIAAQACgMBEQACEQEDEQH/xAGiAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgsQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+gEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoLEQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/APo/9oT9oT4xS6hZ6PovjW68IvZ6tqkMer+GNL0G11aTSrGMX+n6DO+oaVqVjLpFjdeINWaGI2AupIbiKzuru4sbHT7a1+XfPmeAw88RUnGsvddekqcZzhRq1FThUhKE6E4RU5e66Vne7u1G3vYL2OVY/E+ww1CrCsknSxCqVIwbpq86U41KdanUbjF88avNGzUHFTmpfmQvx3+OzAMPjH44jDAMI45dCSNARkJGv9h/Ki/dVeygDtX6/hc2pzw2HnUyXh+pUlQpSnUnlNDmnOVOLlOVmlzSbcnZJXbsktD89rZJh4VasaeKzCnCNScYU44yfLCCk1GEbpvlirJXbdlq29T/AP/Z" alt="imgBlur">
    <?php 
          $image = get_field('imagen_de_cabecera');
          if( !empty( $image ) ): ?>
      <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>
    </div>
    <div class="page-header-mini-carousel">
      <h3 class="h3-responsive"><?php the_field('cinta_texto'); ?></h3>
    </div>
  </div>
</div>
<div class="homeContainer">
<?php

if (have_rows('contenido')):
  while (have_rows('contenido')) : the_row();
      // Case: Image and text layout.
      if (get_row_layout() == 'imagen_y_texto'):
        ?>
    <section class="saifBanner">
      <div data-test="container" class="container">
        <div data-test="row" class="row">
          <div data-test="col" class="col-sm-6 col-img">
            <?php $image = get_sub_field('imagen'); 
                  if( !empty( $image ) ):
            ?>
            <img class="img-banner" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
          </div>
          <div data-test="col" class="col-sm-5 text-right">
            <?php the_sub_field('texto'); ?>
            <div data-test="row" class="row row-button">
              <a href="<?php echo get_sub_field('enlace') ?>" class="btn-default btn Ripple-parent btn-round btn-color-primary borderRadius">
                Saber más
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
      <?php
    // Case: Shortcode layout.
    elseif (get_row_layout() == 'bloque_shortcode'): ?>
    <section class="<?php echo get_sub_field('classname')?>">
      <div data-test="container" class="container">
        <h2><?php the_sub_field('titulo') ?></h2>
      </div>
      <div data-test="container" class="container space">
        <?php echo do_shortcode(get_sub_field('shortcode'))?>
        <div data-test="row" class="row row-button">
          <a data-test="button" <?php echo (get_sub_field('abrir_en_pestana') ? 'target="_blank"' : '')?> role="button" class="btn-default btn Ripple-parent btn-round btn-color-primary" href="<?php echo get_sub_field('enlace') ?>"> 
            Ver más
            <div data-test="waves" class="Ripple "></div>
          </a>
        </div>
      </div>
    </section>
    <?php
    endif;

  endwhile;
endif;
?>
</div>

<?php
/* if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();

  get_template_part( 'template-parts/content/content', 'sinatra-fullwidth' );
  endwhile;
  endif; */
get_footer();
