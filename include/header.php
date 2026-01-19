<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDICARS | Ultimate Inspection Tool</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg p-0">
      <div class="container">
        <div class="logo">
          <a href="/" aria-label="Home">
            <img src="assets/images/pdicars-logo.svg" alt="carpdi Logo" width="200" height="100">
          </a>
        </div>
        <button class="navbar-toggler custom-toggler collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
          aria-label="Toggle navigation">
          <span></span>
          <span></span>
          <span></span>
        </button>

        <div class="collapse navbar-collapse main-nav" id="navbarTogglerDemo02">
          <!-- Center Navigation -->
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="https://pdicars.com">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About PDI</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog/car-news/">Cars News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog/bike-news/">Bike News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="hire-expert.php">Hire Expert 🕵️</a>
            </li>
          </ul>

          <!-- Right Side: Google Translate -->
          <div class="d-flex align-items-center">
            <div id="google_translate_element"></div>

            <!-- Custom Language Switcher UI -->
            <div class="custom-lang-switcher" id="customLangSwitcher">
              <div class="lang-btn" id="langBtn">
                <span id="currentLang">English</span>
                <span class="arrow">▼</span>
              </div>
              <div class="lang-menu">
                <div class="lang-option" data-lang="en">English</div>
                <div class="lang-option" data-lang="hi">हिंदी (Hindi)</div>
                <div class="lang-option" data-lang="bn">বাংলা (Bengali)</div>
                <div class="lang-option" data-lang="mr">मराठी (Marathi)</div>
                <div class="lang-option" data-lang="te">తెలుగు (Telugu)</div>
                <div class="lang-option" data-lang="ta">தமிழ் (Tamil)</div>
                <div class="lang-option" data-lang="gu">ગુજરાતી (Gujarati)</div>
                <div class="lang-option" data-lang="kn">ಕನ್ನಡ (Kannada)</div>
              </div>
            </div>
          </div>
        </div>

        <script type="text/javascript">
          function googleTranslateElementInit() {
            new google.translate.TranslateElement({
              pageLanguage: 'en',
              includedLanguages: 'en,hi,bn,mr,te,ta,gu,kn',
              layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
              autoDisplay: false
            }, 'google_translate_element');
          }

          // Custom Logic to sync Custom UI with Google Translate
          document.addEventListener('DOMContentLoaded', () => {
            const switcher = document.getElementById('customLangSwitcher');
            const langBtn = document.getElementById('langBtn');
            const currentLangSpan = document.getElementById('currentLang');
            const options = document.querySelectorAll('.lang-option');

            // Toggle Dropdown
            langBtn.addEventListener('click', (e) => {
              e.stopPropagation();
              switcher.classList.toggle('active');
            });

            // Close on click outside
            document.addEventListener('click', () => {
              switcher.classList.remove('active');
            });

            // Handle Language Selection
            options.forEach(option => {
              option.addEventListener('click', function () {
                const selectedLang = this.getAttribute('data-lang');
                const selectedText = this.innerText;

                // 1. Update Custom UI
                currentLangSpan.innerText = selectedText.split('(')[0].trim();
                switcher.classList.remove('active'); // Close menu

                // 2. Trigger Google Translate
                const triggerTranslation = () => {
                  const googleSelect = document.querySelector('.goog-te-combo');
                  if (googleSelect) {
                    googleSelect.value = selectedLang;
                    googleSelect.dispatchEvent(new Event('change', { bubbles: true }));
                  } else {
                    console.warn("Google Translate widget not ready, retrying...");
                    setTimeout(triggerTranslation, 500);
                  }
                };
                triggerTranslation();
              });
            });
          });
        </script>
        <script type="text/javascript"
          src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
      </div>
    </nav>
  </header>