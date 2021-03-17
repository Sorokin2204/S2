          <li class="business-apps__item">
              <a href="<?php the_permalink() ?>">
                  <img src="<?php the_field('business-apps_img') ?>" alt="" class="business-apps__item-img">
                  <div class='business-apps__item-content'>
                      <div class="business-apps__item-title"><?php the_title() ?></div>
                      <p class="business-apps__text"><?php the_field('business-apps_text') ?></p>
                  </div>
              </a>
          </li>