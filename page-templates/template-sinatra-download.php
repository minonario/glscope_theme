<?php
/**
 * Template Name: Sinatra Download
 *
 * 100% wide page template without vertical spacing.
 *
 * @package     Sinatra
 * @author      Sinatra Team <hello@sinatrawp.com>
 * @since       1.0.0
 */

get_header();
?>

<div class="headerView">
  <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIAAQACgMBEQACEQEDEQH/xAGiAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgsQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+gEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoLEQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/AP0o/Yp+LHxl+Nfx9+AXgT4i/Gf4q6xpHlfED4n65c2PjLUvDmo+LNS07WdAtNN8MeIJPDZ0mz/4QLThLfS2XhHRbHRtNt31K+hQfY2gtbfHL1KniOJHKpUrOnmccNTddxqezpeynNKnFxUYNPROKTS21bb+ozqNF5Xw3yYbD0ObKp4mfsafI6ld1o03Uqyu51G0rvmk7u17qMVH+p0fbE+RdU1AKvyqGe3kIVeADJLbvK5wOXkd5GPzOzMST1KCaT12/rofLn//2Q==" alt="imgBlur">
  <img class="segunda" src="<?php echo get_template_directory_uri()?>/_next/static/images/Banner_saif-f7bb8091eb5d9ce556ec87293817f6ac.jpg.webp" alt="">
</div>

<div class="page-descargar">
  <div data-test="container" class="container">
        <div data-test="row" class="row">
          <div data-test="col" class="col-sm-12">
            <?php the_field('titulo',false,false) ?>
          </div>
        </div>
  </div>
<?php
if( have_rows('contenido') ):
    while ( have_rows('contenido') ) : the_row();

        // Case: Paragraph layout.
        if( get_row_layout() == 'columna_y_shortcode' ):?>
    <div data-test="container" class="container">
        <div data-test="container" class="container">
            <div data-test="row" class="row">
                <div data-test="col" class="col-sm-12 col-md-5">
                    <div class="info">
                    <?php
                        if( have_rows('filas') ):
                            while( have_rows('filas') ) : the_row(); ?>
                      <div data-test="row" class="row"><?php the_sub_field('texto')?></div>
                     <?php  endwhile;
                        endif;
                        ?>
                        <?php if(get_sub_field('url_de_descargar')) :?>
                        <div data-test="row" class="row">
                            <div>
                                <a class="btn-round btn-color-primary special" alt="" href="https://saifwebinstaller.glscope.com/saifwebsetup.exe" rel="noreferrer" target="_blank">
                                    <b>Descargar</b><i class="fas fa-arrow-circle-down icon"></i>
                                </a>
                            </div>
                        </div>
                      <?php endif; ?>
                    </div>
                </div>
                <div data-test="col" class="col-sm-12 col-md-6">
                    <?php echo do_shortcode(get_sub_field('shortcode'));?>
                </div>
            </div>
        </div>
    </div>
        <?php // Case: Download layout.
        elseif( get_row_layout() == 'iframe' ): ?>
    <div data-test="container" class="container pdf">
      <iframe title="Requerimientos Técnicos SAIF" src="<?php the_sub_field('archivo')?>"></iframe>
    </div>
  <?php endif;
    endwhile;
endif;
?>
    
</div>

<?php 
/*if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content/content', 'sinatra-fullwidth' );
	endwhile;
endif;*/
?>

<?php
get_footer();
