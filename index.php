<?php
include 'include/header.php';
include 'include/carData.php';
?>

<!-- Hero -->
<section class="hero text-white">
    <div class="container">
        <h1 class="display-5 text-white">Ultimate Car PDI Checklist Tool</h1>
        <p class="text-white">Ensure a perfect delivery. Verify electronics, paint, and engine fluids before you sign
            the papers. Don't
            accept your new car without checking it first!</p>
        <a href="#select-brand" class="btn-pdi btn-pdi-accent">Start My Inspection</a>
    </div>
</section>

<!-- Brands Grid -->
<div class="container section-padding" id="select-brand">
    <div class="section-title text-center mb-5">
        <span class="section-subtitle-pdi">The Selection</span>
        <h2 class="fw-bold">Select Your <span class="text-accent">Manufacturer</span> </h2>
        <p class="">1. Choose your car brand to get a tailored checklist.</p>
    </div>
    <!-- Top Row (7 Brands) -->
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-2 g-md-4 justify-content-center mb-4">
        <?php foreach ($carData as $brandName => $brandDetails): ?>
            <div class="col">
                <a href="<?php echo $base_url . urlencode(strtolower(str_replace(' ', '-', $brandName))); ?>"
                    class="text-decoration-none text-dark">
                    <div class="brand-card">
                        <div class="brand-logo-placeholder">
                            <img src="<?php echo $base_url . $brandDetails['logo']; ?>" alt="<?php echo $brandName; ?>"
                                class="img-fluid brand-logo-round" loading="lazy" width="75" height="75">
                        </div>
                        <div class="brand-name"><?php echo $brandName; ?></div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Expert Banner -->
<div class="container">
    <div class="expert-banner px-4 py-5 p-md-5">
        <div class="row align-items-center">
            <div class="col-lg-8 text-center text-lg-start mb-4 mb-lg-0">
                <h2 class="fw-bold mb-3 expert-banner-title text-white">Find Your Nearest PDI Expert</h2>
                <p class="mb-0 fs-5 text-white">Connect with certified professionals to assist
                    with your Pre-Delivery Inspection.</p>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <a href="<?php echo $base_url; ?>hire-expert" class="btn-pdi btn-pdi-accent">Find Expert Near Me
                    &rarr;</a>
            </div>
        </div>
    </div>
</div>

<!-- Educational Content (Grid Layout) -->
<div class="container section-padding">
    <div class="section-title">
        <span class="section-subtitle-pdi">The Essentials</span>
        <h2 class="fw-bold">Why PDI is <span class="text-accent">Crucial</span></h2>
        <p>Understanding the basics before you buy.</p>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 text-start">
        <!-- What is PDI -->
        <div class="col">
            <div class="info-card h-100">
                <h3 class="h5 fw-bold mb-3">🔍 What is PDI?</h3>
                <p>A systematic examination of a new car conducted at the dealership before it's handed over. The goal
                    is to
                    confirm the vehicle is defect-free from manufacturing or transit issues.</p>
                <p><strong>Crucial because:</strong> Once registered, minor imperfections like paint chips or misaligned
                    panels often go unnoticed without proper checks.</p>
            </div>
        </div>

        <!-- Common Issues -->
        <div class="col">
            <div class="info-card h-100">
                <h3 class="h5 fw-bold mb-3">⚠️ Common Issues Found</h3>
                <ul class="ps-3 mb-0">
                    <li><strong>Exterior:</strong> Minor paint scratches, swirl marks, uneven panel gaps.</li>
                    <li><strong>Interior:</strong> Non-functional switches, loose upholstery.</li>
                    <li><strong>Mechanical:</strong> Incorrect tire pressure, low fluids, battery misalignment.</li>
                    <li><strong>Missing:</strong> Floor mats, toolkits, or spare tires.</li>
                    <li><strong>Docs:</strong> Incorrect paperwork or insurance errors.</li>
                </ul>
            </div>
        </div>

        <!-- Legal Rights -->
        <div class="col">
            <div class="info-card h-100">
                <h3 class="h5 fw-bold mb-3">⚖️ Your Legal Rights</h3>
                <p>As a consumer in India, you have rights during the process:</p>
                <ul class="ps-3 mb-0">
                    <li><strong>Right to Reject:</strong> If significant defects are found.</li>
                    <li><strong>Right to Repairs:</strong> Minor issues must be fixed before delivery.</li>
                    <li><strong>Documentation:</strong> Ensure all paperwork matches the vehicle (VIN/Chassis).</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- How to Use / Steps -->
<div class="container">
    <div class="steps-container">
        <div class="section-title text-center mb-5">
            <span class="section-subtitle-pdi">Process</span>
            <h2 class="fw-bold">How to Use Our <span class="text-accent">Tool</span></h2>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <div class="col mb-4 mb-md-0">
                <div class="step-box h-100">
                    <h4>Select Brand</h4>
                    <p>Choose from top Indian car brands like Maruti, Tata, or Hyundai.</p>
                </div>
            </div>
            <div class="col mb-4 mb-md-0">
                <div class="step-box h-100">
                    <h4>Choose Model</h4>
                    <p>Pick your specific model (e.g., Baleno, Harrier) for a custom list.</p>
                </div>
            </div>
            <div class="col mb-4 mb-md-0">
                <div class="step-box h-100">
                    <h4>Generate PDF</h4>
                    <p>Receive a detailed, printable checklist covering all points.</p>
                </div>
            </div>
            <div class="col">
                <div class="step-box h-100">
                    <h4>Inspect</h4>
                    <p>Follow the checklist digitally or on paper during your visit.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION: The Unseen Dangers (Gallery) -->
<div class="gallery-section section-padding">
    <div class="container container-custom">
        <div class="section-title text-center mb-5">
            <h2 class="fw-bold text-white">Don't Let These <span class="text-accent">Slip By</span></h2>
            <p class="text-white">Common defects our users catch during PDI.</p>
        </div>
        <div class="gallery-grid">
            <!-- Card 1 -->
            <div class="gallery-card">
                <img src="https://images.unsplash.com/photo-1600661653561-629509216228?q=80&w=600&auto=format&fit=crop"
                    class="gallery-img" alt="Micro Scratches" loading="lazy" width="600" height="400">
                <div class="gallery-overlay">
                    <div class="overlay-content">
                        <h4>Micro Scratches</h4>
                        <p>Often invisible under showroom lights.</p>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="gallery-card">
                <img src="https://images.unsplash.com/photo-1549399542-7e3f8b79c341?q=80&w=600&auto=format&fit=crop"
                    class="gallery-img" alt="Interior Gaps" loading="lazy" width="600" height="400">
                <div class="gallery-overlay">
                    <div class="overlay-content">
                        <h4>Interior Gaps</h4>
                        <p>Loose panels and rattling dashboards.</p>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="gallery-card">
                <img src="https://images.unsplash.com/photo-1487754180451-c456f719a1fc?q=80&w=600&auto=format&fit=crop"
                    class="gallery-img" alt="Rust Issues" loading="lazy" width="600" height="400">
                <div class="gallery-overlay">
                    <div class="overlay-content">
                        <h4>Rust Issues</h4>
                        <p>Common in cars stored in open yards.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION: Aesthetic Focus (New Layout) -->
<section class="image-layout-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 order-lg-1">
                <h2 class="layout-heading">Your Luxury Car <br> deserve <span class="text-accent-theme">Perfect
                        Finish</span></h2>
                <p class="layout-subtext">A new car should look like it just rolled off the designer's sketchpad. We
                    help you spot the tiniest imperfections before you sign.</p>

                <ul class="layout-checkmark-list">
                    <li><i class="fas fa-check-circle"></i> Precision Paint Quality Check</li>
                    <li><i class="fas fa-check-circle"></i> Mirror-Like Body Reflection</li>
                    <li><i class="fas fa-check-circle"></i> Zero Transit Scratch Policy</li>
                    <li><i class="fas fa-check-circle"></i> Interior Upholstery Perfection</li>
                </ul>

                <a href="#select-brand" class="btn-pdi btn-pdi-primary">Check Aesthetics Now <i
                        class="fas fa-arrow-right ms-2"></i></a>
            </div>
            <div class="col-lg-6 order-lg-2 text-center">
                <div class="layout-img-wrapper accent-bg-glow">
                    <img src="https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?q=80&w=800&auto=format&fit=crop"
                        alt="Paint Finish" class="img-fluid rounded-4" loading="lazy" width="800" height="533">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: Technical Focus (New Layout) -->
<section class="image-layout-section section-padding bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 order-lg-2">
                <h2 class="layout-heading">Master Every Bit of <br> <span class="text-accent-theme">Technical
                        Precision</span></h2>
                <p class="layout-subtext">Modern cars are computers on wheels. We ensure every sensor, fluid, and
                    circuit is performing at its peak for your safety.</p>

                <ul class="layout-checkmark-list accent-checks">
                    <li><i class="fas fa-check-circle"></i> Smart-Tech Dashboard Diagnostics</li>
                    <li><i class="fas fa-check-circle"></i> ADAS & Safety Sensor Validation</li>
                    <li><i class="fas fa-check-circle"></i> Core Engine Performance Check</li>
                    <li><i class="fas fa-check-circle"></i> Vital Fluids & Battery Health</li>
                </ul>

                <a href="#select-brand" class="btn-pdi btn-pdi-primary">Validate Tech Specs <i
                        class="fas fa-arrow-right ms-2"></i></a>
            </div>
            <div class="col-lg-6 order-lg-1 text-center">
                <div class="layout-img-wrapper accent-bg-glow">
                    <img src="https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?q=80&w=800&auto=format&fit=crop"
                        alt="Engine Tech" class="img-fluid rounded-4" loading="lazy" width="800" height="533">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Brand Specific Tips -->
<div class="container section-padding">
    <div class="section-title">
        <h2 class="fw-bold">Brand-Specific <span class="text-accent">Considerations</span></h2>
    </div>
    <div class="row g-4 mt-2">
        <div class="col-md-6">
            <div class="tip-card h-100">
                <h4 class="fw-bold h5">Maruti Suzuki / Nexa</h4>
                <p class="mb-0">High-volume production can lead to minor quality control issues. Check paint finish,
                    panel alignment, and
                    accessories specifically.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tip-card h-100">
                <h4 class="fw-bold h5">Hyundai / Kia</h4>
                <p class="mb-0">Feature-rich cars. Test all tech components: touchscreen infotainment, parking sensors,
                    and sunroof
                    functionality thoroughly.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tip-card h-100">
                <h4 class="fw-bold h5">Tata Motors / Mahindra</h4>
                <p class="mb-0">Rugged Indian roads. Requires thorough underbody checks for coating and suspension
                    integrity. Check
                    rubber seals.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tip-card h-100">
                <h4 class="fw-bold h5">Luxury (BMW, Mercedes)</h4>
                <p class="mb-0">Verify imported features like adaptive cruise control. Check for transit damage on CBU
                    models.</p>
            </div>
        </div>
    </div>
</div>



<!-- FAQ -->
<div class="container section-padding">
    <div class="section-title text-center mb-5">
        <h2 class="fw-bold">Frequently Asked <span class="text-accent">Questions</span></h2>
    </div>
    <div class="row g-4 justify-content-center">
        <!-- Column 1 -->
        <div class="col-md-6">
            <div class="accordion custom-accordion" id="faqAccordion1">
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is a PDI Inspection?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                            A final check of the car's condition before delivery to ensure no defects exist.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How much does an expert charge?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                            Typically ₹1,000 to ₹5,000 depending on the car segment and location.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Can I bring my own mechanic?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                            Yes, you are allowed to bring a trusted mechanic for the inspection.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            What documents should I check?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                            Verify the Form 22, insurance papers, invoice, and warranty card details.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 2 -->
        <div class="col-md-6">
            <div class="accordion custom-accordion" id="faqAccordion2">
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                            Can I reject the car if issues are found?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive"
                        data-bs-parent="#faqAccordion2">
                        <div class="accordion-body">
                            Yes, until you sign the final papers, you can demand a different vehicle or repairs.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            When should a PDI be done?
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                        data-bs-parent="#faqAccordion2">
                        <div class="accordion-body">
                            Ideally in broad daylight at the dealer stockyard before registration.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            How long does a PDI take?
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                        data-bs-parent="#faqAccordion2">
                        <div class="accordion-body">
                            A thorough inspection usually takes between 45 minutes to an hour.
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="headingEight">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            Is PDI mandatory for new cars?
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                        data-bs-parent="#faqAccordion2">
                        <div class="accordion-body">
                            It is not legally mandatory but highly recommended to avoid future issues.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'include/footer.php'; ?>