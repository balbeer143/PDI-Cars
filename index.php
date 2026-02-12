<?php
include 'include/header.php';
include 'include/carData.php';
$city = isset($_GET['city']) ? ucwords(str_replace('-', ' ', $_GET['city'])) : 'your city';
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

<!-- SECTION 8: TESTIMONIALS -->
<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Happy Car Owners</h2>
        </div>

        <!-- Swiper -->
        <div class="swiper testimonialSwiper pb-5">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="testimonial-card h-100">
                        <div class="stars mb-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-muted fst-italic">"Saved me from buying a repainted Creta! The dealer denied it
                            until the PDI expert showed the paint meter reading."</p>
                        <h6 class="fw-bold mt-3">- Rahul S., Mumbai</h6>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="testimonial-card h-100">
                        <div class="stars mb-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-muted fst-italic">"Professional service. The engineer reached the showroom before
                            me and had the report ready by evening."</p>
                        <h6 class="fw-bold mt-3">- Priya K., Bangalore</h6>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="testimonial-card h-100">
                        <div class="stars mb-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="text-muted fst-italic">"Highly recommended for peace of mind. Small investment
                            compared to the price of the car."</p>
                        <h6 class="fw-bold mt-3">- Amit D., Delhi</h6>
                    </div>
                </div>
                <!-- Slide 4 -->
                <div class="swiper-slide">
                    <div class="testimonial-card h-100">
                        <div class="stars mb-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-muted fst-italic">"The report was detailed with photos. Helped me negotiate
                            getting the tires changed before delivery."</p>
                        <h6 class="fw-bold mt-3">- Vikram J., Pune</h6>
                    </div>
                </div>
                <!-- Slide 5 -->
                <div class="swiper-slide">
                    <div class="testimonial-card h-100">
                        <div class="stars mb-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-muted fst-italic">"Found a scratch on the roof that I would never have seen.
                            Worth every penny."</p>
                        <h6 class="fw-bold mt-3">- Sneha M., Hyderabad</h6>
                    </div>
                </div>
                <!-- Slide 6 -->
                <div class="swiper-slide">
                    <div class="testimonial-card h-100">
                        <div class="stars mb-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-muted fst-italic">"Excellent service. The engineer was very knowledgeable about
                            EV batteries."</p>
                        <h6 class="fw-bold mt-3">- Arjun R., Chennai</h6>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>


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

                    <form id="homeLeadForm" onsubmit="submitToSheet(event, 'HomeLead')">
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