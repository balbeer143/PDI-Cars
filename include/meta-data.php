<?php
// Ensure carData is available for brand/model lookup
if (!isset($carData)) {
    // Use __DIR__ to safely include from the same directory
    include_once __DIR__ . '/carData.php';
}

// Define Base URL for assets and links
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$domainName = $_SERVER['HTTP_HOST'];
$path = dirname($_SERVER['SCRIPT_NAME']);
$base_url = $protocol . $domainName . rtrim($path, '/\\') . '/';

$page = basename($_SERVER['PHP_SELF'], ".php");

// Default global metadata
$title = "#1 Cars PDI Checklist Online Tool";
$description = "Ensure a perfect delivery. Verify electronics, paint, and engine fluids before you sign the papers. Don't accept your new car without checking it first!";
$keywords = "PDI, Car Inspection, New Car Checklist, Pre-Delivery Inspection, Car Defects";

// Get Params
$brand_param = isset($_GET['brand']) ? $_GET['brand'] : '';
$model_param = isset($_GET['model']) ? $_GET['model'] : '';

// Helper to resolve display names
$brandNameDisplay = '';
$modelNameDisplay = '';

// --- DYNAMIC METADATA LOGIC ---

// Resolve Display Names
if ($brand_param) {
    // Try to match against carData for proper casing
    if (isset($carData)) {
        foreach ($carData as $bName => $bData) {
            if (strtolower($bName) === strtolower(urldecode($brand_param))) {
                $brandNameDisplay = $bName;
                if ($model_param && isset($bData['models'])) {
                    foreach ($bData['models'] as $mName => $mData) {
                        if (strtolower($mName) === strtolower(urldecode($model_param))) {
                            $modelNameDisplay = $mName;
                            break;
                        }
                    }
                }
                break;
            }
        }
    }

    // Fallbacks if not found in carData
    if (empty($brandNameDisplay))
        $brandNameDisplay = ucwords(str_replace('-', ' ', urldecode($brand_param)));
    if (empty($modelNameDisplay) && $model_param)
        $modelNameDisplay = ucwords(str_replace('-', ' ', urldecode($model_param)));
}

// Clean brand name for Title (Space instead of Hyphen)
$brandTitleStr = str_replace('-', ' ', $brandNameDisplay);

if ($brand_param && empty($model_param)) {
    // --- BRAND PAGE TEMPLATE ---
    $title = "#1 Cars PDI Checklist Online Tool - Get $brandTitleStr Report";
    $description = "Don’t take delivery of your $brandTitleStr without this! Use our free PDI checklist tool to spot defects and get a report. Ensure your car is 100% perfect.";
    // $keywords = "$brandTitleStr PDI, $brandTitleStr inspection, $brandTitleStr common issues, new $brandTitleStr verification";

} elseif ($brand_param && $model_param) {
    // --- MODEL PAGE TEMPLATE ---
    $title = "#1 Cars PDI Checklist Online Tool - Download $modelNameDisplay Report";
    $description = "Dealers don’t want you to see this. Use our free PDI tool to find hidden $modelNameDisplay defects before you sign. Download your pro report instantly & drive home happy.";
    // $keywords = "$brandTitleStr $modelNameDisplay PDI, $modelNameDisplay inspection checklist, new $modelNameDisplay issues, $brandTitleStr defects";

} else {
    // --- STATIC PAGES ---
    switch ($page) {
        case "index":
            $title = "PDICARS | Ultimate Car Pre-Delivery Inspection Tool";
            $description = "Don't buy a new car without a PDI Expert. Get a comprehensive 200-point inspection report. Ensure a perfect delivery.";
            $keywords = "PDI check, car inspection india, new car delivery checklist";
            break;
        case "about":
            $title = "About PDICARS | Ensuring every new car is perfect";
            $description = "Learn more about PDICARS, our mission to protect car buyers from defective vehicles through comprehensive PDI checklists.";
            $keywords = "about pdicars, car inspection company, pdi experts";
            break;
        case "hire-expert":
            $title = "Hire a PDI Expert | Professional Car Inspection Service";
            $description = "Connect with certified professionals to assist with your Pre-Delivery Inspection. Expert eyes catch what you might miss.";
            $keywords = "hire car inspector, professional pdi service, car mechanic for inspection";
            break;
        case "checklist":
            $title = "Complete PDI Checklist | PDICARS";
            break;
    }
}
?>