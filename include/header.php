<!DOCTYPE html>
<html lang="en">

<head>
  <!-- SEO & Metadata -->
  <?php include __DIR__ . '/meta-data.php'; ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars(isset($title) ? $title : 'PDICARS | Ultimate Inspection Tool'); ?></title>
  <meta name="description"
    content="<?php echo htmlspecialchars(isset($description) ? $description : 'PDICARS - Professional Pre-Delivery Inspection (PDI) Service.'); ?>">
  <meta name="keywords" content="<?php echo htmlspecialchars(isset($keywords) ? $keywords : ''); ?>">
  <meta name="theme-color" content="#1e3a8a">
  <link rel="canonical"
    href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>">
  <link rel="icon" type="image/png" href="<?php echo $base_url; ?>assets/images/fevicon.png">

  <!-- Performance Hints -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://cdn.jsdelivr.net">
  <link rel="preconnect" href="https://cdnjs.cloudflare.com">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg p-0">
      <div class="container">
        <div class="logo">
          <a class="navbar-brand" href="<?php echo $base_url; ?>" aria-label="Home">
            <img src="<?php echo $base_url; ?>assets/images/pdicars-logo.svg" alt="carpdi Logo" width="200" height="50"
              class="img-fluid">
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
          <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?php echo ($currentPage == 'index.php' || $currentPage == '') ? 'active' : ''; ?>"
                aria-current="page" href="<?php echo $base_url; ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo ($currentPage == 'about.php') ? 'active' : ''; ?>"
                href="<?php echo $base_url; ?>about">About
                PDI</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], 'blog/car-news') !== false) ? 'active' : ''; ?>"
                href="<?php echo $base_url; ?>blog/car-news/">Cars News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], 'blog/bike-news') !== false) ? 'active' : ''; ?>"
                href="<?php echo $base_url; ?>blog/bike-news/">Bike News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo ($currentPage == 'hire-expert.php') ? 'active' : ''; ?>"
                href="<?php echo $base_url; ?>hire-expert">Hire Expert 🕵️</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <div id="google_translate_element" class="d-none-check"></div>
            <div class="language-switcher notranslate" translate="no">
              <!-- Hidden native select for functionality -->
              <select id="language-selector" class="form-select form-select-sm d-none-check"
                aria-label="Language Selector">
                <option value="en">English</option>
                <option value="hi">हिंदी (Hindi)</option>
                <option value="bn">বাংলা (Bengali)</option>
                <option value="mr">मराठी (Marathi)</option>
                <option value="te">తెలుగు (Telugu)</option>
                <option value="ta">தமிழ் (Tamil)</option>
                <option value="gu">ગુજરાતી (Gujarati)</option>
                <option value="kn">ಕನ್ನಡ (Kannada)</option>
              </select>

              <!-- Custom UI -->
              <div class="custom-lang-switcher" id="custom-lang-switcher">
                <div class="lang-btn" id="lang-btn">
                  <span id="current-lang">English</span>
                  <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="lang-menu">
                  <span class="lang-option" data-value="en">English</span>
                  <span class="lang-option" data-value="hi">हिंदी (Hindi)</span>
                  <span class="lang-option" data-value="bn">বাংলা (Bengali)</span>
                  <span class="lang-option" data-value="mr">मराठी (Marathi)</span>
                  <span class="lang-option" data-value="te">తెలుగు (Telugu)</span>
                  <span class="lang-option" data-value="ta">தமிழ் (Tamil)</span>
                  <span class="lang-option" data-value="gu">ગુજરાતી (Gujarati)</span>
                  <span class="lang-option" data-value="kn">ಕನ್ನಡ (Kannada)</span>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </nav>
  </header>

  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'en,hi,bn,mr,te,ta,gu,kn',
        autoDisplay: false
      }, 'google_translate_element');
    }
  </script>

  <script type="text/javascript" defer
    src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const langSelector = document.getElementById('language-selector');
      const customSwitcher = document.getElementById('custom-lang-switcher');
      const langBtn = document.getElementById('lang-btn');
      const currentLangSpan = document.getElementById('current-lang');
      const langOptions = document.querySelectorAll('.lang-option');

      // Check if elements exist to prevent console errors
      if (langBtn && customSwitcher && langSelector) {
        // Toggle Dropdown
        langBtn.addEventListener('click', (e) => {
          e.stopPropagation();
          customSwitcher.classList.toggle('active');
          const icon = langBtn.querySelector('i');
          if (icon) {
            icon.style.transform = customSwitcher.classList.contains('active') ? 'rotate(180deg)' : 'rotate(0deg)';
          }
        });

        // Close on outside click
        document.addEventListener('click', () => {
          customSwitcher.classList.remove('active');
          const icon = langBtn.querySelector('i');
          if (icon) {
            icon.style.transform = 'rotate(0deg)';
          }
        });

        // Handle Option Click
        langOptions.forEach(option => {
          option.addEventListener('click', function () {
            const value = this.getAttribute('data-value');
            const text = this.textContent;

            // Update UI
            if (currentLangSpan) currentLangSpan.textContent = text;
            customSwitcher.classList.remove('active');
            const icon = langBtn.querySelector('i');
            if (icon) {
              icon.style.transform = 'rotate(0deg)';
            }

            // Update Native Select
            langSelector.value = value;
            langSelector.dispatchEvent(new Event('change'));
          });
        });

        // Sync with Google Translate
        langSelector.addEventListener('change', function () {
          const lang = this.value;
          const googleCombo = document.querySelector('select.goog-te-combo');
          if (googleCombo) {
            googleCombo.value = lang;
            googleCombo.dispatchEvent(new Event('change'));
          }
        });
      }
    });
  </script>
  <?php // External CSS in style.css handles Google Translate cleanup ?>