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
            <button class="btn btn-action btn-action-primary">
                <i class="fas fa-print"></i> Print
            </button>
            <button class="btn btn-action btn-action-accent">
                <i class="fas fa-file-pdf"></i> Download PDF
            </button>
            <button class="btn btn-action btn-action-outline">
                <i class="fas fa-share-nodes"></i> Share
            </button>

            <a href="models.php?brand=<?php echo urlencode($brand); ?>" class="btn btn-back ms-auto">
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

<?php include 'include/footer.php'; ?>