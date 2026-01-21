<?php
include 'include/header.php';

$brand_param = isset($_GET['brand']) ? strtolower($_GET['brand']) : '';
$model_param = isset($_GET['model']) ? strtolower($_GET['model']) : '';

$brand = 'Brand Not Found';
$model = 'Model Not Found';
$model_features = [];

include 'include/carData.php';

// 1. Find Brand (Same logic as models.php)
$brand_data = null;
foreach ($carData as $key => $data) {
    if (strtolower($key) === $brand_param) {
        $brand = $key;
        $brand_data = $data;
        break;
    }
}

// 2. Find Model
if ($brand_data && isset($brand_data['models'])) {
    foreach ($brand_data['models'] as $key => $details) {
        if (strtolower($key) === $model_param) {
            $model = $key;
            // Get features directly inside this loop
            if (isset($details['features'])) {
                $model_features = $details['features'];
            }
            break;
        }
    }
}

// Combine static checklist with model features
$checklist_categories = $pdiChecklist;
if (!empty($model_features)) {
    $checklist_categories['Model Specific Features'] = $model_features;
}

// 3. Load Brand Content (JSON)
$content_data = [];
$json_file = 'assets/data/brand_content.json';

if (file_exists($json_file)) {
    $json_content = file_get_contents($json_file);
    $all_brand_content = json_decode($json_content, true);

    if ($all_brand_content) {
        // Try to find the brand in the content JSON
        if (isset($all_brand_content['brands'][$brand])) {
            $content_data = $all_brand_content['brands'][$brand];
        } elseif (isset($all_brand_content['default'])) {
            $content_data = $all_brand_content['default'];
        }
    }
}



?>

<div class="container">
    <!-- Premium Hero Section -->
    <div class="section-glass text-center mt-5">
        <span class="section-subtitle-pdi">Premium Portal</span>
        <h1 class="display-5 fw-bold mb-3">Your Journey to <span class="text-accent">
                <?php echo "$brand $model"; ?>
            </span>
            Perfection</h1>
        <p class="hero-desc text-muted mx-auto" style="max-width: 700px; font-size: 1.1rem; line-height: 1.6;">
            <?php echo isset($content_data['brand_info']) ? $content_data['brand_info'] : "Ensure your new car is defect-free with our comprehensive inspection checklist."; ?>
        </p>
    </div>
</div>

<div class="container section-padding">
    <!-- Header -->
    <div class="mb-4">
        <div class="mb-4 py-3">
            <h2 class="fw-bold">3. Your Custom PDI Checklist</h2>
            <div class="model-badge-premium">
                <span class="badge-label">Model Selected</span>
                <span class="badge-separator">|</span>
                <span class="badge-value text-accent"><?php echo "$brand $model"; ?></span>
            </div>
        </div>

        <!-- Actions -->
        <!-- Actions -->
        <div class="d-flex flex-wrap align-items-center gap-3 mt-4 border-bottom pb-4">

            <button class="btn-pdi btn-pdi-accent">
                <i class="fas fa-file-pdf"></i> Download PDF
            </button>
            <button class="btn-pdi btn-pdi-primary" data-bs-toggle="modal" data-bs-target="#shareModal">
                <i class="fas fa-share-nodes"></i> Share
            </button>

            <a href="models.php?brand=<?php echo urlencode($brand_param); ?>" class="btn-pdi btn-pdi-outline ms-auto">
                <i class="fas fa-arrow-left"></i> Back to Models
            </a>
        </div>
    </div>

    <!-- Accordion Checklist -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="accordion custom-accordion" id="pdiChecklist">
                <?php
                $index = 0;
                foreach ($checklist_categories as $category => $items):
                    $collapseId = "collapse" . $index;
                    $headerId = "heading" . $index;
                    ?>
                    <div class="accordion-item mb-3 border-0 shadow-sm overflow-hidden radius-theme">
                        <h2 class="accordion-header" id="<?php echo $headerId; ?>">
                            <button
                                class="accordion-button <?php echo $index !== 0 ? 'collapsed' : ''; ?> fw-bold py-3 px-4"
                                type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapseId; ?>"
                                aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                                aria-controls="<?php echo $collapseId; ?>">
                                <?php echo $category; ?>
                            </button>
                        </h2>
                        <div id="<?php echo $collapseId; ?>"
                            class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>"
                            aria-labelledby="<?php echo $headerId; ?>" data-bs-parent="#pdiChecklist">
                            <div class="accordion-body p-4 bg-white-theme">
                                <ul class="list-unstyled mb-0 checklist-items">
                                    <?php foreach ($items as $item): ?>
                                        <li class="d-flex align-items-center mb-3 py-3 px-4 rounded-3 checklist-item-row"
                                            onclick="toggleChecklistItem(this)">
                                            <div class="custom-pdi-checkbox">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="item-text flex-grow-1">
                                                <?php echo $item; ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                    $index++;
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>

<!-- 4. SEO Content Sections -->
<div class="container">
    <div class="row justify-content-center pt-4">
        <div class="col-lg-12">

            <!-- A. Why PDI Matters -->
            <div class="premium-section-spacer">
                <div class="text-center mb-5">
                    <span class="section-subtitle-pdi">Vital Checks</span>
                    <h2 class="fw-bold mt-2" style="font-size: 2.5rem; color: #0f172a;">Why <span
                            class="text-dark"><?php echo $brand; ?></span> PDI Matters</h2>
                </div>

                <div class="row g-4 justify-content-center">
                    <!-- Card 1 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 card-hover-premium"
                            style="border-radius: 24px; background: #fff;">
                            <div class="d-inline-flex align-items-center justify-content-center mb-4"
                                style="width: 56px; height: 56px; background-color: #fff7ed; border-radius: 50%;">
                                <i class="fas fa-check text-accent fs-5"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: #0f172a; font-size: 1.25rem;">Internet Inside</h4>
                            <p class="text-muted mb-0" style="font-size: 0.95rem; line-height: 1.6;">
                                The i-SMART system is the car's brain. Verify voice commands and Hello MG
                                responsiveness.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 card-hover-premium"
                            style="border-radius: 24px; background: #fff;">
                            <div class="d-inline-flex align-items-center justify-content-center mb-4"
                                style="width: 56px; height: 56px; background-color: #fff7ed; border-radius: 50%;">
                                <i class="fas fa-check text-accent fs-5"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: #0f172a; font-size: 1.25rem;">Fit/Finish checks</h4>
                            <p class="text-muted mb-0" style="font-size: 0.95rem; line-height: 1.6;">
                                Heavily accessorized models need checks for loose exterior chrome or badge alignment.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 card-hover-premium"
                            style="border-radius: 24px; background: #fff;">
                            <div class="d-inline-flex align-items-center justify-content-center mb-4"
                                style="width: 56px; height: 56px; background-color: #fff7ed; border-radius: 50%;">
                                <i class="fas fa-check text-accent fs-5"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: #0f172a; font-size: 1.25rem;">Battery Discharge</h4>
                            <p class="text-muted mb-0" style="font-size: 0.95rem; line-height: 1.6;">
                                With so much tech, battery drain in stockyards is possible. Check battery health
                                voltage.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <div class="text-center mb-5">
            <span class="section-subtitle-pdi">HOW IT WORKS</span>
            <h2 class="fw-bold">Your Path to Perfection</h2>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="process-card h-100">
                    <div class="process-icon-wrapper shadow-sm">
                        <i class="fas fa-calendar-check fs-3"></i>
                    </div>
                    <h4 class="fw-bold">1. Book Inspection</h4>
                    <p class="text-muted small mb-0">Schedule a verified PDI expert visit before your car delivery date.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process-card h-100">
                    <div class="process-icon-wrapper shadow-sm">
                        <i class="fas fa-search-plus fs-3"></i>
                    </div>
                    <h4 class="fw-bold">2. Expert Verification</h4>
                    <p class="text-muted small mb-0">Our engineer performs a 500+ point check on your vehicle at the
                        stockyard.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process-card h-100">
                    <div class="process-icon-wrapper shadow-sm">
                        <i class="fas fa-file-contract fs-3"></i>
                    </div>
                    <h4 class="fw-bold">3. Detailed Report</h4>
                    <p class="text-muted small mb-0">Receive a comprehensive report highlighting any defects or issues
                        instantly.</p>
                </div>
            </div>
        </div>

        <!-- Share Modal -->
        <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 radius-theme shadow-lg">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold text-primary fs-3" id="shareModalLabel">Share Your Checklist</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <a href="https://wa.me/?text=Check out my Custom PDI Checklist: <?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"
                                    target="_blank" class="btn btn-share w-100 d-flex align-items-center justify-content-center gap-2
                                    py-3 border-0 text-white rounded-3 fw-bold"
                                    style="background-color: #25d366; font-size: 1.1rem;">
                                    <i class="fab fa-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="mailto:?subject=My PDI Checklist&body=Check out my Custom PDI Checklist: <?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"
                                    class="btn btn-share w-100 d-flex align-items-center justify-content-center gap-2
                                    py-3 border-0 text-white rounded-3 fw-bold"
                                    style="background-color: #6c757d; font-size: 1.1rem;">
                                    <i class="fas fa-envelope"></i> Email
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode("https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>"
                                    target="_blank" class="btn btn-share w-100 d-flex align-items-center justify-content-center gap-2
                                    py-3 border-0 text-white rounded-3 fw-bold"
                                    style="background-color: #3b5998; font-size: 1.1rem;">
                                    <i class="fab fa-facebook-f"></i> Facebook
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="https://twitter.com/intent/tweet?text=Check out my Custom PDI Checklist&url=<?php echo urlencode("https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>"
                                    target="_blank" class="btn btn-share w-100 d-flex align-items-center justify-content-center gap-2
                                    py-3 border-0 text-white rounded-3 fw-bold"
                                    style="background-color: #1da1f2; font-size: 1.1rem;">
                                    <i class="fab fa-twitter"></i> Twitter
                                </a>
                            </div>
                        </div>

                        <div class="input-group mb-2 custom-copy-group">
                            <input type="text" class="form-control border-end-0 py-2" id="shareUrlInput"
                                value="<?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"
                                readonly>
                            <button class="btn btn-primary px-4 fw-bold" type="button" id="copyBtn">Copy Link</button>
                        </div>
                        <div id="copySuccess" class="text-success small fw-bold"
                            style="display: none; text-align: right;">
                            Copied to clipboard!</div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const copyBtn = document.getElementById('copyBtn');
                const shareUrlInput = document.getElementById('shareUrlInput');
                const copySuccess = document.getElementById('copySuccess');

                if (copyBtn) {
                    copyBtn.addEventListener('click', function () {
                        shareUrlInput.select();
                        shareUrlInput.setSelectionRange(0, 99999); // For mobile devices

                        navigator.clipboard.writeText(shareUrlInput.value).then(() => {
                            const originalText = copyBtn.innerText;
                            copyBtn.innerText = 'Copied!';
                            copyBtn.classList.remove('btn-primary');
                            copyBtn.classList.add('btn-success');
                            copySuccess.style.display = 'block';

                            setTimeout(() => {
                                copyBtn.innerText = originalText;
                                copyBtn.classList.remove('btn-success');
                                copyBtn.classList.add('btn-primary');
                                copySuccess.style.display = 'none';
                            }, 2000);
                        });
                    });
                }
            });

            // Function to toggle checklist item state
            function toggleChecklistItem(element) {
                element.classList.toggle('is-checked');
            }
        </script>

    </div>
</div>


<?php include 'include/footer.php'; ?>