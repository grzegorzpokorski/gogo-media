<?php 

$title = get_field('title');
$description = get_field('description');
$blue_background = get_field('blue_background');
$slider_title = get_field('slider_title');
$slider_with_margin_on_top = get_field('slider_with_margin_on_top');
$section_title_heading_level = get_field('section_title_heading_level');
$section_heading_level = get_field('section_title_heading_level');
$slider_title_heading_level = get_field('slider_title_heading_level');
$slide_heading_level = get_field('slide_heading_level');
$slider_with_margin_on_top = get_field('slider_with_margin_on_top');

?>

<section class="section <?php echo $blue_background ? 'section--blue' : '' ?> ">
  <div class="container">
    <header class="section-header <?php echo $blue_background ? 'section-header--blue' : '' ?>">

      <?php if( $title ): ?>
        <<?php echo $section_heading_level; ?> class="section-header__title">
          <?php echo $title; ?>
        </<?php echo $section_heading_level; ?>>
      <?php endif; ?>

      <?php if( $description ): ?>
        <p class="section-header__description">
         <?php echo $description; ?>
        </p>
      <?php endif; ?>

    </header>
    
    <?php if( $slider_title ): ?>
      <<?php echo $slider_title_heading_level; ?> class="font-30 text-center <?php echo $blue_background ? 'text-white' : 'text-dark' ?>"><?php echo $slider_title; ?></<?php echo $slider_title_heading_level; ?>>
    <?php endif; ?>

    <?php if( have_rows('slider') ): ?>
    <div class="slider <?php echo $slider_with_margin_on_top ? 'slider--marginOnTop' : '' ?>">
      <ul class="slider__control">
        <li>
          <button class="slider__button slider__button--prev">
            <span class="visually-hidden">poprzedni slajd</span>
          </button>
        </li>
        <li>
          <button class="slider__button slider__button--next">
            <span class="visually-hidden">następny slajd</span>
          </button>
        </li>
      </ul>
      <ul class="my-slider slider__list">

        <?php while( have_rows('slider') ): the_row(); ?>
          <li class="slider__item">
            <article class="slider__article">
              <div class="slider__inner">
                <<?php echo $slide_heading_level; ?> class="slider__title"><?php echo get_sub_field('slide_title'); ?></<?php echo $slide_heading_level; ?>>
                <p class="slider__content">
                 <?php echo get_sub_field('slide_content'); ?>
                </p>
                <?php if(get_sub_field('slide_image')):?>
                  <?php echo wp_get_attachment_image(get_sub_field('slide_image'), "size_medium", "", array("class" => "slider__image")); ?>
                <?php endif; ?>
              </div>
            </article>
          </li>
        <?php endwhile;?>

      </ul>
    </div>
    <?php endif; ?>
  </div>
</section>