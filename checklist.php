<?php
include 'include/header.php';

$brand_param = isset($_GET['brand']) ? strtolower($_GET['brand']) : '';
$model_param = isset($_GET['model']) ? strtolower($_GET['model']) : '';

$brand = 'Brand Not Found';
$model = 'Model Not Found';
$model_features = [];

include 'include/carData.php';

// 1. Find Brand (Same logic as models.php)
$brand_data = null;
foreach ($carData as $key => $data) {
    if (strtolower($key) === $brand_param) {
        $brand = $key;
        $brand_data = $data;
        break;
    }
}

// 2. Find Model
if ($brand_data && isset($brand_data['models'])) {
    foreach ($brand_data['models'] as $key => $details) {
        if (strtolower($key) === $model_param) {
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
            <a href="models.php?brand=<?php echo urlencode($brand_param); ?>" class="btn-pdi btn-pdi-outline ms-auto">
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
<div class="container">
    <div class="row justify-content-center pt-4">
        <div class="col-lg-12">

            <!-- A. Why PDI Matters -->
            <div class="premium-section-spacer">
                <div class="text-center mb-5">
                    <span class="section-subtitle-pdi">Vital Checks</span>
                    <h2 class="fw-bold mt-2 section-title-large">Why <span
                            class="text-dark"><?php echo $brand; ?></span> PDI Matters</h2>
                </div>

                <div class="row g-4 justify-content-center">
                    <!-- Card 1 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 card-hover-premium card-rounded-white">
                            <div class="d-inline-flex align-items-center justify-content-center mb-4 icon-circle-bg">
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
                            <div class="d-inline-flex align-items-center justify-content-center mb-4 icon-circle-bg">
                                <i class="fas fa-check text-accent fs-5"></i>
                            </div>
                            <h4 class="fw-bold mb-3 card-title-dark">Fit/Finish checks</h4>
                            <p class="text-muted mb-0 card-text-small">
                                Heavily accessorized models need checks for loose exterior chrome or badge alignment.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 card-hover-premium card-rounded-white">
                            <div class="d-inline-flex align-items-center justify-content-center mb-4 icon-circle-bg">
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

    <div class="mt-5">
        <div class="text-center mb-5">
            <span class="section-subtitle-pdi">HOW IT WORKS</span>
            <h2 class="fw-bold">Your Path to Perfection</h2>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="process-card h-100">
                    <div class="process-icon-wrapper shadow-sm">
                        <i class="fas fa-calendar-check fs-3"></i>
                    </div>
                    <h4 class="fw-bold">1. Book Inspection</h4>
                    <p class="text-muted small mb-0">Schedule a verified PDI expert visit before your car delivery date.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process-card h-100">
                    <div class="process-icon-wrapper shadow-sm">
                        <i class="fas fa-search-plus fs-3"></i>
                    </div>
                    <h4 class="fw-bold">2. Expert Verification</h4>
                    <p class="text-muted small mb-0">Our engineer performs a 500+ point check on your vehicle at the
                        stockyard.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process-card h-100">
                    <div class="process-icon-wrapper shadow-sm">
                        <i class="fas fa-file-contract fs-3"></i>
                    </div>
                    <h4 class="fw-bold">3. Detailed Report</h4>
                    <p class="text-muted small mb-0">Receive a comprehensive report highlighting any defects or issues
                        instantly.</p>
                </div>
            </div>
        </div>

        <!-- Share Modal -->
        <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 radius-theme shadow-lg p-3">
                    <div class="modal-header modal-header-clean">
                        <h5 class="modal-title modal-title-clean" id="shareModalLabel">Share Your Checklist</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <a href="https://wa.me/?text=Check out my Custom PDI Checklist: <?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"
                                    target="_blank" class="btn-share btn-share-whatsapp">
                                    <i class="fab fa-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="mailto:?subject=My PDI Checklist&body=Check out my Custom PDI Checklist: <?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"
                                    class="btn-share btn-share-email">
                                    <i class="fas fa-envelope"></i> Email
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode("https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>"
                                    target="_blank" class="btn-share btn-share-facebook">
                                    <i class="fab fa-facebook-f"></i> Facebook
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="https://twitter.com/intent/tweet?text=Check out my Custom PDI Checklist&url=<?php echo urlencode("https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>"
                                    target="_blank" class="btn-share btn-share-twitter">
                                    <i class="fab fa-twitter"></i> Twitter
                                </a>
                            </div>
                        </div>

                        <div class="copy-link-container">
                            <input type="text" class="copy-input" id="shareUrlInput"
                                value="<?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"
                                readonly>
                            <button class="btn-copy-link" type="button" id="copyBtn">Copy Link</button>
                        </div>
                        <div id="copySuccess" class="text-success small fw-bold mt-2 copy-success-msg">
                            Copied to clipboard!</div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const copyBtn = document.getElementById('copyBtn');
                const shareUrlInput = document.getElementById('shareUrlInput');
                const copySuccess = document.getElementById('copySuccess');

                if (copyBtn) {
                    copyBtn.addEventListener('click', function () {
                        shareUrlInput.select();
                        shareUrlInput.setSelectionRange(0, 99999); // For mobile devices

                        navigator.clipboard.writeText(shareUrlInput.value).then(() => {
                            const originalText = copyBtn.innerText;
                            copyBtn.innerText = 'Copied!';
                            copyBtn.classList.remove('btn-primary');
                            copyBtn.classList.add('btn-success');
                            copySuccess.style.display = 'block';

                            setTimeout(() => {
                                copyBtn.innerText = originalText;
                                copyBtn.classList.remove('btn-success');
                                copyBtn.classList.add('btn-primary');
                                copySuccess.style.display = 'none';
                            }, 2000);
                        });
                    });
                }
            });

            // Function to toggle checklist item state
            function toggleChecklistItem(element) {
                element.classList.toggle('is-checked');
            }
        </script>

        <!-- HTML2PDF Library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

        <script>
            // ROBUST PDF GENERATION SCRIPT
            document.getElementById('downloadPdfBtn').addEventListener('click', function () {
                // Library Check
                if (typeof html2pdf === 'undefined') {
                    alert('PDF Generator library is not loaded. Please reload the page or check your connection.');
                    return;
                }

                const button = this;
                const originalText = button.innerHTML;

                // Use pointer-events none instead of disabled to maintain visibility
                button.innerHTML = '<span class="d-flex align-items-center gap-2 justify-content-center"><i class="fas fa-spinner fa-spin"></i> Generating...</span>';
                button.style.pointerEvents = 'none';
                button.style.opacity = '1'; // Slight feedback but keep legible

                setTimeout(() => {
                    try {
                        // 1. Get Brand/Model Title
                        const brandModelElement = document.querySelector('.badge-value');
                        const titleText = brandModelElement ? brandModelElement.innerText : 'PDI Checklist';

                        // 2. Create a CLEAN container for the PDF
                        // Instead of cloning hidden DOM elements (which causes blank PDFs), 
                        // we will reconstruct the list manually.
                        const reportContainer = document.createElement('div');
                        reportContainer.style.width = '100%';
                        reportContainer.style.background = '#fff';
                        reportContainer.style.fontFamily = 'Helvetica, Arial, sans-serif';
                        reportContainer.style.color = '#333';

                        // 3. Add Header
                        const header = document.createElement('div');
                        header.style.textAlign = 'center';
                        header.style.marginBottom = '30px';
                        header.style.borderBottom = '2px solid #1e3a8a';
                        header.style.paddingBottom = '20px';

                        header.innerHTML = `
                            <h1 style="color: #1e3a8a; margin: 0; font-size: 28px;">${titleText}</h1>
                            <p style="color: #666; margin: 5px 0 0 0; font-size: 14px;">Vital Inspection Points - Generated from PDICARS.COM</p>
                        `;
                        reportContainer.appendChild(header);

                        // 4. Extract Data from the Accordion
                        const accordionItems = document.querySelectorAll('.accordion-item');

                        if (accordionItems.length === 0) {
                            throw new Error('No checklist items found on the page.');
                        }

                        accordionItems.forEach((item, index) => {
                            // Extract Category Name
                            const btn = item.querySelector('.accordion-button');
                            const categoryName = btn ? btn.innerText.trim() : 'Category ' + (index + 1);

                            // Extract List Items
                            const listItems = item.querySelectorAll('.checklist-item-row .item-text');

                            if (listItems.length > 0) {
                                // Create Category Header
                                const catHeader = document.createElement('h3');
                                catHeader.style.backgroundColor = '#f1f5f9';
                                catHeader.style.color = '#0f172a';
                                catHeader.style.padding = '10px 15px';
                                catHeader.style.fontSize = '18px';
                                catHeader.style.margin = '20px 0 0 0'; // Removed bottom margin to keep close to list
                                catHeader.style.borderLeft = '5px solid #F86F03'; // Accent color border
                                catHeader.innerText = categoryName;
                                reportContainer.appendChild(catHeader);

                                // Create UL
                                const ul = document.createElement('ul');
                                ul.style.listStyleType = 'none';
                                ul.style.padding = '0';
                                ul.style.margin = '0 0 20px 0'; // Add bottom spacing for the whole block

                                listItems.forEach(liText => {
                                    const parentRow = liText.closest('.checklist-item-row');
                                    const isChecked = parentRow && parentRow.classList.contains('is-checked');

                                    const li = document.createElement('li');
                                    li.style.borderBottom = '1px solid #eee';
                                    li.style.padding = '10px 15px';
                                    li.style.fontSize = '14px';
                                    li.style.display = 'flex';
                                    li.style.alignItems = 'center';
                                    li.style.pageBreakInside = 'avoid'; // Prevent item splitting
                                    li.style.breakInside = 'avoid';

                                    if (isChecked) {
                                        li.style.backgroundColor = '#ecfdf5'; // Light green background like UI
                                    }

                                    // Checkbox visual
                                    const checkbox = document.createElement('span');
                                    checkbox.style.display = 'inline-flex';
                                    checkbox.style.alignItems = 'center';
                                    checkbox.style.justifyContent = 'center';
                                    checkbox.style.width = '16px';
                                    checkbox.style.height = '16px';
                                    checkbox.style.marginRight = '12px';
                                    checkbox.style.borderRadius = '4px';
                                    checkbox.style.flexShrink = '0';

                                    if (isChecked) {
                                        checkbox.style.backgroundColor = '#F86F03'; // Accent Color
                                        checkbox.style.border = '1px solid #F86F03';
                                        checkbox.style.color = '#fff';
                                        checkbox.style.fontSize = '10px';
                                        checkbox.innerHTML = '✔'; // Checkmark
                                    } else {
                                        checkbox.style.border = '2px solid #cbd5e1';
                                        checkbox.style.backgroundColor = 'transparent';
                                    }

                                    const textSpan = document.createElement('span');
                                    textSpan.innerText = liText.innerText.trim();
                                    if (isChecked) {
                                        textSpan.style.color = '#065f46'; // Darker green text
                                        textSpan.style.fontWeight = 'bold';
                                    } else {
                                        textSpan.style.color = '#334155';
                                    }

                                    li.appendChild(checkbox);
                                    li.appendChild(textSpan);
                                    ul.appendChild(li);
                                });
                                reportContainer.appendChild(ul);
                            }
                        });

                        // 5. Append footer
                        const footer = document.createElement('div');
                        footer.style.marginTop = '40px';
                        footer.style.textAlign = 'center';
                        footer.style.fontSize = '12px';
                        footer.style.color = '#999';
                        footer.innerText = '© ' + new Date().getFullYear() + ' PDICARS.COM | Ensure your new car is defect-free.';
                        reportContainer.appendChild(footer);

                        // 6. Append to body for rendering
                        const wrapper = document.createElement('div');
                        wrapper.style.position = 'fixed';
                        wrapper.style.top = '-10000px';
                        wrapper.style.left = '0';
                        wrapper.style.width = '794px'; // Exact A4 width
                        wrapper.style.backgroundColor = 'white';
                        wrapper.style.zIndex = '-1';
                        wrapper.appendChild(reportContainer);
                        document.body.appendChild(wrapper);

                        // 7. Generate PDF
                        const opt = {
                            margin: [10, 10, 10, 10],
                            filename: titleText.replace(/\s+/g, '_') + '_Checklist.pdf',
                            image: { type: 'jpeg', quality: 0.98 },
                            html2canvas: { scale: 2, useCORS: true, logging: false, scrollY: 0 },
                            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
                            pagebreak: { mode: ['css', 'legacy'] } // REMOVED 'avoid-all' to allow lists to break naturally
                        };

                        html2pdf().from(reportContainer).set(opt).save().then(() => {
                            if (document.body.contains(wrapper)) document.body.removeChild(wrapper);
                            button.innerHTML = originalText;
                            button.style.pointerEvents = 'auto';
                            button.style.opacity = '1';
                        }).catch(err => {
                            console.error(err);
                            if (document.body.contains(wrapper)) document.body.removeChild(wrapper);
                            alert('Error generating PDF. Please try again.');
                            button.innerHTML = originalText;
                            button.style.pointerEvents = 'auto';
                            button.style.opacity = '1';
                        });

                    } catch (e) {
                        console.error(e);
                        alert('Error: ' + e.message);
                        button.innerHTML = originalText;
                        button.style.pointerEvents = 'auto';
                        button.style.opacity = '1';
                    }
                }, 100);
            });
        </script>
    </div>
</div>


<?php include 'include/footer.php'; ?>