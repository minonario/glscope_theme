<?php
/**
 * Template Name: Sinatra PressReleases
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
      <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIAAQACgMBEQACEQEDEQH/xAGiAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgsQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+gEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoLEQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/AP6JvhLp3h74h/En9r/wLrnhXw5Z+Cfg78a/Anwt8CeEvD1g/h7QdJ8JWv7KvwV+KEFqlnpdxb+VKvizxdqlwWs5LS3ktI7G1ktnW23yfK4jhPII08TgcPgFgcLmmbRr4unltfEZc3Xhw5VwyrUp4KrQqUqkqOFowquEkq3K5VlUlObl9jR4lzmpLB4ivi1i6+BwEqVCtjaNDGSdKpnlOt7OqsVTqwrQpzqz9hGpGX1ePLGj7OMIpflp4t/ba8U2HivxNYW/wK/ZZ+z2XiHWrSDzvgrplxN5NtqVzDF5txPqkk88mxF3zTSPLK2XkdnYk64XLcnq4bD1JZHkylUoUptLLsPZOdOMmlzRlK13peTfdt6ns4qljKOJxNKOdZ7JUq9ampSzOvzNQqSinLl5Y8zSu+WMVfZJaH//2Q==" alt="imgBlur">
      <?php 
            $image = get_field('imagen_de_cabecera');
            if( !empty( $image ) ): ?>
          <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
      <?php endif; ?>
    </div>
  </div>
  <div class="page-header-mini-carousel">
    <h3 class="h3-responsive">Consultoría Integral e Información</h3>
  </div>
</div>
<div class="page-informes">
    <div data-test="container" class="container">
      <div data-test="row" class="row"><h1 class="upper"> <?php the_title() ?> </h1> </div>
        <div data-test="row" class="row bottom">
          <div data-test="col" class="col-sm-3">
            <div class="form-group">
                <select class="form-control filtroPrensa">
                  <option value="2023" selected>2023</option>
                  <option value="2022">2022</option>
                  <option value="2021">2021</option>
                </select>
            </div>
          </div>
        </div>
        <?php echo do_shortcode(get_field('shortcode'))?>
    </div>
</div>


<?php
/* if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();

  get_template_part( 'template-parts/content/content', 'sinatra-fullwidth' );
  endwhile;
  endif; */
get_footer();
