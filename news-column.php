<?php
include_once 'includes/db.php';
include_once 'includes/config.php';

// ─── 1. LOGICAL FILTER ────────────────────────────────────────────────────────
$selected_cat = isset($_GET['cat']) ? trim($_GET['cat']) : '';

// Dynamic SEO: Page title changes per category
if (!empty($selected_cat)) {
    $page_title = 'Expert ' . htmlspecialchars($selected_cat) . ' Insights in Delhi NCR | MS Glyph';
} else {
    $page_title = 'The Glyph Insights | MS Glyph Studio';
}

// ─── 2. FETCH BLOG POSTS ──────────────────────────────────────────────────────
$blogs        = [];
$blog_count   = 0;

if ($agency_blueprint_conn !== null) {
    try {
        if (!empty($selected_cat)) {
            $stmt = $agency_blueprint_conn->prepare(
                "SELECT id, title, category, descrip, img, url, date
                 FROM blog
                 WHERE category = :cat AND status = '0'
                 ORDER BY id DESC"
            );
            
            $stmt->execute([':cat' => $selected_cat]);
        } else {
            $stmt = $agency_blueprint_conn->prepare(
                "SELECT id, title, category, descrip, img, url, date
                 FROM blog
                 WHERE status = '0'
                 ORDER BY id DESC
                 LIMIT 6"
            );
            $stmt->execute();
        }
        $blogs      = $stmt->fetchAll();
        $blog_count = count($blogs);
    } catch (PDOException $e) {
        error_log("MS Glyph Blog Query Error: " . $e->getMessage());
    }
    
    // ─── 3. SIDEBAR: DISTINCT CATEGORIES ─────────────────────────────────────
    $categories = [];
    try {
        $cat_stmt = $agency_blueprint_conn->prepare(
            "SELECT DISTINCT category, COUNT(*) as post_count
             FROM blog
             WHERE status = '0' AND category IS NOT NULL AND category != ''
             GROUP BY category
             ORDER BY post_count DESC"
        );
        $cat_stmt->execute();
        $categories = $cat_stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("MS Glyph Category Query Error: " . $e->getMessage());
    }

    // ─── 3. SIDEBAR: RECENT POSTS (latest 3) ─────────────────────────────────
    $recent_posts = [];
    try {
        $recent_stmt = $agency_blueprint_conn->prepare(
            "SELECT title, url, date, img
             FROM blog
             WHERE status = '0'
             ORDER BY id DESC
             LIMIT 3"
        );
        $recent_stmt->execute();
        $recent_posts = $recent_stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("MS Glyph Recent Posts Query Error: " . $e->getMessage());
    }
}

include_once 'includes/header.php';
?>

        <!-- Breadcrumb Section Start -->
        <div class="breadcrumb-wrapper bg-cover" style="background-image: url('assets/img/breadcrumb.jpg');">
            <div class="left-shape">
                <img src="assets/img/breadcrumb-shape.png" alt="img">
            </div>
            <div class="right-shape">
                <img src="assets/img/breadcrumb-shape-2.png" alt="img">
            </div>
            <div class="container">
                <div class="page-heading">
                    <div class="breadcrumb-sub-title">
                        <!-- 4. SEO: Dynamic H1 -->
                        <h1 class="wow fadeInUp" data-wow-delay=".3s">
                            <?php if (!empty($selected_cat)): ?>
                                Insights: <?php echo htmlspecialchars($selected_cat); ?>
                            <?php else: ?>
                                The Glyph Insights.
                            <?php endif; ?>
                        </h1>
                    </div>
                    <!-- 4. SEO: Dynamic Breadcrumbs -->
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            <a href="news-column.php">Insights</a>
                        </li>
                        <?php if (!empty($selected_cat)): ?>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li><?php echo htmlspecialchars($selected_cat); ?></li>
                        <?php endif; ?>
                    </ul>
                    <p class="wow fadeInUp mt-4 text-white" data-wow-delay=".7s" style="font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
                        Technical blueprints, SEO strategies, and creative psychological insights for the modern brand.
                    </p>
                </div>
            </div>
        </div>

        <!-- News Standard Section Start -->
        <section class="news-standard-section section-padding">
            <div class="container">
                <div class="row g-4">

                    <!-- ── MAIN CONTENT LOOP ─────────────────────────────────── -->
                    <div class="col-12 col-lg-8">
                        <div class="news-standard-wrapper">

                            <?php if ($blog_count > 0): ?>

                                <?php foreach ($blogs as $blog): ?>
                                <div class="news-standard-items">
                                    <?php if (!empty($blog['img'])): ?>
                                    <div class="thumb">
                                        <img src="admin/assets/images/blog/<?php echo htmlspecialchars($blog['img']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>">
                                    </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <ul class="post-cat">
                                            <li>
                                                <i class="fa-regular fa-folder"></i>
                                                <?php echo htmlspecialchars($blog['category']); ?>
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-calendar-days"></i>
                                                <?php echo htmlspecialchars($blog['date']); ?>
                                            </li>
                                        </ul>
                                        <h3>
                                            <a href="news-details.php?slug=<?php echo urlencode($blog['url']); ?>">
                                                <?php echo htmlspecialchars($blog['title']); ?>
                                            </a>
                                        </h3>
                                        <p>
                                            <?php
                                            $plain_excerpt = strip_tags($blog['descrip']);
                                            echo htmlspecialchars(substr($plain_excerpt, 0, 150)) . (strlen($plain_excerpt) > 150 ? '...' : '');
                                            ?>
                                        </p>
                                        <a href="news-details.php?slug=<?php echo urlencode($blog['url']); ?>" class="theme-btn">
                                            Read More <i class="fa-regular fa-arrow-right-long"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            <?php else: ?>
                                <!-- Minimalist "no results" state -->
                                <div class="news-standard-items" style="text-align: center; padding: 60px 20px; border: 1px dashed #e0e0e0;">
                                    <div style="font-size: 2rem; margin-bottom: 16px; opacity: 0.3;">—</div>
                                    <h4 style="font-weight: 600; color: #0a192f; margin-bottom: 8px;">No blueprints found in this category.</h4>
                                    <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 24px;">
                                        This sector is currently uncharted. Explore other categories or return to the full archive.
                                    </p>
                                    <a href="news-column.php" class="theme-btn">View All Insights <i class="fa-regular fa-arrow-right-long"></i></a>
                                </div>
                            <?php endif; ?>

                            <!-- Pagination placeholder -->
                            <?php if ($blog_count > 0): ?>
                            <div class="page-nav-wrap pt-5 text-center">
                                <ul>
                                    <li><a class="page-numbers active" href="news-column.php<?php echo !empty($selected_cat) ? '?cat=' . urlencode($selected_cat) : ''; ?>">01</a></li>
                                </ul>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>

                    <!-- ── SIDEBAR ────────────────────────────────────────────── -->
                    <div class="col-12 col-lg-4">
                        <div class="main-sidebar sticky-style">

                            <!-- Search Widget -->
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Search</h4>
                                </div>
                                <div class="search-widget">
                                    <form action="news-column.php" method="GET">
                                        <input type="text" name="search" placeholder="Search insights...">
                                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                </div>
                            </div>

                            <!-- Dynamic Category Widget -->
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Categories</h4>
                                </div>
                                <div class="news-widget-categories">
                                    <ul>
                                        <li class="<?php echo empty($selected_cat) ? 'active' : ''; ?>">
                                            <a href="news-column.php">All Insights</a>
                                        </li>
                                        <?php if (!empty($categories)): ?>
                                            <?php foreach ($categories as $cat): ?>
                                            <li class="<?php echo ($selected_cat === $cat['category']) ? 'active' : ''; ?>">
                                                <a href="news-column.php?cat=<?php echo urlencode($cat['category']); ?>">
                                                    <?php echo htmlspecialchars($cat['category']); ?>
                                                </a>
                                                <span>(<?php echo (int)$cat['post_count']; ?>)</span>
                                            </li>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <li><a href="news-column.php">Uncategorized</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>

                            <!-- Dynamic Recent Posts Widget -->
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h3>Recent Post</h3>
                                </div>
                                <div class="recent-post-area">
                                    <?php if (!empty($recent_posts)): ?>
                                        <?php foreach ($recent_posts as $i => $recent): ?>
                                        <div class="recent-items<?php echo ($i === count($recent_posts) - 1) ? ' mb-0' : ''; ?>">
                                            <div class="recent-thumb">
                                                <?php if (!empty($recent['img'])): ?>
                                                <img src="admin/assets/images/blog/<?php echo htmlspecialchars($recent['img']); ?>" alt="<?php echo htmlspecialchars($recent['title']); ?>" style="width: 80px; height: 80px; object-fit: cover;">
                                                <?php else: ?>
                                                <img src="assets/img/news/post-1.jpg" alt="img" style="width: 80px; height: 80px; object-fit: cover;">
                                                <?php endif; ?>
                                            </div>
                                            <div class="recent-content">
                                                <ul>
                                                    <li>
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                        <?php echo htmlspecialchars($recent['date']); ?>
                                                    </li>
                                                </ul>
                                                <h6>
                                                    <a href="news-details.php?slug=<?php echo urlencode($recent['url']); ?>">
                                                        <?php echo htmlspecialchars(substr($recent['title'], 0, 45)) . (strlen($recent['title']) > 45 ? '...' : ''); ?>
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p style="color: #64748b; font-size: 0.9rem;">No recent posts available.</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Tag Cloud -->
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Tag</h4>
                                </div>
                                <div class="news-widget-categories">
                                    <div class="tagcloud">
                                        <a href="news-column.php?cat=<?php echo urlencode('SEO Strategy'); ?>">SEO</a>
                                        <a href="news-column.php?cat=<?php echo urlencode('Design Thinking'); ?>">Branding</a>
                                        <a href="news-column.php?cat=<?php echo urlencode('Design Thinking'); ?>">Design</a>
                                        <a href="news-column.php">Delhi NCR</a>
                                        <a href="news-column.php?cat=<?php echo urlencode('Marketing'); ?>">Marketing</a>
                                        <a href="news-column.php?cat=<?php echo urlencode('Design Thinking'); ?>">UI/UX</a>
                                        <a href="news-column.php?cat=<?php echo urlencode('Global Scaling'); ?>">Global</a>
                                        <a href="news-column.php?cat=<?php echo urlencode('SEO Strategy'); ?>">Development</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cta Section Start -->
        <section class="cta-section section-padding pb-0">
            <div class="rokect-shape float-bob-y">
                <img src="assets/img/rokect.png" alt="img">
            </div>
            <div class="container">
                <div class="cta-wrapper bg-cover" style="background-image: url('assets/img/cta-bg.jpg');">
                    <div class="cta-img wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.3s">
                        <img src="assets/img/cta-img.png" alt="img">
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        Stay Connected With <br> Precision Execution
                    </h2>
                    <div class="main-button wow fadeInUp" data-wow-delay=".5s">
                        <a href="contact.php"> <span class="theme-btn"> START YOUR BLUEPRINT </span><span class="arrow-btn"><i class="fa-regular fa-arrow-up-right"></i></span></a>
                    </div>
                </div>
            </div>
        </section>

        <?php include_once 'includes/footer.php'; ?>