<?php
include 'include/header.php';

// Get the brand from URL
$selected_brand = isset($_GET['brand']) ? $_GET['brand'] : '';
$brand_title = htmlspecialchars($selected_brand);

include 'include/carData.php';

// Get selected brand data
$brand_data = isset($carData[$selected_brand]) ? $carData[$selected_brand] : null;
$selected_cars = [];

if ($brand_data && isset($brand_data['models'])) {
    foreach ($brand_data['models'] as $name => $details) {
        $selected_cars[] = [
            'name' => $name,
            'image' => $details['image']
        ];
    }
}

?>

<div class="container section-padding">
    <!-- Header with Back Button -->
    <!-- Header with Back Button -->
    <div
        class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 mb-md-5 text-center text-md-start">
        <div class="mb-3 mb-md-0">
            <h2 class="fw-bold">2. Select Model</h2>
            <p class="text-muted mb-0">Choose your <?php echo $brand_title; ?> model to generate a checklist.</p>
        </div>
        <a href="index.php" class="btn btn-back m-auto me-lg-0">&larr; Back to Brands</a>
    </div>

    <?php if (!empty($selected_cars)): ?>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 mb-5">
            <?php foreach ($selected_cars as $car): ?>
                <div class="col">
                    <a href="checklist.php?brand=<?php echo urlencode($selected_brand); ?>&model=<?php echo urlencode($car['name']); ?>"
                        class="text-decoration-none text-dark">
                        <div class="brand-card h-100 p-3">
                            <div class="model-img-container mb-3">
                                <img src="<?php echo $car['image']; ?>" alt="<?php echo $car['name']; ?>"
                                    class="img-fluid model-img">
                            </div>
                            <div class="brand-name fs-5"><?php echo $car['name']; ?></div>
                            <div class="text-muted small"><?php echo $selected_brand; ?></div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Additional Section: Brand Info -->
        <!-- Additional Section: Brand Info -->
        <div class="brand-info-section mb-5">
            <div class="text-center mb-4">
                <h3 class="fw-bold mb-2">Inspecting a <?php echo $brand_title; ?>?</h3>
                <p class="text-muted">Ensure your new <?php echo $brand_title; ?> is in perfect condition before you drive
                    it home.</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="info-box h-100 p-4 text-center">
                        <div class="icon-circle mb-3 mx-auto">🎨</div>
                        <h5 class="fw-bold">Exterior Finish</h5>
                        <p class="small text-muted mb-0">Check for swirl marks and paint consistency, common in mass-market
                            models.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box h-100 p-4 text-center">
                        <div class="icon-circle mb-3 mx-auto">⚡</div>
                        <h5 class="fw-bold">Electronics</h5>
                        <p class="small text-muted mb-0">Verify infotainment and sensor operation, crucial for modern
                            <?php echo $brand_title; ?> cars.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box h-100 p-4 text-center">
                        <div class="icon-circle mb-3 mx-auto">🛋️</div>
                        <h5 class="fw-bold">Interior Fit</h5>
                        <p class="small text-muted mb-0">Inspect upholstery and dashboard alignment for any factory defects.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- NEW: Common Issues Section -->
        <div class="section-title text-center mb-5">
            <h2 class="fw-bold" style="color: var(--primary);">Common <?php echo $brand_title; ?> Issues</h2>
            <p class="text-muted">Pay extra attention to these components during your inspection.</p>
        </div>
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="issue-card h-100">
                    <h4 class="h5 fw-bold mb-2">Door & Panel Alignment</h4>
                    <p class="mb-0 text-muted small">Uneven gaps are often reported. Check all doors and the boot lid
                        alignment carefully.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="issue-card h-100">
                    <h4 class="h5 fw-bold mb-2">AC Performance</h4>
                    <p class="mb-0 text-muted small">Run the AC on full blast for 5 minutes. Listen for unusual noises or
                        lack of cooling.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="issue-card h-100">
                    <h4 class="h5 fw-bold mb-2">Tire Date Code</h4>
                    <p class="mb-0 text-muted small">Ensure tires are fresh. Check the DOT code on the sidewall to verify
                        manufacturing month/year.</p>
                </div>
            </div>
        </div>

        <!-- NEW: Hire Expert CTA -->
        <div class="expert-cta-section rounded-3 mb-5 p-4 p-md-5 text-center text-white">
            <h2 class="fw-bold mb-3">Not Sure What to Check?</h2>
            <p class="fs-5 mb-4 opacity-75">Hire a certified PDI expert to inspect your <?php echo $brand_title; ?> for you.
            </p>
            <a href="hire-expert.php" class="btn btn-accent rounded-pill fw-bold w-auto">Hire an Expert Now</a>
        </div>

        <!-- NEW: Download Sample Section -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="download-box p-4 rounded-3 d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center">
                        <div class="icon-box me-3">📄</div>
                        <div>
                            <h5 class="fw-bold mb-0 text-dark">Sample PDI Report</h5>
                            <small class="text-muted">See what a professional inspection covers.</small>
                        </div>
                    </div>
                    <a href="#" class="btn btn-outline-primary rounded-pill">Download Sample</a>
                </div>
            </div>
        </div>

    <?php else: ?>
        <div class="text-center py-5">
            <div class="display-1 text-muted mb-3">🚗</div>
            <h3 class="text-muted">No models found for <?php echo $brand_title; ?>.</h3>
            <p>We are constantly updating our database.</p>
            <a href="index.php" class="btn btn-primary mt-3">Choose Another Brand</a>
        </div>
    <?php endif; ?>
</div>

<?php include 'include/footer.php'; ?>