<!-- Footer -->
<footer>
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
                <a href="about.php">About Us</a>
                <a href="blog/car-news/">Official Blog</a>
                <a href="hire-expert.php">Contact Us</a>
                <a href="#">Terms of Service</a>
            </div>
            <div class="footer-col col">
                <h4>Popular Brands</h4>
                <a href="models.php?brand=maruti-suzuki">Maruti Suzuki</a>
                <a href="models.php?brand=hyundai">Hyundai</a>
                <a href="models.php?brand=tata-motors">Tata Motors</a>
                <a href="models.php?brand=mahindra">Mahindra</a>
            </div>
            <div class="footer-col col">
                <h4>Newsletter</h4>
                <p class="fs-6 footer-note">Get car tips & updates.</p>
                <input type="email" class="email-input footer-input-custom" placeholder="Enter Email"
                    aria-label="Email Address for Newsletter">
                <button class="btn-pdi btn-pdi-accent w-100">Subscribe</button>
            </div>
        </div>
    </div>
    <div class="copyright">
        &copy; 2026 PDICars.com. All Rights Reserved.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
<script src="assets/js/custom.js"></script>

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