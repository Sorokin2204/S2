<footer class="footer">
    <div class="container">
        <div class="footer__inner">
            <div class="footer__contact-box">
                <?php if (is_active_sidebar('s2-footer-contact')) {
                    dynamic_sidebar('s2-footer-contact');
                } ?>
            </div>


            <?php if (is_active_sidebar('s2-footer-list')) {
                dynamic_sidebar('s2-footer-list');
            } ?>

        </div>
    </div>
    <div class="footer__info">
        <div class="container"> <?php if (is_active_sidebar('s2-footer-info')) {
                                    dynamic_sidebar('s2-footer-info');
                                } ?> </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>