<?php
include 'include/header.php';

// Get the brand from URL
$selected_brand_param = isset($_GET['brand']) ? strtolower($_GET['brand']) : '';
$brand_title = 'Brand Not Found';
$brand_data = null;

include 'include/carData.php';

// Case-insensitive search for brand
foreach ($carData as $key => $data) {
    if (strtolower($key) === $selected_brand_param) {
        $brand_data = $data;
        $brand_title = $key; // Keep original casing for display
        break;
    }
}
$selected_cars = [];

if ($brand_data && isset($brand_data['models'])) {
    foreach ($brand_data['models'] as $name => $details) {
        $selected_cars[] = [
            'name' => $name,
            'image' => $details['image']
        ];
    }
}

// --- NEW: Load Dynamic Content from JSON ---
$json_content = file_get_contents('assets/data/brand_content.json');
$dynamic_data = json_decode($json_content, true);

// Function to safely get content from JSON structure
function get_brand_content($section_key, $brand_title, $dynamic_data)
{
    // 1. Try exact brand match in 'brands' object
    if (isset($dynamic_data['brands'][$brand_title]) && isset($dynamic_data['brands'][$brand_title][$section_key])) {
        return $dynamic_data['brands'][$brand_title][$section_key];
    }
    // 2. Fallback to default (at root or in default object)
    if (isset($dynamic_data['default']) && isset($dynamic_data['default'][$section_key])) {
        return $dynamic_data['default'][$section_key];
    }
    return []; // Empty fallback
}

// Prefetch sections
$why_pdi_data = get_brand_content('why_pdi_matters', $brand_title, $dynamic_data);
$common_issues_data = get_brand_content('common_issues', $brand_title, $dynamic_data);
$faq_data = get_brand_content('faqs', $brand_title, $dynamic_data); // Updated key to 'faqs'

// Fetch Bio (String)
$brand_bio = "Experience a new standard of car buying with our data-driven PDI methodology, ensuring every <span class='text-accent'>$brand_title</span> is delivered in showroom condition.";
if (isset($dynamic_data['brands'][$brand_title]) && isset($dynamic_data['brands'][$brand_title]['brand_info'])) {
    $brand_bio = $dynamic_data['brands'][$brand_title]['brand_info'];
} elseif (isset($dynamic_data['default']['brand_info'])) {
    $brand_bio = $dynamic_data['default']['brand_info'];
} elseif (isset($dynamic_data['default']['hero_section_title'])) { // Fallback to hero_section_title if brand_info missing
    $brand_bio = $dynamic_data['default']['hero_section_title'];
}

?>

<!-- New Section 1: Premium Experience Header -->
<div class="container mt-5">
    <div class="section-glass text-center">
        <span class="section-subtitle-pdi">Premium Portal</span>
        <h1 class="display-5 fw-bold mb-3">Your Journey to <span class="text-accent"><?php echo $brand_title; ?></span>
            Perfection</h1>
        <p class="mx-auto" style="max-width: 700px;"><?php echo $brand_bio; ?></p>
    </div>
</div>

<div class="container section-padding">
    <!-- Header with Back Button -->
    <div
        class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 mb-md-5 text-center text-md-start">
        <div class="mb-3 mb-md-0">
            <h2 class="fw-bold">2. Select Model</h2>
            <p class="text-muted mb-0">Choose your <span class="text-accent"><?php echo $brand_title; ?></span> model to
                generate a checklist.</p>
        </div>
        <a href="index.php" class="btn-pdi btn-pdi-outline m-auto me-lg-0">&larr; Back to Brands</a>
    </div>

    <?php if (!empty($selected_cars)): ?>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 mb-5">
            <?php foreach ($selected_cars as $car): ?>
                <div class="col">
                    <a href="checklist.php?brand=<?php echo urlencode($selected_brand_param); ?>&model=<?php echo urlencode(strtolower($car['name'])); ?>"
                        class="text-decoration-none text-dark">
                        <div class="brand-card h-100 p-3">
                            <div class="model-img-container mb-3">
                                <img src="<?php echo $car['image']; ?>" alt="<?php echo $car['name']; ?>"
                                    class="img-fluid model-img">
                            </div>
                            <div class="brand-name fs-5"><?php echo $car['name']; ?></div>
                            <div class="text-muted fs-6"><?php echo $brand_title; ?></div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center py-5">
            <div class="display-1 text-muted mb-3">🚗</div>
            <h3 class="text-muted">No models found for <span class="text-accent"><?php echo $brand_title; ?></span>.</h3>
            <p>We are constantly updating our database.</p>
            <a href="index.php" class="btn-pdi btn-pdi-primary mt-3">Choose Another Brand</a>
        </div>
    <?php endif; ?>

    <!-- New Section 2: PDI Value Proposition -->
    <div class="row g-4 mb-5 pb-5">
        <div class="col-12 text-center mb-4">
            <h3 class="fw-bold mb-2">Why PDI Matters for <span class="text-accent"><?php echo $brand_title; ?></span>
            </h3>
            <p class="mb-0">Ensure your new <span class="text-accent">
                    <?php echo $brand_title; ?>
                </span> is in
                perfect condition before you drive
                it home.</p>
        </div>
        <?php foreach ($why_pdi_data as $card): ?>
            <div class="col-md-4">
                <div class="pdi-value-card text-center">
                    <div class="fs-1 mb-3">🛡️</div> <!-- Default Icon since JSON doesn't have it -->
                    <h5 class="fw-bold"><?php echo $card['title']; ?></h5>
                    <p class="fs-6"><?php echo $card['text']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Removed Section 3 (Brand Info) as it was redundant/empty -->

    <!-- New Section 3: Inspection Methodology -->
    <div class="methodology-section py-5 mb-5 bg-light rounded-4">
        <div class="text-center mb-5">
            <h3 class="fw-bold">How We Generate Your Checklist</h3>
            <p class="text-muted">A structured approach to ensure nothing is missed.</p>
        </div>
        <div class="timeline-container-vertical mx-auto" style="max-width: 800px;">
            <div class="timeline-row">
                <div class="timeline-spine">
                    <div class="timeline-number-circle">1</div>
                    <div class="timeline-line"></div>
                </div>
                <div class="timeline-card">
                    <h5 class="fw-bold mb-2">Brand Analysis</h5>
                    <p class="fs-6 mb-0">We scan our database for common issues specific to
                        <span class="text-accent"><?php echo $brand_title; ?></span>.
                    </p>
                </div>
            </div>
            <div class="timeline-row">
                <div class="timeline-spine">
                    <div class="timeline-number-circle">2</div>
                    <div class="timeline-line"></div>
                </div>
                <div class="timeline-card">
                    <h5 class="fw-bold mb-2">Feature Mapping</h5>
                    <p class="fs-6 mb-0">Checks are added based on the latest tech and safety features of your
                        model.</p>
                </div>
            </div>
            <div class="timeline-row">
                <div class="timeline-spine">
                    <div class="timeline-number-circle">3</div>
                    <!-- Last line can be hidden via CSS or omitted -->
                </div>
                <div class="timeline-card">
                    <h5 class="fw-bold mb-2">Checklist Generation</h5>
                    <p class="fs-6 mb-0">A dynamic, printable PDF checklist is created for your inspection day.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- New Section 4: Brand Trust Area -->
    <div class="row g-4 mb-5 align-items-center">
        <div class="col-lg-6">
            <h3 class="fw-bold">Trusted by Thousands of Owners</h3>
            <p class="text-muted">Our PDI checklists have helped over 50,000+ car buyers in India identify factory
                defects before delivery.</p>
            <div class="d-flex gap-3 mt-4">
                <div class="trust-badge">
                    <div class="h4 fw-bold mb-0">98%</div>
                    <small class="text-muted">Accuracy</small>
                </div>
                <div class="trust-badge">
                    <div class="h4 fw-bold mb-0">50k+</div>
                    <small class="text-muted">Inspections</small>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <?php
            $testimonials = [
                [
                    'name' => 'Rahul Sharma',
                    'brand' => $brand_title, // Dynamic
                    'quote' => "The PDI checklist was a lifesaver. I found a paint chip and a loose dashboard panel that the dealer fixed immediately!"
                ],
                [
                    'name' => 'Priya Kapoor',
                    'brand' => $brand_title,
                    'quote' => "I almost missed a scratch on the side mirror. Thanks to this checklist, I got it replaced before delivery."
                ],
                [
                    'name' => 'Amit Verma',
                    'brand' => $brand_title,
                    'quote' => "Highly recommended! The step-by-step guide made the inspection process so easy and stress-free."
                ]
            ];
            ?>
            <div id="testimonialCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel"
                data-bs-interval="3000">
                <div class="carousel-indicators custom-indicators">
                    <?php foreach ($testimonials as $index => $t): ?>
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="<?php echo $index; ?>"
                            class="<?php echo $index === 0 ? 'active' : ''; ?>"
                            aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                            aria-label="Slide <?php echo $index + 1; ?>"></button>
                    <?php endforeach; ?>
                </div>
                <div class="carousel-inner pb-5"> <!-- Added padding-bottom for indicators -->
                    <?php foreach ($testimonials as $index => $t): ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <div class="p-4 bg-white shadow-sm rounded-4 border mx-2">
                                <!-- Added mx-2 to prevent shadow clip -->
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-3 fs-2">⭐</div>
                                    <div>
                                        <h6 class="fw-bold mb-0"><?php echo $t['name']; ?></h6>
                                        <small class="text-muted"><span
                                                class="text-accent"><?php echo $t['brand']; ?></span> Owner</small>
                                    </div>
                                </div>
                                <p class="mb-0 italic text-muted">"<?php echo $t['quote']; ?>"</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Arrows Removed as per request -->
            </div>
        </div>
    </div>

    <!-- NEW: Common Issues Section -->
    <div class="section-title text-center mb-5">
        <h2 class="fw-bold" style="color: var(--primary);">Common <span
                class="text-accent"><?php echo $brand_title; ?></span> Issues</h2>
        <p class="text-muted">Pay extra attention to these components during your inspection.</p>
    </div>
    <div class="row g-4 mb-5">
        <?php foreach ($common_issues_data as $issue): ?>
            <div class="col-md-4">
                <div class="issue-card h-100">
                    <h4 class="h5 fw-bold mb-2"><?php echo $issue['title']; ?></h4>
                    <p class="mb-0 text-muted fs-6"><?php echo $issue['text']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- NEW: Hire Expert CTA -->
    <div class="expert-cta-section rounded-3 mb-5 p-4 p-md-5 text-center text-white">
        <h2 class="text-white fw-bold mb-3">Not Sure What to Check?</h2>
        <p class="text-white fs-5 mb-4">Hire a certified PDI expert to inspect your
            <span class="text-accent"><?php echo $brand_title; ?></span> for you.
        </p>
        <a href="hire-expert.php" class="btn-pdi btn-pdi-accent w-auto">Hire an Expert Now</a>
    </div>

    <!-- New Section 5: Extended FAQ -->
    <div class="faq-section mt-5 border-top pt-5">
        <div class="text-center mb-5">
            <h3 class="fw-bold">Frequently Asked Questions</h3>
            <p class="text-muted">Common queries about PDI for <span
                    class="text-accent"><?php echo $brand_title; ?></span> cars.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 text-start">

                <div class="accordion custom-accordion" id="brandFaqAccordion">
                    <?php
                    $faq_index = 0;
                    foreach ($faq_data as $faq):
                        $collapseId = "collapse" . $faq_index;
                        $headingId = "heading" . $faq_index;
                        ?>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="<?php echo $headingId; ?>">
                                <button class="accordion-button <?php echo $faq_index !== 0 ? 'collapsed' : ''; ?>"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapseId; ?>"
                                    aria-expanded="<?php echo $faq_index === 0 ? 'true' : 'false'; ?>"
                                    aria-controls="<?php echo $collapseId; ?>">
                                    <?php echo $faq['question']; ?>
                                </button>
                            </h2>
                            <div id="<?php echo $collapseId; ?>"
                                class="accordion-collapse collapse <?php echo $faq_index === 0 ? 'show' : ''; ?>"
                                aria-labelledby="<?php echo $headingId; ?>" data-bs-parent="#brandFaqAccordion">
                                <div class="accordion-body">
                                    <?php echo $faq['answer']; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        $faq_index++;
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>


</div><?php include 'include/footer.php'; ?>