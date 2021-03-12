<?php get_header()


?>



<main class="cases">
    <div class="container">
        <div class="cases__inner">

            <?php

            if (have_posts()) : ?>
            <div class="cases__box">
                <?php while (have_posts()) :
                        the_post();
                        $card = get_field('cases_card');
                    ?>
                <div class="cases__item">
                    <img src="<?php echo $card['cases_card-img'] ?>" alt="" class="cases__img">
                    <div class="cases__introduction"><?php the_field('cases_introduction') ?></div>
                    <div class="cases__title"><?php the_title(); ?></div>
                    <div class="cases__subtitle"><?php the_field('cases_client') ?></div>
                    <p class="cases__text"><?php echo $card['cases_card-short-problem'] ?></p>
                    <a href="<?php echo get_permalink() ?>" class="cases__link link"
                        aria-label="Читать содержание кейса : <?php the_title() ?>">Читать кейс </a>
                </div>
                <?php endwhile ?>
            </div>
            <?php else : ?>
            <p>НЕТ ЗАПИСЕй</p>
            <?php endif ?>
        </div>
    </div>
</main>

<?php
get_template_part('reg-app');
get_footer();
?>