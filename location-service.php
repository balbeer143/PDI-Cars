<?php
// Capture city from URL parameter or default to 'Gurgaon' for testing
$city = isset($_GET['city']) ? ucwords(str_replace('-', ' ', $_GET['city'])) : 'Gurgaon';
include 'include/header.php';
?>

<!-- 1. HERO SECTION -->
<section class="hero-location d-flex align-items-center position-relative overflow-hidden bg-primary">
    <div class="container position-relative z-2">
        <div class="row align-items-center">
            <div class="col-lg-7 text-center text-lg-start mb-5 mb-lg-0">
                <span
                    class="d-inline-block py-2 px-4 rounded-pill bg-white text-primary fw-bold mb-4 border border-primary">
                    <i class="fas fa-map-marker-alt me-2 text-accent"></i> Now Serving
                    <?php echo $city; ?>
                </span>
                <h1 class="display-5 text-white fw-bold mb-3">
                    Expert <span class="text-accent">Car PDI Service</span><br> in
                    <?php echo $city; ?>
                </h1>
                <p class="text-white mb-5">
                    Secure your investment with the most comprehensive <strong>Pre-Delivery Inspection in
                        <?php echo $city; ?></strong>. Our certified engineers detect manufacturing defects, repaint
                    issues, and transit damage before you sign the papers.
                </p>
                <div class="d-flex gap-3 flex-column flex-sm-row justify-content-center justify-content-lg-start">
                    <a href="#book-now" class="btn-pdi btn-pdi-accent">
                        Book <?php echo $city; ?> Inspection <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    <a href="tel:+919999999999"
                        class="btn-pdi btn-pdi-outline text-white border-white hover-bg-light text-white-force">
                        <i class="fas fa-phone-alt me-2"></i> Talk to Expert
                    </a>
                </div>
                <div
                    class="mt-5 pt-3 border-top border-white-25 d-flex gap-4 text-white fw-medium justify-content-center justify-content-lg-start">
                    <div><i class="fas fa-check-circle text-accent me-2"></i> Same Day in <?php echo $city; ?></div>
                    <div><i class="fas fa-check-circle text-accent me-2"></i> Over 500+ Checks Performed</div>
                </div>
            </div>
            <div class="col-lg-5">
                <!-- Glassmorphism Card Effect -->
                <div class="p-4 rounded-5 position-relative glass-card-hero">
                    <img src="<?php echo $base_url; ?>assets/images/pdi_hero_team.png"
                        alt="Best Car Inspection Team in <?php echo $city; ?>"
                        class="img-fluid rounded-4 shadow-lg animate-float">

                    <!-- Floating Badge -->
                    <div
                        class="position-absolute bottom-0 start-0 m-3 p-3 bg-white rounded-4 shadow-lg d-flex align-items-center gap-3 animate-slide-up badge-floating-card">
                        <div
                            class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow-md icon-box-50">
                            <i class="fas fa-shield-alt fs-4"></i>
                        </div>
                        <div class="lh-sm">
                            <div class="fw-bold text-dark fs-6">Top Rated PDI</div>
                            <small class="text-primary fw-bold">in
                                <?php echo $city; ?>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. CITY CONTEXT SECTION -->
<section class="section-padding bg-light-alt">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 order-lg-2">
                <div class="position-relative">
                    <img src="<?php echo $base_url; ?>assets/images/pdi_city_traffic.png"
                        alt="Traffic and Car Dealerships in <?php echo $city; ?>"
                        class="img-fluid rounded-4 shadow-lg position-relative z-1 border border-white border-5">
                </div>
            </div>
            <div class="col-lg-7 order-lg-1">
                <span class="section-subtitle-pdi">Local Challenges in <?php echo $city; ?></span>
                <h2 class="display-6 fw-bold mb-4 ">Why Buying a Car in <span class="text-accent">
                        <?php echo $city; ?>
                    </span> Requires a PDI?</h2>
                <p class="mb-5">
                    In a bustling city like <?php echo $city; ?>, new cars often sit in open stockyards for weeks before
                    delivery. From exposure to harsh weather in <?php echo $city; ?> to rapid transit damage on local
                    highways, your "new" car goes through a lot. Our <strong><?php echo $city; ?> based PDI
                        experts</strong> act as your shield.
                </p>
                <div class="d-flex flex-column gap-4">
                    <div class="d-flex gap-3 align-items-start">
                        <div class="flex-shrink-0">
                            <div class="icon-box-sm bg-white text-secondary fs-4 rounded-circle shadow-sm icon-box-60">
                                <i class="fas fa-industry text-accent"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="h5 fw-semibold">Yard Contamination & Dust</h4>
                            <p class="mb-0 fs-6">Stockyards in <?php echo $city; ?> deal with high
                                pollution
                                levels. We frequently detect industrial fallout, cement spots, and deep paint swirls
                                that dealership washing cannot hide.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 align-items-start">
                        <div class="flex-shrink-0">
                            <div class="icon-box-sm bg-white text-secondary fs-4 rounded-circle shadow-sm icon-box-60">
                                <i class="fas fa-truck-moving text-accent"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="h5 fw-semibold">Unseen Transit Damage</h4>
                            <p class="mb-0 fs-6">Cars delivered to <?php echo $city; ?> often travel long
                                distances on trailers. We check for underbody scrapes from unloading ramps and
                                suspension stress that often goes unnoticed.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 align-items-start">
                        <div class="flex-shrink-0">
                            <div class="icon-box-sm bg-white text-secondary fs-4 rounded-circle shadow-sm icon-box-60">
                                <i class="fas fa-exchange-alt text-accent"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="h5 fw-semibold">Part Swapping Risk</h4>
                            <p class="mb-0 fs-6">Due to high demand in <?php echo $city; ?>, some dealers
                                may
                                swap tyres or batteries with older units. Our PDI checklist specifically verifies
                                manufacturing dates of all components.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. DETAILED 500+ POINT CHECKLIST -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-subtitle-pdi">Comprehensive Coverage</span>
            <h2 class="fw-bold display-6">What We Check in <span class="text-accent"><?php echo $city; ?></span>?</h2>
            <p class="">Our 500+ point inspection covers every inch of the car. Here is a
                snapshot of our rigorous checklist designed for <?php echo $city; ?> road conditions.</p>
        </div>
        <div class="row g-4">
            <!-- Exterior -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body p-4">
                        <div class="icon-box-sm bg-primary-light text-primary rounded-circle mb-4">
                            <i class="fas fa-car-side fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Exterior & Paint</h5>
                        <ul class="list-unstyled d-grid gap-2 small text-secondary">
                            <li><i class="fas fa-check-circle text-success me-2"></i>Paint Thickness (Microns)</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Scratches, Dents & Repaints</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Panel Gaps & Alignment</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Rust & Underbody Damage</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Glass & Windshield Date</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Interior -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body p-4">
                        <div class="icon-box-sm bg-accent-soft text-accent rounded-circle mb-4">
                            <i class="fas fa-couch fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Interiors & Comfort</h5>
                        <ul class="list-unstyled d-grid gap-2 small text-secondary">
                            <li><i class="fas fa-check-circle text-success me-2"></i>Seat Stains & Tears</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Dashboard Fit & Finish</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>AC Cooling Efficiency</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Sunroof Operation</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Carpet & Roof Liner Quality</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Electrical -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body p-4">
                        <div class="icon-box-sm bg-primary-light text-primary rounded-circle mb-4">
                            <i class="fas fa-bolt fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Electricals & OBD</h5>
                        <ul class="list-unstyled d-grid gap-2 small text-secondary">
                            <li><i class="fas fa-check-circle text-success me-2"></i>Engine Fault Codes (DTC)</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Battery Voltage Health</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Lights, Horn & Wipers</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Infotainment & Speakers</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Odometer Tamper Check</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Mechanical -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body p-4">
                        <div class="icon-box-sm bg-accent-soft text-accent rounded-circle mb-4">
                            <i class="fas fa-cogs fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Engine & Test Drive</h5>
                        <ul class="list-unstyled d-grid gap-2 small text-secondary">
                            <li><i class="fas fa-check-circle text-success me-2"></i>Engine Noise & Vibration</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Fluid Leaks (Oil/Coolant)</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Brake Bite & Effectiveness</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Steering Feedback</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Suspension Noise Test</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. EDUCATIONAL / WHY NEEDED SECTION -->
<section class="section-padding bg-light-alt text-dark">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="section-subtitle-pdi">The Reality of New Cars</span>
                <h2 class="display-6 fw-bold mb-4">Why Even New Cars in <span
                        class="text-accent"><?php echo $city; ?></span> Have
                    Defenders?</h2>
                <div class="d-flex flex-column gap-4">
                    <p class="mb-0">Many buyers in <strong><?php echo $city; ?></strong> assume "New"
                        means "Perfect". Unfortunately, that is rarely the case. Between the factory and the dealership
                        in <?php echo $city; ?>, a car travels hundreds of kilometers and sits in open stockyards
                        exposed to dust, rain, and rodents.</p>

                    <div class="d-flex align-items-start gap-3">
                        <i class="fas fa-exclamation-triangle text-warning fs-3 mt-1"></i>
                        <div>
                            <h5 class="fw-bold mb-2">Transit Damage is Real</h5>
                            <p class="fs-6 text-muted mb-0">Cars are often driven recklessly from offloading points to
                                showrooms in <?php echo $city; ?>. Bumper scrapes and underbody hits are common but
                                quickly covered up.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <i class="fas fa-sync-alt text-primary fs-3 mt-1"></i>
                        <div>
                            <h5 class="fw-bold mb-2">Part Swapping Happens</h5>
                            <p class="fs-6 text-muted mb-0">Unscrupulous dealers may swap tires, batteries, or even
                                music systems with older demo cars to meet urgent delivery demands in
                                <?php echo $city; ?>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div
                    class="bg-white p-5 rounded-4 border-start border-4 border-accent position-relative overflow-hidden">
                    <div class="position-absolute top-0 end-0 opacity-10 p-3">
                        <i class="fas fa-chart-pie display-1"></i>
                    </div>
                    <h3 class="fw-bold mb-4">Our Findings in <?php echo $city; ?></h3>
                    <div class="row g-4 text-center">
                        <div class="col-6">
                            <h2 class="display-4 fw-bold text-accent mb-0">18%</h2>
                            <small class="text-uppercase fw-bold text-muted">Cars with Repaint</small>
                        </div>
                        <div class="col-6">
                            <h2 class="display-4 fw-bold text-primary mb-0">12%</h2>
                            <small class="text-uppercase fw-bold text-muted">Electrical Faults</small>
                        </div>
                        <div class="col-6">
                            <h2 class="display-4 fw-bold text-dark mb-0">8%</h2>
                            <small class="text-uppercase fw-bold text-muted">Odometer Rolled</small>
                        </div>
                        <div class="col-6">
                            <h2 class="display-4 fw-bold text-success mb-0">100%</h2>
                            <small class="text-uppercase fw-bold text-muted">Peace of Mind</small>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-top">
                        <p class="small text-muted fst-italic mb-0">*Based on last 1000 inspections conducted.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. PROCESS TIMELINE -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-subtitle-pdi">Simple Process</span>
            <h2 class="display-6 fw-bold">How It Works in <span class="text-accent"><?php echo $city; ?></span></h2>
            <p class="">Our 500+ point inspection covers every inch of the car. Here is a
                snapshot of our rigorous checklist designed for <?php echo $city; ?> road conditions.</p>
        </div>
        <div class="row g-4 position-relative">
            <div class="col-md-4">
                <div class="process-card text-center h-100">
                    <div class="process-icon-wrapper">
                        <i class="fas fa-calendar-check fs-2 text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">1. Book Inspection</h5>
                    <p class="text-muted fs-6">Schedule your PDI online or via phone. We assign a local expert engineer
                        in <?php echo $city; ?> to visit the dealership.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process-card text-center h-100">
                    <div class="process-icon-wrapper">
                        <i class="fas fa-microscope fs-2 text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">2. Detailed Check</h5>
                    <p class="text-muted fs-6">Our engineer spends 2-3 hours meticulously checking 500+ points on your
                        car using advanced tools.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process-card text-center h-100">
                    <div class="process-icon-wrapper">
                        <i class="fas fa-file-pdf fs-2 text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">3. Instant Report</h5>
                    <p class="text-muted fs-6">Get a comprehensive digital report with photos immediately after
                        inspection. Make an informed decision.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. UNIQUE FAQ SECTION -->
<section class="section-padding bg-faq-section position-relative">
    <div class="container">
        <div class="row g-5">
            <!-- Left Sticky Side -->
            <div class="col-lg-5">
                <div class="sticky-top sticky-faq-sidebar">
                    <div class="pe-lg-4">
                        <span class="section-subtitle-pdi">Support Center</span>
                        <h2 class="display-6 fw-bold mb-4">Have Questions <br>About PDI in <span
                                class="text-accent"><?php echo $city; ?>?</span></h2>
                        <p class="mb-5">
                            Buying a car is a big decision. We're here to help you make it with <span
                                class="fw-bold text-dark">confidence.</span>
                        </p>

                        <div
                            class="bg-white p-4 rounded-4 shadow-lg border border-light mb-4 position-relative overflow-hidden">
                            <div class="position-absolute top-0 end-0 p-3 opacity-10">
                                <i class="fas fa-headset fs-1 text-primary"></i>
                            </div>
                            <div class=" d-flex align-items-center gap-3">
                                <div
                                    class="bg-primary bg-opacity-10 rounded-circle p-2 d-flex align-items-center justify-content-center faq-expert-icon">
                                    <i class="fas fa-user-tie fs-3 text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Still confused?</h6>
                                    <p class="small text-muted mb-0">Talk to our senior engineer directly.</p>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <a href="tel:+919999999999"
                                    class="btn btn-outline-primary rounded-pill fw-bold py-2 hover-scale">
                                    <i class="fas fa-phone-alt me-2"></i> Call Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Accordion Side -->
            <div class="col-lg-7">
                <div class="accordion accordion-flush d-flex flex-column gap-3" id="pdiFaqUnique">
                    <!-- Item 1 -->
                    <div class="faq-card bg-white rounded-4 shadow-sm border-0 overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-4 px-4 bg-transparent shadow-none"
                                type="button" data-bs-toggle="collapse" data-bs-target="#uFaq1">
                                When is the right time to book a PDI in <?php echo $city; ?>?
                            </button>
                        </h2>
                        <div id="uFaq1" class="accordion-collapse collapse" data-bs-parent="#pdiFaqUnique">
                            <div class="accordion-body text-secondary lh-lg px-4 pb-4 pt-0">
                                <hr class="my-0 mb-3 opacity-10">
                                The best time to book is <strong>before registration</strong>. Once the car is
                                registered in your name, it becomes a "used car" legally, and rejecting it becomes
                                extremely difficult. Ask your dealer to allocate the VIN/Chassis number and confirm the
                                car is in the stockyard, then book our service.
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="faq-card bg-white rounded-4 shadow-sm border-0 overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-4 px-4 bg-transparent shadow-none"
                                type="button" data-bs-toggle="collapse" data-bs-target="#uFaq2">
                                Do dealers in <?php echo $city; ?> allow 3rd party inspection?
                            </button>
                        </h2>
                        <div id="uFaq2" class="accordion-collapse collapse" data-bs-parent="#pdiFaqUnique">
                            <div class="accordion-body text-secondary lh-lg px-4 pb-4 pt-0">
                                <hr class="my-0 mb-3 opacity-10">
                                Yes, most reputable dealers in <?php echo $city; ?> are cooperative. It is your consumer
                                right to inspect the product before paying full price. If a dealer refuses PDI, it acts
                                as a major red flag that the vehicle might have hidden issues.
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="faq-card bg-white rounded-4 shadow-sm border-0 overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-4 px-4 bg-transparent shadow-none"
                                type="button" data-bs-toggle="collapse" data-bs-target="#uFaq3">
                                What if your engineer finds a defect during inspection?
                            </button>
                        </h2>
                        <div id="uFaq3" class="accordion-collapse collapse" data-bs-parent="#pdiFaqUnique">
                            <div class="accordion-body text-secondary lh-lg px-4 pb-4 pt-0">
                                <hr class="my-0 mb-3 opacity-10">
                                If a major defect (like repainting, engine fault, or water damage) is found, we advise
                                you to <strong>reject the vehicle</strong> and ask for another unit. For minor issues
                                (like scratches or loose trims), we document them so you can force the dealer to fix
                                them before delivery.
                            </div>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="faq-card bg-white rounded-4 shadow-sm border-0 overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-4 px-4 bg-transparent shadow-none"
                                type="button" data-bs-toggle="collapse" data-bs-target="#uFaq4">
                                Does your PDI service cover used cars in <?php echo $city; ?> too?
                            </button>
                        </h2>
                        <div id="uFaq4" class="accordion-collapse collapse" data-bs-parent="#pdiFaqUnique">
                            <div class="accordion-body text-secondary lh-lg px-4 pb-4 pt-0">
                                <hr class="my-0 mb-3 opacity-10">
                                Yes, absolutely! While we specialize in new car PDI, we also provide comprehensive
                                inspection for used cars. Our checklist adjusts to check for accident history, odometer
                                tampering, and wear-and-tear components crucial for pre-owned vehicles.
                            </div>
                        </div>
                    </div>

                    <!-- Item 5 (New) -->
                    <div class="faq-card bg-white rounded-4 shadow-sm border-0 overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-4 px-4 bg-transparent shadow-none"
                                type="button" data-bs-toggle="collapse" data-bs-target="#uFaq5">
                                How long does the entire inspection process take?
                            </button>
                        </h2>
                        <div id="uFaq5" class="accordion-collapse collapse" data-bs-parent="#pdiFaqUnique">
                            <div class="accordion-body text-secondary lh-lg px-4 pb-4 pt-0">
                                <hr class="my-0 mb-3 opacity-10">
                                Our comprehensive 500+ point inspection typically takes between <strong>1.5 to 2.5
                                    hours</strong> depending on the car model and its condition. We take our time to
                                ensure no detail is missed.
                            </div>
                        </div>
                    </div>

                    <!-- Item 6 (New) -->
                    <div class="faq-card bg-white rounded-4 shadow-sm border-0 overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-4 px-4 bg-transparent shadow-none"
                                type="button" data-bs-toggle="collapse" data-bs-target="#uFaq6">
                                Do I need to be present during the inspection?
                            </button>
                        </h2>
                        <div id="uFaq6" class="accordion-collapse collapse" data-bs-parent="#pdiFaqUnique">
                            <div class="accordion-body text-secondary lh-lg px-4 pb-4 pt-0">
                                <hr class="my-0 mb-3 opacity-10">
                                Not necessarily. You can choose to be present if you wish, but many of our clients
                                prefer our <strong>Remote Inspection</strong> service. We go to the stockyard, perform
                                the check, and send you the report along with high-res photos and videos.
                            </div>
                        </div>
                    </div>

                    <!-- Item 7 (New) -->
                    <div class="faq-card bg-white rounded-4 shadow-sm border-0 overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-4 px-4 bg-transparent shadow-none"
                                type="button" data-bs-toggle="collapse" data-bs-target="#uFaq7">
                                What tools do your engineers carry?
                            </button>
                        </h2>
                        <div id="uFaq7" class="accordion-collapse collapse" data-bs-parent="#pdiFaqUnique">
                            <div class="accordion-body text-secondary lh-lg px-4 pb-4 pt-0">
                                <hr class="my-0 mb-3 opacity-10">
                                Our engineers are equipped with professional-grade tools including <strong>Paint
                                    Thickness Gauges (Coating Thickness Meters)</strong> to detect repainting, OBD-II
                                Scanners for engine diagnostics, Tyres tread depth gauges, and high-lumen inspection
                                lights.
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
    <!-- Background Decor (Fixed Position & Opacity) -->
    <div class="position-absolute pe-none cta-bg-decor">
        <svg width="500" height="500" viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="200" cy="200" r="150" stroke="#F86F03" stroke-width="30" />
        </svg>
    </div>

    <div class="container position-relative z-2">
        <div class="row align-items-center g-5">
            <!-- Text Content -->
            <div class="col-lg-7 text-center text-lg-start">
                <div class="d-inline-flex align-items-center gap-2 mb-4">
                    <span class="badge bg-accent text-white py-2 px-3 rounded-pill fw-bold">HIGH DEMAND</span>
                    <span class="text-white text-uppercase fw-bold">15+ Bookings in
                        <?php echo $city; ?> today</span>
                </div>

                <h2 class="display-6 fw-bold text-white mb-4">
                    Don't Risk It. <br>
                    <span class="text-accent">Verify It.</span>
                </h2>

                <p class="text-white mb-5">
                    Get the most detailed 500+ point car inspection report in <strong><?php echo $city; ?></strong>.
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

                    <form id="locationForm" onsubmit="submitToSheet(event, 'LocationLead')">
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