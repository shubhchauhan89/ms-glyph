<?php
include './includes/auth.php';
include './includes/header.php';
include './includes/conn.php';

// Total Service Modules
$service = mysqli_query($con, "SELECT COUNT(*) as count FROM services");
$service_row = mysqli_fetch_assoc($service);
$service_count = $service_row['count'];

// Total Published Insights
$blog = mysqli_query($con, "SELECT COUNT(*) as count FROM blog");
$blog_row = mysqli_fetch_assoc($blog);
$blog_count = $blog_row['count'];

// Total Portfolio (Keeping this as a 3rd metric for balance)
$product = mysqli_query($con, "SELECT COUNT(*) as count FROM portfolio");
$product_row = mysqli_fetch_assoc($product);
$product_count = $product_row['count'];

// Recent Activity: 5 most recent blogs
$recent_blogs = mysqli_query($con, "SELECT * FROM blog ORDER BY id DESC LIMIT 5");
?>

<style>
/* Custom overrides for the dashboard to match "Studio White" */
.stat-card {
    border: 1px solid var(--light-gray) !important;
    border-radius: 0 !important;
    background: var(--white) !important;
    box-shadow: none !important;
}
.stat-card .card-body {
    padding: 24px;
}
.stat-icon {
    font-size: 24px;
    color: var(--navy);
}
.stat-count {
    font-size: 32px;
    font-weight: 700;
    color: var(--navy);
    margin-bottom: 4px;
}
.stat-label {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: var(--slate-gray);
}
.ghost-btn {
    border: 1px solid var(--navy) !important;
    background: transparent !important;
    color: var(--navy) !important;
    border-radius: 0 !important;
    font-weight: 600;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 13px;
}
.ghost-btn:hover {
    background: var(--navy) !important;
    color: #fff !important;
}
.table-minimal {
    border: none !important;
}
.table-minimal th, .table-minimal td {
    border-left: none !important;
    border-right: none !important;
    border-bottom: 1px solid var(--light-gray) !important;
    padding: 16px !important;
}
.system-status {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: var(--white);
    border: 1px solid var(--light-gray);
    padding: 10px 15px;
    font-size: 11px;
    font-weight: 600;
    color: var(--slate-gray);
    z-index: 1000;
    display: flex;
    align-items: center;
}
.pulse-icon {
    width: 8px;
    height: 8px;
    background-color: #10b981;
    border-radius: 50%;
    margin-right: 10px;
    box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
    animation: pulse 1.5s infinite;
}
@keyframes pulse {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(16, 185, 129, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
}
</style>

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row pt-4 pb-3">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin: 0; font-size: 20px; font-weight: 600;">System Overview</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="stat-count"><?php echo $service_count; ?></h5>
                                <p class="stat-label">Active Services</p>
                            </div>
                            <div class="stat-icon">
                                <i class="dripicons-jewel"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="stat-count"><?php echo $blog_count; ?></h5>
                                <p class="stat-label">Total Insights</p>
                            </div>
                            <div class="stat-icon">
                                <i class="dripicons-blog"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="stat-count"><?php echo $product_count; ?></h5>
                                <p class="stat-label">Portfolio Assets</p>
                            </div>
                            <div class="stat-icon">
                                <i class="dripicons-briefcase"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12">
                <h5 class="page-title mb-3" style="font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Quick Execution</h5>
                <div class="d-flex mb-4">
                    <a href="add-service.php" class="btn ghost-btn px-4 py-2 mr-3">[+] Construct New Service</a>
                    <a href="add-blog.php" class="btn ghost-btn px-4 py-2">[+] Draft New Insight</a>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-xl-12">
                <div class="card stat-card">
                    <div class="card-body p-0">
                        <div class="p-4 border-bottom" style="border-color: var(--light-gray) !important;">
                            <h5 class="page-title m-0" style="font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Latest Drafts</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 table-minimal">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(mysqli_num_rows($recent_blogs) > 0) {
                                        while($row = mysqli_fetch_assoc($recent_blogs)) {
                                            ?>
                                            <tr>
                                                <td style="font-weight: 500; color: var(--navy);"><?php echo htmlspecialchars($row['title']); ?></td>
                                                <td><?php echo htmlspecialchars($row['category']); ?></td>
                                                <td><?php echo date('M d, Y', strtotime($row['date'])); ?></td>
                                                <td class="text-right">
                                                    <a href="add-blog.php?edit=<?php echo $row['id']; ?>" class="text-primary" style="font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Manage</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='4' class='text-center py-4'>No recent insights found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="system-status">
    <div class="pulse-icon"></div>
    Status: Operational | Market: Delhi NCR
</div>

<?php
include './includes/footer.php';
?>