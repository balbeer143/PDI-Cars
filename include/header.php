<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="PDICARS - Professional Pre-Delivery Inspection (PDI) Service. Don't buy a new car without a PDI Expert. Get a comprehensive 200-point inspection report.">
  <meta name="theme-color" content="#1e3a8a">
  <title>PDICARS | Ultimate Inspection Tool</title>

  <!-- Performance Hints -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://cdn.jsdelivr.net">
  <link rel="preconnect" href="https://cdnjs.cloudflare.com">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <div class="logo">
          <a class="navbar-brand" href="#" aria-label="Home">
            <img src="assets/images/pdicars-logo.svg" alt="carpdi Logo" width="200" height="auto" class="img-fluid">
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
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
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
          <form class="d-flex" role="search">
            <div id="google_translate_element" style="display:none"></div>
            <div class="language-switcher notranslate" translate="no">
              <select id="language-selector" class="form-select form-select-sm lang-select">
                <option value="en">English</option>
                <option value="hi">हिंदी (Hindi)</option>
                <option value="bn">বাংলা (Bengali)</option>
                <option value="mr">मराठी (Marathi)</option>
                <option value="te">తెలుగు (Telugu)</option>
                <option value="ta">தமிழ் (Tamil)</option>
                <option value="gu">ગુજરાતી (Gujarati)</option>
                <option value="kn">ಕನ್ನಡ (Kannada)</option>
              </select>
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

  <script type="text/javascript"
    src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const langSelector = document.getElementById('language-selector');

      // Sync with Google Translate
      langSelector.addEventListener('change', function () {
        const lang = this.value;
        const googleCombo = document.querySelector('select.goog-te-combo');
        if (googleCombo) {
          googleCombo.value = lang;
          googleCombo.dispatchEvent(new Event('change'));
        }
      });
    });
  </script>

  </script>
  <?php // External CSS in style.css handles Google Translate cleanup ?>