<aside class="sidebar">
    <?php if (is_active_sidebar('sidebar-main')) : ?>
        <?php dynamic_sidebar('sidebar-main'); ?>
    <?php else : ?>
        <div class="sidebar-widget">
            <h3><i class="fas fa-chart-line"></i> Trending Now</h3>
            <ul class="trending-widget">
                <li><a href="#">Sample trending post 1</a></li>
                <li><a href="#">Sample trending post 2</a></li>
            </ul>
        </div>
        <div class="sidebar-widget newsletter-widget">
            <h3><i class="far fa-envelope"></i> Subscribe</h3>
            <form>
                <input type="email" placeholder="Your email">
                <button type="submit">Subscribe</button>
            </form>
        </div>
    <?php endif; ?>
</aside>
