<?php get_header() ?>

<main class="reviews">
    <div class="container">
        <div class="reviews__inner">
            <div class="reviews__box">



                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();
                        $link = get_field('reviews_info-link')  ?>
                <div class="reviews__item">
                    <div class="reviews__item-content">
                        <div class="reviews__comment">
                            <div class="reviews__comment-title"><?php the_title() ?> </div>
                            <p class="reviews__comment-text"> <?php the_field('reviews_text') ?></p>
                        </div>
                        <div class="reviews__user">
                            <img src="<?php the_field('reviews_user-img')  ?>" alt="" class="reviews__user-avatar">
                            <div class="reviews__user-box">
                                <div class="reviews__user-name"><?php the_field('reviews_user-name') ?></div>
                                <div class="reviews__user-position"><?php the_field('reviews_user-position') ?></div>
                            </div>

                        </div>
                    </div>
                    <div class="aside-info">
                        <div class="aside-info__text"><span><?php the_field('reviews_info-title') ?></span></div>
                        <a href="<?php echo $link['url']  ?>"
                            class="aside-info__link aside-info__link--small"><?php echo $link['title']  ?></a>

                    </div>
                </div>

                <?php endwhile ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</main>

<?php
get_template_part('reg-app');
get_footer();
?>