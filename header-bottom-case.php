   <div class="header__case-bottom">
       <div class="container">
           <div class="header__case-bottom-inner">
               <div class="header__case-bottom-content">
                   <a href="<?php echo get_post_type_archive_link('cases'); ?>"
                       class="header__case-bottom-link-back link">Назад к кейсам</a>


                   <span class="header__case-bottom-overtitle">Кейсы</span>
                   <h1 class="header__case-bottom-title title">
                       <?php the_field('cases_client')
                        ?> </h1>
                   <span class='header__case-bottom-subtitle'><?php the_field('cases_introduction') ?></span>
               </div>
               <img src="<?php echo _s2_assets_path('img/case-head-img.png') ?>" alt="" class="header__case-bottom-img">
           </div>
       </div>
   </div>