     <div class="header__bottom">
         <div class="container">
             <div class="header__bottom-inner">
                 <div class="header__bottom-content">


                     <h1 class="header__bottom-title title">
                         <?php

                            if (is_singular('business-apps')) {
                                $post = get_queried_object();
                                $postType = get_post_type_object(get_post_type($post));
                                if ($postType) {
                                    echo esc_html($postType->labels->singular_name);
                                }
                            } else {

                                $postType = get_queried_object();
                                echo esc_html($postType->labels->singular_name);
                            }



                            ?>


                     </h1>
                     <?php
                        $theme_location = '';
                        switch (true) {
                            case is_post_type_archive('business-apps'):
                            case is_singular('business-apps'):
                                $theme_location = 'menu-header-bottom-business-apps';
                                break;
                            case is_post_type_archive('about'):
                                $theme_location = 'menu-header-bottom-about';
                                break;
                            default:
                                break;
                        }
                        if (!empty($theme_location)) {
                            wp_nav_menu([
                                'theme_location' => $theme_location,
                                'container' => 'nav',
                                'container_class' => 'header__bottom-nav',
                                'menu_class' => 'header__bottom-list list'
                            ]);
                        }
                        ?>





                 </div>
             </div>
         </div>
     </div>