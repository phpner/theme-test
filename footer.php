<footer>
  <?php $args = array( 'theme_location' => 'bottom', 'container'=> false, 'menu_class' => 'bottom-menu', 'menu_id' => 'bottom-nav' );
    wp_nav_menu($args);
  ?>
  <p><b><?php bloginfo('name'); ?></b>, <? echo date('Y'); ?></p>
</footer>
<?php wp_footer(); ?>
<script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.23.6'><\/script>".replace("HOST", location.hostname));
    //]]></script>
</body>
</html>