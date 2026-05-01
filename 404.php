<?php // single.php ?>
<?php get_header(); ?>
<div class="container main-content">
    <div class="news-grid" style="width: 70%;">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h1><?php the_title(); ?></h1>
                <div class="meta"><?php the_author(); ?> | <?php the_date(); ?></div>
                <?php the_content(); ?>
                <?php comments_template(); ?>
            </article>
        <?php endwhile; endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

<?php // page.php - same as single without meta/comments ?>
<?php get_header(); ?>
<div class="container main-content">
    <div class="news-grid" style="width: 70%;">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

<?php // archive.php ?>
<?php get_header(); ?>
<div class="container main-content">
    <div class="news-grid" style="width: 70%;">
        <h2><?php the_archive_title(); ?></h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
            </article>
        <?php endwhile; the_posts_pagination(); endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

<?php // search.php ?>
<?php get_header(); ?>
<div class="container main-content">
    <div class="news-grid" style="width: 70%;">
        <h2>Search Results for: <?php echo get_search_query(); ?></h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
            </article>
        <?php endwhile; else : ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

<?php // 404.php ?>
<?php get_header(); ?>
<div class="container main-content" style="text-align:center;">
    <h1>404 - Page Not Found</h1>
    <p>Sorry, we couldn't find that page.</p>
    <a href="<?php echo home_url(); ?>" class="read-more">Go Home</a>
</div>
<?php get_footer(); ?>
