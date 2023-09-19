<?php
/**
 * Template Name: Sinatra Contact
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
      <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIAAQACgMBEQACEQEDEQH/xAGiAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgsQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+gEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoLEQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/APGPirY674Z+Fn7QnwE0Tx/4+TwbeX2qxeItS8QeIf8AhPvFni3RvCPiu18OweGvEOvfEa08XNLoOpyXH/CRXlrpttplzpfiS3tb7wld+Gra3jsR+S4zH4jGUOFs8xk3isbiJU0o1ZVFhqEMwy/GY2rToYelOnBQp1cHh1SVX2rapwlXdetTp1YftnB2EoLFcScNUKVLCYGtSaqV6FGg8wbwGYYbBRnHGV6VedOeIoYvEQxEqSheNarSoewoVq9Kp+wvjP8A4IT/ALD2peMPFeoxT/GfSo7/AMS67ex6Xpnj3Sl03TUutUup0sNPW98I316tjZrILe0W7vby6FvHGLi6uJd8r8GP4ix+Gx+Nw1OGFdPD4vE0KbnSlObhSrTpxc5upeUuWK5pPWTu3ubZfw/g8XgMFiqtXFKpicJhsRUVOpThBTrUYVJqEFRtCClJ8sVpFWS2P//Z" alt="imgBlur">
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
<div class="page-contact">
    <div data-test="container" class="container">
        <div data-test="row" class="row">
            <div data-test="col" class="col-sm-6 col-md-6">
                <div class="info">
                <?php if( have_rows('ubicacion') ): ?>
                  <?php while( have_rows('ubicacion') ): the_row(); ?>
                    <div data-test="row" class="row"><h1><?php echo get_sub_field('titulo'); ?></h1></div>
                      <div data-test="row" class="row">
                          <div class="elementCoordenadas">
                            <span>
                              <?php echo get_sub_field('direccion'); ?>
                            </span>
                          </div>
                      </div>
                    <div data-test="row" class="row">
                        <div class="elementCoordenadas"><span><?php echo get_sub_field('telefono'); ?></span></div>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
            <div data-test="col" class="col-sm-6 col-md-6 col-escribenos">
                <?php if( have_rows('contacto_shortcode') ): ?>
                  <?php while( have_rows('contacto_shortcode') ): the_row(); ?>
                    <h3><?php echo get_sub_field('titulo'); ?></h3>
                    <?php echo do_shortcode(get_sub_field('shortcode')); ?>
                  <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
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
