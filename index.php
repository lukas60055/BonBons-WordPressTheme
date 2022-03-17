<?php get_header(); ?>

<main class="site-content">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
            <?php
                the_content();
            ?>
        </div>
    </article>
</main>

<?php get_footer(); ?>