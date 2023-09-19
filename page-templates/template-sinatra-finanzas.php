<?php
/**
 * Template Name: Sinatra Service/Product V2
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
      <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIAAQACgMBEQACEQEDEQH/xAGiAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgsQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+gEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoLEQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/APMf+CeHx98Zabor+AND07wv4b0vV9Wn1rVdU8OaVc6J4g1GWzuPBekWtpfanYajD9rs7XT7+6tbEXEEl1plvKbbTLqztQIK4MwgqOG54XcnLm5qknUa55SbjFzcnGGnuxVlFe7G0UkvocParCMnGEP3cIONGEaMZKNoKU1TUeedl705XlKV5Scm2z+kTRf2HPgfrGj6Tq99qnxze91XTLDUbx4v2lfj/bxPdX1rFc3DR28HxGjhgjaaVykMKJFEpCRoqKAPhZzgpyX1ei7Skry9q27N6turdt9X1ZX1Gg9W693rpiK3XX+c/wD/2Q==" alt="imgBlur">
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
<div class="<?php echo (get_field('tipo_de_pagina') === 'multiple' ? "page-fd" : 'page-consultoria') ?>">
<?php

// Check value exists.
if( have_rows('contenido') ): ?>

    <div data-test="container" class="container-fluid" style="padding: 0px;">
<?php while ( have_rows('contenido') ) : the_row();

        // Case: Texto e imagen layout.
        if( get_row_layout() == 'texto_e_imagen' ): ?>
        <div data-test="container" class="container-fluid banner">
            <div data-test="container" class="container">
                <div data-test="row" class="row">
                    <div data-test="col" class="col-sm-6">
                        <div class="corner">
                            <?php the_sub_field('texto'); ?>
                        </div>
                    </div>
                    <div data-test="col" class="col-sm-6 col-img">
                        <a href="https://www.finanzasdigital.com" target="_blank" rel="noopener noreferrer">
                        <?php 
                            $image = get_sub_field('imagen');
                            if( !empty( $image ) ):
                        ?>
                          <img class="img-banner" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                      <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        // Case: Noticas layout.
        elseif( get_row_layout() == 'noticias' ): ?>
        <div data-test="container" class="container">
            <h3 class="upper"><?php the_sub_field('titulo')?></h3>
            <div data-test="row" class="rowx">
                <?php echo do_shortcode(get_sub_field('shortcode'))?>
                <div data-test="col" class="col-sm-12">
                    <div data-test="row" class="row row-button">
                      <a class="btn-default btn Ripple-parent btn-round btn-color-primary" href="https://finanzasdigital.com" target="_blank" rel="noreferrer">
                            Ver más
                      </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        elseif( get_row_layout() == 'bloque_dos_columnas' ): ?>
        <div data-test="container" class="container">
            <h3 class="upper"><?php the_sub_field('titulo') ?></h3>
            <div data-test="container" class="container">
                <div data-test="row" class="row space">
                    <div data-test="col" class="col-sm-12 col-md-6 info">
                        <?php the_sub_field('texto') ?>
                    </div>
                    <div data-test="col" class="col-sm-12 col-md-5">
                        <?php echo do_shortcode(get_sub_field('shortcode')) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        elseif( get_row_layout() == 'bloque_fila' ): ?>
        <div data-test="container" class="container">
            <div data-test="row" class="row">
                <h1 class="upper"><?php the_sub_field('titulo') ?></h1>
                <?php the_sub_field('texto') ?>
            </div>
        </div>
        <?php
        endif;
      endwhile; ?>
    </div>
<?php
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
