<?php
include 'include/header.php';

$brand_param = isset($_GET['brand']) ? strtolower($_GET['brand']) : '';
$model_param = isset($_GET['model']) ? strtolower($_GET['model']) : '';
$city = isset($_GET['city']) ? ucwords(str_replace('-', ' ', $_GET['city'])) : 'your city';

$brand = 'Brand Not Found';
$model = 'Model Not Found';
$model_features = [];

include 'include/carData.php';

// 1. Find Brand (Same logic as models.php)
$brand_data = null;
foreach ($carData as $key => $data) {
    if (strtolower(str_replace(' ', '-', $key)) === $brand_param) {
        $brand = $key;
        $brand_data = $data;
        break;
    }
}

// 2. Find Model
if ($brand_data && isset($brand_data['models'])) {
    foreach ($brand_data['models'] as $key => $details) {
        if (strtolower(str_replace(' ', '-', $key)) === $model_param) {
            $model = $key;
            // Get features directly inside this loop
            if (isset($details['features'])) {
                $model_features = $details['features'];
            }
            break;
        }
    }
}

// 3a. Load Checklist Data (JSON)
$checklist_categories = [];
$checklist_json_file = 'assets/data/checklist_data.json';

if (file_exists($checklist_json_file)) {
    $checklist_json_content = file_get_contents($checklist_json_file);
    $all_checklist_data = json_decode($checklist_json_content, true);

    if ($all_checklist_data) {
        // 1. Check for specific model data
        $brand_spaced = str_replace('-', ' ', $brand);

        if (isset($all_checklist_data['brands'][$brand]['models'][$model])) {
            $checklist_categories = $all_checklist_data['brands'][$brand]['models'][$model];
        } elseif (isset($all_checklist_data['brands'][$brand_spaced]['models'][$model])) {
            $checklist_categories = $all_checklist_data['brands'][$brand_spaced]['models'][$model];
        }
        // 2. Check for brand default
        elseif (isset($all_checklist_data['brands'][$brand]['default'])) {
            $checklist_categories = $all_checklist_data['brands'][$brand]['default'];
        } elseif (isset($all_checklist_data['brands'][$brand_spaced]['default'])) {
            $checklist_categories = $all_checklist_data['brands'][$brand_spaced]['default'];
        }
        // 3. Global default fallback
        elseif (isset($all_checklist_data['default'])) {
            $checklist_categories = $all_checklist_data['default'];
        }
    }
}

// Combine with model features
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
        } else {
            // Try replacing hyphens with spaces (e.g., 'Maruti-Suzuki' -> 'Maruti Suzuki')
            $brand_spaced = str_replace('-', ' ', $brand);
            if (isset($all_brand_content['brands'][$brand_spaced])) {
                $content_data = $all_brand_content['brands'][$brand_spaced];
            } elseif (isset($all_brand_content['default'])) {
                $content_data = $all_brand_content['default'];
            }
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
        <p class="hero-desc text-muted mx-auto hero-desc-custom">
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
        <div class="d-flex flex-wrap align-items-center gap-3 mt-4 border-bottom pb-4">

            <button class="btn-pdi btn-pdi-accent" id="downloadPdfBtn">
                <i class="fas fa-file-pdf"></i> Download PDF
            </button>
            <button class="btn-pdi btn-pdi-primary" data-bs-toggle="modal" data-bs-target="#shareModal">
                <i class="fas fa-share-nodes"></i> Share
            </button>
            <a href="<?php echo $base_url . urlencode($brand_param); ?>" class="btn-pdi btn-pdi-outline ms-auto">
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
<section>
    <div class="container">
        <div class="row justify-content-center pt-4">
            <div class="col-lg-12 mb-5">

                <!-- A. Why PDI Matters -->
                <div class="premium-section-spacer mb-5">
                    <div class="text-center mb-5">
                        <span class="section-subtitle-pdi">Vital Checks</span>
                        <h2 class="fw-bold mt-2 section-title-large">Why <span
                                class="text-dark"><?php echo $brand; ?></span> PDI Matters</h2>
                    </div>

                    <div class="row g-4 justify-content-center">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm p-4 card-hover-premium card-rounded-white">
                                <div
                                    class="d-inline-flex align-items-center justify-content-center mb-4 icon-circle-bg">
                                    <i class="fas fa-check text-accent fs-5"></i>
                                </div>
                                <h4 class="fw-bold mb-3 card-title-dark">Internet Inside</h4>
                                <p class="text-muted mb-0 card-text-small">
                                    The i-SMART system is the car's brain. Verify voice commands and Hello MG
                                    responsiveness.
                                </p>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm p-4 card-hover-premium card-rounded-white mb-3">
                                <div
                                    class="d-inline-flex align-items-center justify-content-center mb-4 icon-circle-bg">
                                    <i class="fas fa-check text-accent fs-5"></i>
                                </div>
                                <h4 class="fw-bold mb-3 card-title-dark">Fit/Finish checks</h4>
                                <p class="text-muted mb-0 card-text-small">
                                    Heavily accessorized models need checks for loose exterior chrome or badge
                                    alignment.
                                </p>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm p-4 card-hover-premium card-rounded-white">
                                <div
                                    class="d-inline-flex align-items-center justify-content-center mb-4 icon-circle-bg">
                                    <i class="fas fa-check text-accent fs-5"></i>
                                </div>
                                <h4 class="fw-bold mb-3 card-title-dark">Battery Discharge</h4>
                                <p class="text-muted mb-0 card-text-small">
                                    With so much tech, battery drain in stockyards is possible. Check battery health
                                    voltage.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- 8. FINAL CTA (Fixed Dark Mode) -->
<section class="section-padding position-relative overflow-hidden cta-dark-mode-fixed" id="book-form">
    <div class="container position-relative z-2">
        <div class="row align-items-center g-5">
            <!-- Text Content -->
            <div class="col-lg-7 text-center text-lg-start">
                <div class="d-inline-flex align-items-center gap-2 mb-4">
                    <span class="badge bg-accent text-white py-2 px-3 rounded-pill fw-bold">HIGH DEMAND</span>
                    <span class="text-white text-uppercase fw-bold">15+ Bookings in
                        <?php echo $city; ?> today
                    </span>
                </div>

                <h2 class="display-6 fw-bold text-white mb-4">
                    Don't Risk It. <br>
                    <span class="text-accent">Verify It.</span>
                </h2>

                <p class="text-white mb-5">
                    Get the most detailed 500+ point car inspection report in
                    <strong>
                        <?php echo $city; ?>
                    </strong>.
                    Uncover hidden repaints, meter tampering, and engine faults before you pay.
                </p>

                <div class="d-flex flex-wrap gap-4 justify-content-center justify-content-lg-start">
                    <div class="d-flex align-items-center gap-3 text-white">
                        <div
                            class="icon-box-sm bg-accent rounded-circle text-white shadow-lg d-flex align-items-center justify-content-center cta-icon-box">
                            <i class="fas fa-shield-alt fs-5"></i>
                        </div>
                        <div class="text-start">
                            <h6 class="fw-bold mb-0 text-white">Risk-Free</h6>
                            <small class="text-white-50">Money back guarantee</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 text-white">
                        <div
                            class="icon-box-sm bg-success rounded-circle text-white shadow-lg d-flex align-items-center justify-content-center cta-icon-box">
                            <i class="fas fa-bolt fs-5"></i>
                        </div>
                        <div class="text-start">
                            <h6 class="fw-bold mb-0 text-white">Fast Service</h6>
                            <small class="text-white-50">Same day report</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lead Form -->
            <div class="col-lg-5">
                <div class="bg-white p-4 p-md-5 rounded-5 position-relative">
                    <div class="text-center mb-4 pt-2">
                        <h3 class="fw-bold text-dark mb-1">Get Instant Callback</h3>
                        <p class="text-secondary small mb-0">Our expert engineer will call you shortly.</p>
                    </div>

                    <form id="checklistForm" onsubmit="submitToSheet(event, 'ChecklistLead')">
                        <div class="mb-3">
                            <label class="small text-secondary fw-bold ms-3 mb-1 cta-form-label">YOUR NAME</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 text-accent rounded-start-pill ps-3"><i
                                        class="fas fa-user"></i></span>
                                <input type="text" name="name"
                                    class="form-control bg-light border-0 text-dark fw-medium rounded-end-pill py-3 cta-form-input-shadow-none"
                                    placeholder="e.g. Rahul Sharma" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="small text-secondary fw-bold ms-3 mb-1 cta-form-label">PHONE NUMBER</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 text-accent rounded-start-pill ps-3"><i
                                        class="fas fa-phone-alt"></i></span>
                                <input type="tel" name="phone"
                                    class="form-control bg-light border-0 text-dark fw-medium rounded-end-pill py-3 cta-form-input-shadow-none"
                                    placeholder="+91 99999 99999" pattern="\d{10}" maxlength="10" minlength="10"
                                    title="Please enter exactly 10 digits" required>
                            </div>
                        </div>

                        <button type="submit"
                            class="btn w-100 rounded-pill fw-bold shadow-lg hover-scale py-3 text-uppercase text-white ls-1 mb-4 cta-submit-btn-gradient">
                            Check Availability <i class="fas fa-arrow-right ms-2"></i>
                        </button>

                        <div class="text-center">
                            <p class="small text-muted mb-3">Or connect instantly via</p>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="https://wa.me/919999999999"
                                    class="btn btn-outline-success rounded-circle d-flex align-items-center justify-content-center hover-fill cta-social-btn cta-social-whatsapp">
                                    <i class="fab fa-whatsapp fs-5"></i>
                                </a>
                                <a href="tel:+919999999999"
                                    class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center hover-fill cta-social-btn cta-social-phone">
                                    <i class="fas fa-phone-alt fs-5"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'include/footer.php'; ?>