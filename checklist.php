<?php
include 'include/header.php';

$brand = isset($_GET['brand']) ? htmlspecialchars($_GET['brand']) : 'Car';
$model = isset($_GET['model']) ? htmlspecialchars($_GET['model']) : 'Model';

include 'include/carData.php';

// Get model specific features
$model_features = [];
if (isset($carData[$brand]['models'][$model])) {
    $model_features = $carData[$brand]['models'][$model]['features'];
}

// Combine static checklist with model features
$checklist_categories = $pdiChecklist;
if (!empty($model_features)) {
    $checklist_categories['Model Specific Features'] = $model_features;
}


?>

<div class="container section-padding">
    <!-- Header -->
    <!-- Header -->
    <div class="mb-4">
        <div class="mb-4 py-3">
            <h2 class="fw-bold">3. Your Custom PDI Checklist</h2>
            <p class="text-muted fs-5 mb-0 position-relative">Model: <span
                    class="text fw-bold"><?php echo "$brand $model"; ?></span></p>
        </div>

        <!-- Actions -->
        <!-- Actions -->
        <div class="d-flex flex-wrap align-items-center gap-3 mt-4 border-bottom pb-4">
            <button class="btn-pdi btn-pdi-primary">
                <i class="fas fa-print"></i> Print
            </button>
            <button class="btn-pdi btn-pdi-accent">
                <i class="fas fa-file-pdf"></i> Download PDF
            </button>
            <button class="btn-pdi btn-pdi-outline" data-bs-toggle="modal" data-bs-target="#shareModal">
                <i class="fas fa-share-nodes"></i> Share
            </button>

            <a href="models.php?brand=<?php echo urlencode($brand); ?>" class="btn-pdi btn-pdi-outline ms-auto">
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
                                        <li
                                            class="d-flex align-items-center mb-3 py-2 px-3 border rounded-3 checklist-item-row">
                                            <div class="me-3 check-indicator">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="item-text text-gray-theme flex-grow-1">
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

<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 radius-theme shadow-lg">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-primary fs-3" id="shareModalLabel">Share Your Checklist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <a href="https://wa.me/?text=Check out my Custom PDI Checklist: <?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"
                            target="_blank"
                            class="btn btn-share w-100 d-flex align-items-center justify-content-center gap-2 py-3 border-0 text-white rounded-3 fw-bold"
                            style="background-color: #25d366; font-size: 1.1rem;">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="mailto:?subject=My PDI Checklist&body=Check out my Custom PDI Checklist: <?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"
                            class="btn btn-share w-100 d-flex align-items-center justify-content-center gap-2 py-3 border-0 text-white rounded-3 fw-bold"
                            style="background-color: #6c757d; font-size: 1.1rem;">
                            <i class="fas fa-envelope"></i> Email
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode("https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>"
                            target="_blank"
                            class="btn btn-share w-100 d-flex align-items-center justify-content-center gap-2 py-3 border-0 text-white rounded-3 fw-bold"
                            style="background-color: #3b5998; font-size: 1.1rem;">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="https://twitter.com/intent/tweet?text=Check out my Custom PDI Checklist&url=<?php echo urlencode("https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>"
                            target="_blank"
                            class="btn btn-share w-100 d-flex align-items-center justify-content-center gap-2 py-3 border-0 text-white rounded-3 fw-bold"
                            style="background-color: #1da1f2; font-size: 1.1rem;">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                    </div>
                </div>

                <div class="input-group mb-2 custom-copy-group">
                    <input type="text" class="form-control border-end-0 py-2" id="shareUrlInput"
                        value="<?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" readonly>
                    <button class="btn btn-primary px-4 fw-bold" type="button" id="copyBtn">Copy Link</button>
                </div>
                <div id="copySuccess" class="text-success small fw-bold" style="display: none; text-align: right;">
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
</script>

<?php include 'include/footer.php'; ?>