<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <div class="footer-col col">
                <h4>PDICARS</h4>
                <p class="fs-6 text-slate-400">India's most trusted car pre-delivery inspection tool since 2023.
                    Helping
                    car
                    buyers make informed
                    decisions.</p>
            </div>
            <div class="footer-col col">
                <h4>Quick Links</h4>
                <a href="<?php echo $base_url; ?>about">About Us</a>
                <a href="<?php echo $base_url; ?>blog/car-news/">Official Blog</a>
                <a href="<?php echo $base_url; ?>hire-expert">Contact Us</a>
                <a href="#">Terms of Service</a>
            </div>
            <div class="footer-col col">
                <h4>Popular Brands</h4>
                <a href="<?php echo $base_url; ?>maruti-suzuki">Maruti Suzuki</a>
                <a href="<?php echo $base_url; ?>hyundai">Hyundai</a>
                <a href="<?php echo $base_url; ?>tata-motors">Tata Motors</a>
                <a href="<?php echo $base_url; ?>mahindra">Mahindra</a>
            </div>
            <div class="footer-col col">
                <h4>Newsletter</h4>
                <form id="newsletterForm" onsubmit="submitToSheet(event, 'Newsletter')">
                    <p class="fs-6 footer-note">Get car tips & updates.</p>
                    <input type="email" name="email" class="email-input footer-input-custom" placeholder="Enter Email"
                        aria-label="Email Address for Newsletter" required>
                    <button type="submit" class="btn-pdi btn-pdi-accent w-100">Subscribe</button>
                </form>
            </div>
        </div>

        <!-- NEW: Locations We Serve (SEO Links) -->
        <div class="row mt-5 pt-4 border-top border-secondary">
            <div class="col-12">
                <h5 class="text-white mb-3" style="font-size: 1rem;">Locations We Serve</h5>
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?php echo $base_url; ?>car-pdi-service-in-gurgaon"
                        class="text-secondary text-decoration-none small">Gurgaon</a>
                    <a href="<?php echo $base_url; ?>car-pdi-service-in-delhi"
                        class="text-secondary text-decoration-none small">Delhi</a>
                    <a href="<?php echo $base_url; ?>car-pdi-service-in-noida"
                        class="text-secondary text-decoration-none small">Noida</a>
                    <a href="<?php echo $base_url; ?>car-pdi-service-in-bangalore"
                        class="text-secondary text-decoration-none small">Bangalore</a>
                    <a href="<?php echo $base_url; ?>car-pdi-service-in-mumbai"
                        class="text-secondary text-decoration-none small">Mumbai</a>
                    <a href="<?php echo $base_url; ?>car-pdi-service-in-pune"
                        class="text-secondary text-decoration-none small">Pune</a>
                    <a href="<?php echo $base_url; ?>car-pdi-service-in-hyderabad"
                        class="text-secondary text-decoration-none small">Hyderabad</a>
                    <a href="<?php echo $base_url; ?>car-pdi-service-in-chennai"
                        class="text-secondary text-decoration-none small">Chennai</a>
                    <a href="<?php echo $base_url; ?>car-pdi-service-in-kolkata"
                        class="text-secondary text-decoration-none small">Kolkata</a>
                    <a href="<?php echo $base_url; ?>car-pdi-service-in-ahmedabad"
                        class="text-secondary text-decoration-none small">Ahmedabad</a>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright text-white">
        &copy; 2026 PDICars.com. All Rights Reserved.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
<script src="<?php echo $base_url; ?>assets/js/custom.js"></script>
<script src="<?php echo $base_url; ?>assets/js/submit-to-sheet.js"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".testimonialSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
</script>

<!-- Scroll Reveal Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const reveals = document.querySelectorAll(".reveal");

        const revealOnScroll = () => {
            const windowHeight = window.innerHeight;
            const elementVisible = 150;

            reveals.forEach((reveal) => {
                const elementTop = reveal.getBoundingClientRect().top;
                if (elementTop < windowHeight - elementVisible) {
                    reveal.classList.add("active");
                }
            });
        };

        window.addEventListener("scroll", revealOnScroll);
        // Trigger once on load
        revealOnScroll();
    });
</script>

</body>

</html>