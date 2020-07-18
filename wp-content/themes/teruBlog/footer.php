<!-- footer -->
<footer>
  <p> Copyright - teruya inomata, 2020 All Rights Reserved.</p>
  </div>
</footer>
<?php wp_footer(); ?>
<script type="text/javascript">
  window._pt_lt = new Date().getTime();
  window._pt_sp_2 = [];
  _pt_sp_2.push("setAccount,41729f4c");
  var _protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
  (function() {
    var atag = document.createElement("script");
    atag.type = "text/javascript";
    atag.async = true;
    atag.src = _protocol + "js.ptengine.jp/41729f4c.js";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(atag, s);
  })();
</script>
<?php if ( is_single()) : ?>
  <?php
     $thumbnail_id = get_post_thumbnail_id($post);
     $imageobject = wp_get_attachment_image_src( $thumbnail_id, 'full' );
  ?>
  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "BlogPosting",
    "mainEntityOfPage":{
      "@type":"WebPage",
      "@id":"<?php the_permalink(); ?>"
    },
    "headline":"<?php the_title(); ?>",
    "image": [
      "<?php echo $imageobject[0]; ?>"
    ],
    "datePublished": "<?php echo get_date_from_gmt(get_post_time('c', true), 'c');?>",
    "dateModified": "<?php echo get_date_from_gmt(get_post_modified_time('c', true), 'c');?>",
    "author": {
      "@type": "Person",
      "name": "猪股輝哉"
    },
    "publisher": {
      "@type": "Person",
      "name": "猪股輝哉",
      "logo": {
        "@type": "ImageObject",
        "url": "https://terublog.com"
      }
    },
    "description": "<?php echo get_the_excerpt(); ?>"
  }
  </script>
<?php endif; ?>
</body>

</html>