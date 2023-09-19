<?php
/**
 * Template Name: Sinatra Service/Product
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
      <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIAAQACgMBEQACEQEDEQH/xAGiAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgsQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+gEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoLEQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/AP0o/Yp+LHxl+Nfx9+AXgT4i/Gf4q6xpHlfED4n65c2PjLUvDmo+LNS07WdAtNN8MeIJPDZ0mz/4QLThLfS2XhHRbHRtNt31K+hQfY2gtbfHL1KniOJHKpUrOnmccNTddxqezpeynNKnFxUYNPROKTS21bb+ozqNF5Xw3yYbD0ObKp4mfsafI6ld1o03Uqyu51G0rvmk7u17qMVH+p0fbE+RdU1AKvyqGe3kIVeADJLbvK5wOXkd5GPzOzMST1KCaT12/rofLn//2Q==" alt="imgBlur">
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
<div class="page-saif">
 <?php

if (have_rows('contenido')):
  while (have_rows('contenido')) : the_row();
    // Case: Text and video layout.
    if (get_row_layout() == 'texto_y_video'):
        ?>
    <div data-test="container" class="container-fluid banner">
        <div data-test="container" class="container">
            <div data-test="row" class="row">
                <div data-test="col" class="col-sm-12 col-md-4">
                    <h1><b><?php the_sub_field('titulo') ?></b></h1>
                    <h2><?php the_sub_field('subtitulo') ?></h2>
                    <?php the_sub_field('parrafo', false) ?>
                </div>
                <div data-test="col" class="col-sm-12 col-md-8 col-img">
                    <div class="video-banner">
                        <div class="react-player" style="width: 100%; height: 100%;">
                            <div style="width: 100%; height: 100%; overflow: hidden;" data-vimeo-initialized="true">
                                 <?php the_sub_field('video', false) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>          
  <?php
    // Case: Text and background layout.
    elseif (get_row_layout() == 'texto_y_fondo'): ?>
    <div data-test="container" class="container-fluid back">
        <div data-test="container" class="container">
            <div data-test="row" class="row">
                <h3 class="upper"><?php the_sub_field('titulo') ?></h3>
                <?php the_sub_field('texto') ?>
            </div>
        </div>
    </div>
  <?php
    elseif (get_row_layout() == 'galeria'): ?>
    <div data-test="container" class="container-fluid">
        <div data-test="row" class="row">
            <div data-test="container" class="container-fluid back paddingBottom self-align-item-left"><h4>Galería</h4></div>
            <div data-test="container" class="container-fluid gallery">
                <div class="react-multi-carousel-list2 carousel-container">
                    <div class="react-multi-carousel-track2" style="">
                      <?php
                      if( have_rows('imagenes') ):
                          while( have_rows('imagenes') ) : the_row();
                          $image = get_sub_field('imagen');
                      ?>
                          <div class="item-galleryx">
                            <img data-toggle="modal" data-target="#exampleModal" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid" src="<?php echo esc_url($image['url']); ?>" />
                          </div>
                        <?php
                          endwhile;
                      endif;                      
                      ?>
                    </div>
                </div>
            </div>
        </div>
      <div data-test="modal" id="exampleModal" class="modal fade top" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog-centered modal-lg modal-dialog" role="document">
             <div class="modal-content">
                <div data-test="modal-header" class="modal-header">
                   <h4 class="modal-title"></h4>
                   <button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                </div>
                <div data-test="modal-body" class="modal-body">
                  
                </div>
             </div>
          </div>
      </div>
    </div>
  <?php
    elseif (get_row_layout() == 'tipo_acordeon'): ?>
    <div data-test="container" class="container-fluid" id="accordion">
  <?php if( have_rows('acordeon') ): ?>
    <?php while( have_rows('acordeon') ): the_row(); 
            if( have_rows('pestanas') ):
              $count_tab = 0;
                while( have_rows('pestanas') ) : the_row(); ?>
        <div data-test="row" class="row">
            <div class="borderRadius d-flex collapsed" data-toggle="collapse" data-target="#util<?php echo $count_tab ?>" aria-expanded="false" aria-controls="util<?php echo $count_tab ?>">
                <h4><?php the_sub_field('titulo')?></h4>
                <i data-test="fa" class="fa fa-plus"></i>
            </div>
            <div data-test="collapse" id="util<?php echo $count_tab ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <?php if (get_sub_field('tipo_de_campo') === 'lista') : ?>
                <div data-test="container" class="container-fluid margin">
                        <?php the_sub_field('texto');?>
                    <div data-test="row" class="row top">
                        <?php the_sub_field('listado');?>
                    </div>
                </div>
                    <?php
                          elseif(get_sub_field('tipo_de_campo') === 'columna') : ?>
                <div data-test="container" class="container-fluid margin">
                  <?php the_sub_field('texto');?>
                    <?php   if( have_rows('grupo_columnas') ):
                              while( have_rows('grupo_columnas') ): the_row(); 
                                $columna_size = get_sub_field('tamano_columna');
                                if( have_rows('columnas') ):
                                  $count_cols = 0; ?>
                  <div data-test="row" class="row top contenido-cols">
                             <?php  while ( have_rows('columnas') ) : the_row();
                                        if( get_row_layout() == 'columna_flexible' ):
                                            if( have_rows('columna') ): ?>
                      <div data-test="col" class="col-md-3 <?php echo ($count_cols++ == 0 ? 'margin2' : 'space2')?>">
                                          <?php while( have_rows('columna') ) : the_row(); ?>
                        <h5><?php the_sub_field('titulo_h5') ?></h5>
                        <?php the_sub_field('listado') ?>
                                            
                                        <?php   endwhile; ?>
                      </div>
                                   <?php    endif;
                                        endif;
                                    endwhile;  ?>
                  </div>
                          <?php endif; 
                              endwhile;
                            endif;
                          ?>
                </div>
                    <?php elseif(get_sub_field('tipo_de_campo') === 'fila') :
                            if( have_rows('grupo_filas') ):
                              while( have_rows('grupo_filas') ): the_row(); 
                                if( have_rows('filas') ):
                                  $count_rows = 0;
                                    while ( have_rows('filas') ) : the_row();
                                        if( get_row_layout() == 'fila' ):?>
                <div data-test="container" class="container-fluid margin contenido-cols">
                    <?php echo get_sub_field('texto')?>
                  <div data-test="row" class="row <?php echo ($count_rows++ == 0 ?'top' :'') ?>">
                    <?php echo get_sub_field('listado')?>
                  </div>
                </div>
                                   <?php    
                                        endif;
                                    endwhile;
                                endif;
                              endwhile;
                            endif;
                          endif;
                    ?>
            </div>
        </div>
       <?php $count_tab++ ?>
       <?php    endwhile;
            endif;
    ?>
    <?php endwhile; ?>
  <?php endif; ?>
  <?php if( have_rows('descargar') ): ?>
    <?php while( have_rows('descargar') ): the_row(); 
            if (get_sub_field('habilitado')) : ?>
        <div data-test="row" class="row">
            <a class="btn-default btn Ripple-parent descargar" href="<?php the_sub_field('enlace')?>">
                Descarga<b>SAIF</b><span>web</span><i class="fas fa-arrow-circle-down icon"></i>
                <div data-test="waves" class="Ripple" style="top: 0px; left: 0px; width: 0px; height: 0px;"></div>
            </a>
        </div>         
     <?php  endif;
          endwhile;
        endif; ?>    
    </div>
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
