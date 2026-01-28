<?php
// Ensure carData is available for brand/model lookup
if (!isset($carData)) {
    // Use __DIR__ to safely include from the same directory
    include_once __DIR__ . '/carData.php';
}

$page = basename($_SERVER['PHP_SELF'], ".php");

// Default global metadata
$title = "PDICARS | Ultimate Car Pre-Delivery Inspection Tool";
$description = "Ensure a perfect delivery. Verify electronics, paint, and engine fluids before you sign the papers. Don't accept your new car without checking it first!";
$keywords = "PDI, Car Inspection, New Car Checklist, Pre-Delivery Inspection, Car Defects";

// Get Params
$brand_param = isset($_GET['brand']) ? $_GET['brand'] : '';
$model_param = isset($_GET['model']) ? $_GET['model'] : '';

// Helper to resolve display names (used for auto-generation fallbacks)
$brandNameDisplay = '';
$modelNameDisplay = '';

// --- INTEGRATED SEO DATA (Manual Overrides) ---
// Define specific titles, descriptions, and keywords for every Brand and Model here.
$seo_data = [
    'maruti-suzuki' => [
        'title' => 'Maruti Suzuki PDI Checklist | Essential Delivery Inspection Guide',
        'description' => 'Complete investigation guide for your new Maruti Suzuki. Check for common issues in Swift, Baleno, Brezza, and more before delivery.',
        'keywords' => 'Maruti PDI, Maruti Suzuki inspection, new maruti checklist, maruti defects',
        'models' => [
            'swift' => [
                'title' => 'Maruti Swift PDI Checklist | Inspection Guide for New Owners',
                'description' => 'Buying a new Swift? Use our expert PDI checklist to inspect paint, engine, and infotainment before accepting delivery.',
                'keywords' => 'Swift PDI, Maruti Swift inspection, new Swift problems, swift delivery checklist'
            ],
            'baleno' => [
                'title' => 'Maruti Baleno PDI Checklist | 200+ Point Inspection',
                'description' => 'Verify your premium hatchback. Check Baleno\'s HUD, 360 camera, and panels with our detailed pre-delivery guide.',
                'keywords' => 'Baleno PDI, Baleno check, new Baleno inspection, tech check'
            ],
            'vitara brezza' => [
                'title' => 'Maruti Brezza PDI Guide | SUV Inspection Checklist',
                'description' => 'Taking delivery of a Brezza? Ensure the sunroof, electronics, and build quality are perfect with this PDI tool.',
                'keywords' => 'Brezza PDI, Vitara Brezza inspection, compact SUV checklist'
            ],
            'ertiga' => [
                'title' => 'Maruti Ertiga PDI Checklist | MPV Delivery Inspection',
                'description' => 'Inspect your 7-seater thoroughly. Check rear AC, seats, and smart hybrid system on your new Ertiga.',
                'keywords' => 'Ertiga PDI, Ertiga inspection, MPV checklist, new car check'
            ],
            'celerio' => [
                'title' => 'Maruti Celerio PDI Checklist | Hatchback Inspection',
                'description' => 'Don\'t miss a thing on your new Celerio. Check AMT gearbox, engine start-stop, and paint finish.',
                'keywords' => 'Celerio PDI, Celerio inspection, budget car checklist'
            ],
            'xl6' => [
                'title' => 'Maruti XL6 PDI Guide | Premium MPV Inspection',
                'description' => 'Detailed PDI for XL6. Verify captain seats, ventilated seats, and UV cut glass before signing.',
                'keywords' => 'XL6 PDI, Nexa inspection, premium mpv check'
            ],
            'ciaz' => [
                'title' => 'Maruti Ciaz PDI Checklist | Sedan Inspection Guide',
                'description' => 'Ensure your Ciaz is flawless. Inspect the smart hybrid system, leather interiors, and paint quality.',
                'keywords' => 'Ciaz PDI, sedan inspection, Maruti Ciaz checklist'
            ]
        ]
    ],
    'hyundai' => [
        'title' => 'Hyundai PDI Checklist | Verify Features & Electronics',
        'description' => 'Hyundai cars are tech-loaded. Use our guide to checks BlueLink, Sunroofs, and ADAS on Creta, Venue, and more.',
        'keywords' => 'Hyundai PDI, Hyundai inspection, new hyundai checklist, creta problems',
        'models' => [
            'creta' => [
                'title' => 'Hyundai Creta PDI Checklist | Ultimate SUV Inspection',
                'description' => 'Inspect the Panoramic sunroof, Bose audio, and electronics on your new Creta. Don\'t accept defects.',
                'keywords' => 'Creta PDI, Creta inspection, new Creta issues, SUV checklist'
            ],
            'venue' => [
                'title' => 'Hyundai Venue PDI Guide | Compact SUV Check',
                'description' => 'Verify your Venue\'s build and features. Detailed checks for DCT gearbox, paint, and interior.',
                'keywords' => 'Venue PDI, Venue inspection, turbo petrol check'
            ],
            'i20' => [
                'title' => 'Hyundai i20 PDI Checklist | Premium Hatch Inspection',
                'description' => 'Check the sporty i20 N-Line or standard i20. Verify sunroof, exhaust note, and panel gaps.',
                'keywords' => 'i20 PDI, i20 N Line inspection, premium hatchback checklist'
            ],
            'alcazar' => [
                'title' => 'Hyundai Alcazar PDI | 7-Seater SUV Inspection',
                'description' => 'Taking an Alcazar? Inspect the captain seats, digital cluster, and rear entertainment with this guide.',
                'keywords' => 'Alcazar PDI, 7 seater inspection, Hyundai Alcazar checklist'
            ],
            'verna' => [
                'title' => 'Hyundai Verna PDI Checklist | Sedan Delivery Guide',
                'description' => 'Inspect the new Verna\'s futuristic design, ADAS features, and turbo engine before delivery.',
                'keywords' => 'Verna PDI, Verna inspection, sedan checklist, new verna issues'
            ],
            'tucson' => [
                'title' => 'Hyundai Tucson PDI | Premium SUV Inspection',
                'description' => 'Comprehensive check for the flagship Tucson. Verify ADAS L2, AWD system, and premium interiors.',
                'keywords' => 'Tucson PDI, luxury SUV inspection, Hyundai Tucson checklist'
            ],
            'exter' => [
                'title' => 'Hyundai Exter PDI Checklist | Micro SUV Inspection',
                'description' => 'Check your new Exter for paint defects, dashcam functionality, and AMT smoothness.',
                'keywords' => 'Exter PDI, Exter inspection, micro SUV check'
            ],
            'santro' => [
                'title' => 'Hyundai Santro PDI Checklist | Hatchback Delivery',
                'description' => 'Simple but essential. Check your Santro engine, AC cooling, and paint finish.',
                'keywords' => 'Santro PDI, small car inspection'
            ],
            'aura' => [
                'title' => 'Hyundai Aura PDI Checklist | Sedan Inspection',
                'description' => 'Inspect your Aura. Check the boot space, infotainment, and CNG kit (if applicable).',
                'keywords' => 'Aura PDI, sedan inspection, compact sedan check'
            ]
        ]
    ],
    'tata-motors' => [
        'title' => 'Tata Motors PDI Checklist | Safety & Build Quality Check',
        'description' => 'Tata cars are built strong, but finish can vary. Inspect panel gaps, infotainment, and paint on Nexon, Harrier, Safari.',
        'keywords' => 'Tata PDI, Tata Motors inspection, Tata build quality, new tata car check',
        'models' => [
            'nexon' => [
                'title' => 'Tata Nexon PDI Checklist | EV & ICE Inspection',
                'description' => 'Inspect your Nexon thoroughly. Check the touch panel, potential software glitches, and fit-finish.',
                'keywords' => 'Nexon PDI, Nexon EV inspection, compact SUV checklist'
            ],
            'harrier' => [
                'title' => 'Tata Harrier PDI Guide | SUV Inspection Checklist',
                'description' => 'Take delivery of a flawless Harrier. Verify the infotainment, ADAS sensors, and panoramic sunroof.',
                'keywords' => 'Harrier PDI, Harrier inspection, Tata SUV check'
            ],
            'safari' => [
                'title' => 'Tata Safari PDI Checklist | Flagship SUV Inspection',
                'description' => 'Ensure your Safari is perfect. Detailed checks for 6/7 seater config, electric boss mode, and paint.',
                'keywords' => 'Safari PDI, Tata Safari inspection, 7 seater SUV check'
            ],
            'altroz' => [
                'title' => 'Tata Altroz PDI | Premium Hatchback Inspection',
                'description' => 'Verify the Gold Standard Altroz. Check for DCA gearbox smoothness and panel alignment.',
                'keywords' => 'Altroz PDI, Altroz inspection, safest hatchback check'
            ],
            'punch' => [
                'title' => 'Tata Punch PDI Checklist | Micro SUV Guide',
                'description' => 'Inspect your Punch for ruggedness and finish. detailed checklist for the new micro SUV.',
                'keywords' => 'Punch PDI, Tata Punch inspection, micro SUV checklist'
            ],
            'tiago' => [
                'title' => 'Tata Tiago PDI | Hatchback Inspection Checklist',
                'description' => 'Essential checks for Tiago. Verify CNG tank (if applicable), engine idle, and AC cooling.',
                'keywords' => 'Tiago PDI, Tiago CNG inspection, budget car check'
            ],
            'tigor' => [
                'title' => 'Tata Tigor PDI | Sedan Inspection Checklist',
                'description' => 'Check your Tigor. EV or ICE, ensure the boot lock, infotainment, and paint are perfect.',
                'keywords' => 'Tigor PDI, Tigor EV inspection, sedan check'
            ],
            'curvv' => [
                'title' => 'Tata Curvv PDI Checklist | Coupe SUV Inspection',
                'description' => 'Inspect the unique Curvv. Verify the coupe roofline finish, flush handles, and new tech stack.',
                'keywords' => 'Curvv PDI, Tata Curvv inspection, coupe SUV check'
            ]
        ]
    ],
    'mahindra' => [
        'title' => 'Mahindra PDI Checklist | SUV & Off-roader Inspection',
        'description' => 'Mahindra SUVs are complex. Validate electronics, 4x4 systems, and software on XUV700, Thar, Scorpio-N.',
        'keywords' => 'Mahindra PDI, Mahindra SUV inspection, XUV check, Thar checklist',
        'models' => [
            'thar' => [
                'title' => 'Mahindra Thar PDI Checklist | 4x4 Inspection Guide',
                'description' => 'Inspect the off-road legend. Check hard-top sealing, 4x4 engagement, and convertible mechanism.',
                'keywords' => 'Thar PDI, Thar Roxx inspection, offroad checklist'
            ],
            'xuv700' => [
                'title' => 'Mahindra XUV700 PDI | Tech & ADAS Inspection',
                'description' => 'Validate the massive dual screens, flush door handles, and ADAS functions on your XUV700.',
                'keywords' => 'XUV700 PDI, XUV700 inspection, advanced SUV check'
            ],
            'scorpio-n' => [
                'title' => 'Mahindra Scorpio-N PDI Checklist | Big Daddy Inspection',
                'description' => 'Ensure your Scorpio-N is flawless. Check suspension, 4XPLOR modes, and sunroof operation.',
                'keywords' => 'Scorpio-N PDI, Scorpio inspection, rugged SUV check'
            ],
            'xuv300' => [
                'title' => 'Mahindra XUV300 PDI Guide | Compact SUV Check',
                'description' => 'Inspect XUV300 features. Verify sunroof, steering modes, and dual-zone climate control.',
                'keywords' => 'XUV300 PDI, XUV 3XO inspection, compact SUV checklist'
            ],
            'xuv400' => [
                'title' => 'Mahindra XUV400 EV PDI | Electric SUV Inspection',
                'description' => 'Verify your electric SUV. Check charging port, battery range display, and copper finish accents.',
                'keywords' => 'XUV400 PDI, EV inspection, electric SUV check'
            ],
            'xuv500' => [
                'title' => 'Mahindra XUV500 PDI | SUV Inspection',
                'description' => 'Inspect the classic XUV500. Check electronics, AWD system, and door handles.',
                'keywords' => 'XUV500 PDI, SUV inspection'
            ],
            'scorpio classic' => [
                'title' => 'Mahindra Scorpio Classic PDI | Inspection Guide',
                'description' => 'The OG Scorpio. Check hydraulic power steering feel, suspension, and simple electronics.',
                'keywords' => 'Scorpio Classic PDI, SUV inspection'
            ],
            'bolero' => [
                'title' => 'Mahindra Bolero PDI Checklist | Rugged Utility Check',
                'description' => 'Basic but tough. Inspect Bolero for metal finish, sturdy bumpers, and engine health.',
                'keywords' => 'Bolero PDI, utility vehicle inspection'
            ],
            'bolero neo' => [
                'title' => 'Mahindra Bolero Neo PDI | Compact SUV Check',
                'description' => 'Check the Neo. Diff-lock verification (N10), infotainment, and paint quality.',
                'keywords' => 'Bolero Neo PDI, TUV300 inspection'
            ],
            'xev 9e' => [
                'title' => 'Mahindra XEV 9e PDI | Electric Coupe Inspection',
                'description' => 'Inspect the new EV coupe. Triple screen layout, INGLO platform, and battery health.',
                'keywords' => 'XEV 9e PDI, Mahindra EV inspection'
            ],
            'be6' => [
                'title' => 'Mahindra BE6 PDI | Electric SUV Check',
                'description' => 'Verify the BE6. Futuristic design, charging systems, and build quality.',
                'keywords' => 'BE6 PDI, Born Electric inspection'
            ]
        ]
    ],
    'honda' => [
        'title' => 'Honda Car PDI Checklist | Engineering & Hybrid Check',
        'description' => 'Verify Honda\'s precision engineering. Special checks for e:HEV hybrids, ADAS, and CVT gearboxes.',
        'keywords' => 'Honda PDI, Honda inspection, City hybrid check, Elevate checklist',
        'models' => [
            'city' => [
                'title' => 'Honda City PDI Checklist | Sedan Inspection Guide',
                'description' => 'Inspect the classic City. Check Hybrid system (e:HEV), ADAS camera, and soft-touch interiors.',
                'keywords' => 'Honda City PDI, sedan inspection, City hybrid checklist'
            ],
            'elevate' => [
                'title' => 'Honda Elevate PDI Checklist | SUV Inspection',
                'description' => 'Taking the new Elevate? Verify the bold front grille, lane watch camera, and ground clearance.',
                'keywords' => 'Elevate PDI, Honda SUV inspection, new car checklist'
            ],
            'amaze' => [
                'title' => 'Honda Amaze PDI Guide | Compact Sedan Check',
                'description' => 'Check your Amaze. specific checks for CVT smoothness and diesel engine vibrations.',
                'keywords' => 'Amaze PDI, compact sedan inspection, family car check'
            ],
            'jazz' => [
                'title' => 'Honda Jazz PDI Checklist | Premium Hatch Check',
                'description' => 'Inspect the spacious Jazz. Magic seats, sunroof, and paddle shifters check.',
                'keywords' => 'Jazz PDI, hatchback inspection'
            ],
            'wr-v' => [
                'title' => 'Honda WR-V PDI | Crossover Inspection',
                'description' => 'Check the WR-V. Sunroof operation, cladding fitment, and ground clearance.',
                'keywords' => 'WR-V PDI, crossover inspection'
            ],
            'civic' => [
                'title' => 'Honda Civic PDI Checklist | Premium Sedan Inspection',
                'description' => 'Inspect the Civic. Low ground clearance check, lane watch camera, and turbo engine.',
                'keywords' => 'Civic PDI, sedan inspection'
            ]
        ]
    ],
    'toyota' => [
        'title' => 'Toyota PDI Checklist | Reliability & Hybrid Inspection',
        'description' => 'Even Toyotas need checking. Verify Hyryder/Innova hybrid batteries and accessorized Fortuners.',
        'keywords' => 'Toyota PDI, Toyota inspection, Hybrid car check, Fortuner checklist',
        'models' => [
            'fortuner' => [
                'title' => 'Toyota Fortuner PDI Checklist | 4x4 SUV Inspection',
                'description' => 'Inspect the beast. Check DPF system, 4x4 low range, and leather condition on your Fortuner.',
                'keywords' => 'Fortuner PDI, Fortuner Legender inspection, rigid SUV check'
            ],
            'innova crysta' => [
                'title' => 'Toyota Innova Crysta PDI | MPV Inspection Guide',
                'description' => 'Verify the king of MPVs. Check captain seats, rear AC cooling, and fitment of accessories.',
                'keywords' => 'Innova PDI, Crysta inspection, MPV checklist'
            ],
            'innova hycross' => [
                'title' => 'Toyota Hycross PDI Checklist | Hybrid MPV Check',
                'description' => 'Inspect the modern Hycross. Hybrid battery check, panoramic sunroof, and ottoman seats.',
                'keywords' => 'Hycross PDI, Hybrid MPV inspection, Innova Hycross check'
            ],
            'glanza' => [
                'title' => 'Toyota Glanza PDI Guide | Premium Hatch Check',
                'description' => 'Check the Glanza. HUD, 360 camera, and Amt gearbox response verification.',
                'keywords' => 'Glanza PDI, hatchback inspection'
            ],
            'urban cruiser' => [
                'title' => 'Toyota Urban Cruiser PDI | SUV Inspection',
                'description' => 'Verify your Urban Cruiser. Smart Hybrid system, AT gearbox check.',
                'keywords' => 'Urban Cruiser PDI, SUV check'
            ],
            'hilux' => [
                'title' => 'Toyota Hilux PDI | Pickup Truck Inspection',
                'description' => 'Inspect the load bay, 4x4 components, and underbody protection of your Hilux.',
                'keywords' => 'Hilux PDI, pickup inspection, offroad truck check'
            ],
            'camry' => [
                'title' => 'Toyota Camry PDI Checklist | Luxury Hybrid Inspection',
                'description' => 'Check the luxury hybrid. Battery health, rear seat controls, and paint finish.',
                'keywords' => 'Camry PDI, luxury sedan inspection, hybrid check'
            ],
            'vellfire' => [
                'title' => 'Toyota Vellfire PDI | Luxury MPV Check',
                'description' => 'Inspect the VIP Van. Executive lounge seats, roof lighting, and hybrid system.',
                'keywords' => 'Vellfire PDI, luxury MPV inspection'
            ],
            'rumion' => [
                'title' => 'Toyota Rumion PDI Checklist | MPV Inspection',
                'description' => 'Check the Rumion. CNG tank check (if applicable), 7-seat flexibility, and AC.',
                'keywords' => 'Rumion PDI, MPV check'
            ]
        ]
    ],
    'kia' => [
        'title' => 'Kia PDI Checklist | Design & Technology Inspection',
        'description' => 'Kia cars look great but check deep. Inspect glossy interiors, Kia Connect, and turbo engines.',
        'keywords' => 'Kia PDI, Kia inspection, Seltos checklist, Sonet problems',
        'models' => [
            'seltos' => [
                'title' => 'Kia Seltos PDI Checklist | Premium SUV Inspection',
                'description' => 'Inspect the detailed Seltos. Check panoramic sunroof, ADAS Level 2, and matte paint finish.',
                'keywords' => 'Seltos PDI, Seltos facelift inspection, SUV checklist'
            ],
            'sonet' => [
                'title' => 'Kia Sonet PDI Guide | Compact SUV Check',
                'description' => 'Verify your Sonet. Check 7-speaker Bose audio, ventilated seats, and sunroof.',
                'keywords' => 'Sonet PDI, Sonet inspection, compact SUV checklist'
            ],
            'carens' => [
                'title' => 'Kia Carens PDI Checklist | RV Inspection Guide',
                'description' => 'Inspect the Carens. One-touch tumble seats, roof AC vents, and ambient lighting checks.',
                'keywords' => 'Carens PDI, MPV inspection, family car check'
            ],
            'ev6' => [
                'title' => 'Kia EV6 PDI Checklist | Electric Supercar Inspection',
                'description' => 'Inspect the futuristic EV6. Battery health, AR Heads-up display, and flush handles.',
                'keywords' => 'EV6 PDI, electric car inspection, premium EV check'
            ],
            'carnival' => [
                'title' => 'Kia Carnival PDI | Luxury MPV Inspection',
                'description' => 'Check the limo. Sliding doors operation, rear entertainment, and VIP seats.',
                'keywords' => 'Carnival PDI, luxury MPV check'
            ],
            'syros' => [
                'title' => 'Kia Syros PDI Checklist | New SUV Inspection',
                'description' => 'Be the first to check the Syros. Paint quality, new tech stack, and interiors.',
                'keywords' => 'Syros PDI, new Kia check'
            ],
            'ev9' => [
                'title' => 'Kia EV9 PDI | Flagship EV Inspection',
                'description' => 'Inspect the massive EV9. Swivel seats, digital grill, and battery range verification.',
                'keywords' => 'EV9 PDI, luxury EV SUV check'
            ]
        ]
    ],
    'mg-motor' => [
        'title' => 'MG Motor PDI Checklist | Internet & AI Inspection',
        'description' => 'Validate MG\'s heavy tech. reliable i-SMART checks, AI assistant, and battery health for EVs.',
        'keywords' => 'MG PDI, MG Hector inspection, MG EV check, internet car checklist',
        'models' => [
            'hector' => [
                'title' => 'MG Hector PDI Checklist | Internet SUV Inspection',
                'description' => 'Check the massive portrait screen, voice commands, and panoramic sunroof on Hector.',
                'keywords' => 'Hector PDI, Hector Plus inspection, SUV checklist'
            ],
            'astor' => [
                'title' => 'MG Astor PDI Guide | AI Inside SUV Check',
                'description' => 'Verify the AI robot on the dash, ADAS functions, and interior soft-touch materials.',
                'keywords' => 'Astor PDI, AI car inspection, compact SUV check'
            ],
            'zs ev' => [
                'title' => 'MG ZS EV PDI Checklist | Electric SUV Inspection',
                'description' => 'Inspect your long-range EV. Battery status, charging port lock, and panoramic roof check.',
                'keywords' => 'ZS EV PDI, electric SUV inspection, MG EV check'
            ],
            'comet ev' => [
                'title' => 'MG Comet EV PDI | Urban EV Inspection',
                'description' => 'Check the quirky Comet. twin screens, entry/exit mechanism, and paint finish.',
                'keywords' => 'Comet EV PDI, small car inspection, city car check'
            ],
            'windsor ev' => [
                'title' => 'MG Windsor EV PDI | Crossover Inspection',
                'description' => 'Check the Windsor. 15.6 inch screen, glass roof, and reclining seats.',
                'keywords' => 'Windsor EV PDI, crossover inspection'
            ],
            'gloster' => [
                'title' => 'MG Gloster PDI Checklist | Full-Size SUV Check',
                'description' => 'Inspect the massive Gloster. ADAS, massage seats, and 4x4 hardware verification.',
                'keywords' => 'Gloster PDI, luxury SUV inspection'
            ]
        ]
    ],
    'volkswagen' => [
        'title' => 'Volkswagen PDI Checklist | German Build Inspection',
        'description' => 'Inspect the German build. Check door thud, DSG smoothness, and TSI engine performance.',
        'keywords' => 'VW PDI, Volkswagen inspection, Taigun check, Virtus checklist',
        'models' => [
            'taigun' => [
                'title' => 'VW Taigun PDI Checklist | SUV Inspection Guide',
                'description' => 'Verify your Taigun. Check continuous LED tail lamp, digital cockpit, and AC performance.',
                'keywords' => 'Taigun PDI, VW SUV inspection, German car check'
            ],
            'virtus' => [
                'title' => 'VW Virtus PDI Guide | Sedan Inspection Checklist',
                'description' => 'Inspect the Virtus GT. DSG gearbox check, wireless CarPlay, and paint quality.',
                'keywords' => 'Virtus PDI, sedan inspection, performance car check'
            ],
            'tiguan' => [
                'title' => 'VW Tiguan PDI Checklist | Premium SUV Inspection',
                'description' => 'Luxury check for Tiguan. Matrix LED lamps, AWD system, and gesture control validation.',
                'keywords' => 'Tiguan PDI, luxury SUV inspection'
            ],
            'polo' => [
                'title' => 'VW Polo PDI Checklist | Hatchback Inspection',
                'description' => 'Inspect the legend. Build quality, TSI engine response, and paint finish.',
                'keywords' => 'Polo PDI, hatchback inspection'
            ],
            'passat' => [
                'title' => 'VW Passat PDI | Luxury Sedan Check',
                'description' => 'Check the executive sedan. Leather quality, ride comfort, and electronics.',
                'keywords' => 'Passat PDI, luxury sedan inspection'
            ]
        ]
    ],
    'skoda' => [
        'title' => 'Skoda PDI Checklist | Simply Clever Inspection',
        'description' => 'Verify Skoda\'s clever features. Check Simply Clever accessories, DSG, and paint finish.',
        'keywords' => 'Skoda PDI, Skoda inspection, Kushaq checklist, Slavia check',
        'models' => [
            'kushaq' => [
                'title' => 'Skoda Kushaq PDI Checklist | SUV Inspection Guide',
                'description' => 'Inspect your Kushaq. 2-spoke steering, sunroof, and EPC error check.',
                'keywords' => 'Kushaq PDI, Skoda SUV inspection'
            ],
            'slavia' => [
                'title' => 'Skoda Slavia PDI Guide | Sedan Inspection',
                'description' => 'Check the elegant Slavia. Ground clearance, infotainment, and ventilated seat check.',
                'keywords' => 'Slavia PDI, sedan inspection, premium car check'
            ],
            'kodiaq' => [
                'title' => 'Skoda Kodiaq PDI Checklist | 4x4 SUV Inspection',
                'description' => 'Inspect the Kodiaq L&K. Canton audio, dynamic chassis control, and sleep package check.',
                'keywords' => 'Kodiaq PDI, luxury SUV inspection, 7 seater check'
            ],
            'kylaq' => [
                'title' => 'Skoda Kylaq PDI | Compact SUV Inspection',
                'description' => 'Verify the new Kylaq. Design, ground clearance, and features check.',
                'keywords' => 'Kylaq PDI, compact SUV check'
            ]
        ]
    ],
    'mercedes' => [
        'title' => 'Mercedes-Benz PDI Checklist | Luxury Car Inspection',
        'description' => 'Detailed inspection guide for your Mercedes. Check MBUX, ambient lighting, and finish.',
        'keywords' => 'Mercedes PDI, Mercedes inspection, C-Class check, E-Class checklist',
        'models' => [
            'c-class' => ['title' => 'Mercedes C-Class PDI Checklist', 'description' => 'Inspect the Baby S-Class. MBUX, seat kinetics, and paint check.', 'keywords' => 'C-Class PDI, luxury sedan inspection'],
            'e-class' => ['title' => 'Mercedes E-Class PDI Checklist', 'description' => 'Verify the E-Class LWB. Rear seat comfort, tablet, and airmatic check.', 'keywords' => 'E-Class PDI, chauffeur car inspection'],
            's-class' => ['title' => 'Mercedes S-Class PDI Checklist', 'description' => 'The best car in the world needs a check too. 4D audio, massage seats, and finish.', 'keywords' => 'S-Class PDI, flagship car inspection'],
            'gla' => ['title' => 'Mercedes GLA PDI Checklist', 'description' => 'Inspect the entry luxury SUV. Panel gaps, MBUX screen, and tyre check.', 'keywords' => 'GLA PDI, compact luxury SUV inspection'],
            'glc' => ['title' => 'Mercedes GLC PDI Checklist', 'description' => 'Verify your GLC. Off-road screen, ADAS, and suspension check.', 'keywords' => 'GLC PDI, luxury SUV inspection'],
            'gle' => ['title' => 'Mercedes GLE PDI Checklist', 'description' => 'Inspect the GLE LWB. Air suspension, 4-zone AC, and soft close doors.', 'keywords' => 'GLE PDI, premium SUV inspection']
        ]
    ],
    'bmw' => [
        'title' => 'BMW PDI Checklist | Driving Machine Inspection',
        'description' => 'Ensure your Ultimate Driving Machine is perfect. iDrive, run-flat tyres, and paint check.',
        'keywords' => 'BMW PDI, BMW inspection, 3 Series check, X1 checklist',
        'models' => [
            '3 series' => ['title' => 'BMW 3 Series PDI Checklist', 'description' => 'Inspect the sports sedan. iDrive 8, curved display, and alloy wheel check.', 'keywords' => '3 Series PDI, sports sedan inspection'],
            'x1' => [
                'title' => 'BMW X1 PDI Checklist',
                'description' => 'Verify the new X1. Boost function, dct gearbox, and interior finish.',
                'keywords' => 'X1 PDI, entry luxury SUV'
            ],
            'x3' => ['title' => 'BMW X3 PDI Checklist', 'description' => 'Inspect the versatile X3. xDrive system, panoramic roof, and leather quality.', 'keywords' => 'X3 PDI, SUV inspection'],
            'x4' => ['title' => 'BMW X4 PDI Checklist', 'description' => 'Check the Coupe SUV. Roofline paint, frameless windows, and boot operation.', 'keywords' => 'X4 PDI, coupe SUV inspection'],
            'x5' => ['title' => 'BMW X5 PDI Checklist', 'description' => 'Verify the boss\'s SUV. Split tailgate, air suspension, and laser light check.', 'keywords' => 'X5 PDI, luxury SUV inspection'],
            'z4' => ['title' => 'BMW Z4 PDI Checklist', 'description' => 'Inspect the convertible. Soft top operation, roadster stance, and engine sound.', 'keywords' => 'Z4 PDI, convertible car inspection']
        ]
    ],
    'land-rover' => [
        'title' => 'Land Rover PDI Checklist | Luxury Off-Road Inspection',
        'description' => 'Verify your Range Rover or Defender. Inspect air suspension, Pivi Pro, and leather interiors.',
        'keywords' => 'Land Rover PDI, Range Rover inspection, Defender checklist, luxury SUV check',
        'models' => [
            'defender' => [
                'title' => 'Land Rover Defender PDI | Icon Inspection Guide',
                'description' => 'Inspect the Defender. Check off-road screens, accessory fitment, and paint quality.',
                'keywords' => 'Defender PDI, offroad inspection, Land Rover check'
            ],
            'range rover' => [
                'title' => 'Range Rover PDI Checklist | Ultimate Luxury Check',
                'description' => 'The ultimate luxury SUV needs a detailed check. Massage seats, air suspension, and paint finish.',
                'keywords' => 'Range Rover PDI, luxury car inspection, SUV checklist'
            ],
            'range rover sport' => [
                'title' => 'Range Rover Sport PDI | Sport SUV Inspection',
                'description' => 'Check the Sport. Dynamic air suspension, Pivi Pro, and performance checks.',
                'keywords' => 'RR Sport PDI, luxury sport SUV'
            ],
            'velar' => [
                'title' => 'Range Rover Velar PDI | Avant-Garde Check',
                'description' => 'Inspect the beautiful Velar. Flush handles, dual screens, and leather care.',
                'keywords' => 'Velar PDI, luxury SUV check'
            ],
            'discovery' => [
                'title' => 'Land Rover Discovery PDI | Family SUV Check',
                'description' => 'Verify the versatile Discovery. 7 seats, intelligent seat fold, and off-road capability.',
                'keywords' => 'Discovery PDI, family SUV inspection'
            ]
        ]
    ],
    'ford' => [
        'title' => 'Ford PDI Checklist | Tough Build Inspection',
        'description' => 'Inspect your Ford. Check Endeavour\'s gearbox, Mustang\'s engine, and EcoSport\'s features.',
        'keywords' => 'Ford PDI, Ford inspection, Mustang checklist, Endeavour check',
        'models' => [
            'endeavour' => [
                'title' => 'Ford Endeavour PDI | SUV Inspection Guide',
                'description' => 'Check the Everest/Endeavour. 10-speed auto check, sunroof drainage, and 4x4 engagement.',
                'keywords' => 'Endeavour PDI, Ford SUV inspection'
            ],
            'mustang' => [
                'title' => 'Ford Mustang PDI Checklist | Muscle Car Inspection',
                'description' => 'Verify the pony car. Engine break-in status, tyre condition, and exhaust valve check.',
                'keywords' => 'Mustang PDI, sports car inspection'
            ],
            'ecosport' => [
                'title' => 'Ford EcoSport PDI Checklist | Compact SUV Check',
                'description' => 'Check the EcoSport. SYNC 3, build quality, and rear door operation.',
                'keywords' => 'EcoSport PDI, compact SUV check'
            ],
            'figo' => [
                'title' => 'Ford Figo PDI Checklist | Hatchback Inspection',
                'description' => 'Inspect the fun-to-drive Figo. 6 airbags check, engine health, and AC.',
                'keywords' => 'Figo PDI, hatchback check'
            ],
            'aspire' => [
                'title' => 'Ford Aspire PDI Checklist | Sedan Inspection',
                'description' => 'Check the Aspire. Boot functionality, rear armrest, and sync system.',
                'keywords' => 'Aspire PDI, sedan inspection'
            ]
        ]
    ],
    'citroen' => [
        'title' => 'Citroen PDI Checklist | Comfort & Design Inspection',
        'description' => 'Inspect your Citroen C3 or C5. Verify suspension comfort, quirky interior buttons, and paint.',
        'keywords' => 'Citroen PDI, C3 inspection, C5 Aircross checklist',
        'models' => [
            'c3' => [
                'title' => 'Citroen C3 PDI Checklist | Hatchback Inspection',
                'description' => 'Check the C3. Touchscreen responsiveness, manual AC cooling, and orange pack fitment.',
                'keywords' => 'C3 PDI, hatchback inspection, budget car check'
            ],
            'ec3' => [
                'title' => 'Citroen eC3 PDI Checklist | EV Hatchback Check',
                'description' => 'Inspect the electric C3. Charging port, battery status, and silent drive check.',
                'keywords' => 'eC3 PDI, electric car inspection'
            ],
            'c5 aircross' => [
                'title' => 'Citroen C5 Aircross PDI | Comfort SUV Check',
                'description' => 'Verify the C5. Magic carpet ride suspension check, panoramic sunroof, and rear seat flexibility.',
                'keywords' => 'C5 Aircross PDI, SUV inspection, comfort check'
            ],
            'basalt' => [
                'title' => 'Citroen Basalt PDI | Coupe SUV Inspection',
                'description' => 'Check the stylish Basalt. Coupe roofline, finish, and features check.',
                'keywords' => 'Basalt PDI, coupe SUV check'
            ],
            'c3 aircross' => [
                'title' => 'Citroen C3 Aircross PDI | 7-Seater Inspection',
                'description' => 'Inspect the versatile Aircross. 7-seat removable mechanism, roof AC vents, and turbo engine.',
                'keywords' => 'C3 Aircross PDI, 7 seater check'
            ]
        ]
    ]
];

// --- LOGIC TO APPLY METADATA ---

$found_override = null;

if ($brand_param) {
    // Normalize logic
    // We try to match the URL slug to the keys in $seo_data. 
    // Usually keys are lower-kebab-case. URL param is also usually that.
    $brand_key = strtolower($brand_param);

    // Direct match check
    $brand_target = null;
    if (isset($seo_data[$brand_key])) {
        $brand_target = $brand_key;
    } elseif (isset($seo_data[str_replace(' ', '-', $brand_key)])) {
        $brand_target = str_replace(' ', '-', $brand_key);
    }

    if ($brand_target) {
        // If Model is present, check inside 'models' key
        if ($model_param) {
            $model_key = strtolower(urldecode($model_param));
            $model_key_spaced = str_replace('-', ' ', $model_key);

            if (isset($seo_data[$brand_target]['models'])) {
                // Try to find model match
                // We loop because sometimes keys might be 'swift' but param is 'swift-dzire' or similar variances, 
                // though here we assume strict key matching based on the array above.
                foreach ($seo_data[$brand_target]['models'] as $mKey => $mData) {
                    // Simple loose check: if param contains key or key equals param
                    // Also check for spaced variant
                    if ($mKey == $model_key || $mKey == $model_key_spaced || strpos($model_key, $mKey) !== false) {
                        $found_override = $mData;
                        break;
                    }
                }
            }
        }

        // If we haven't found a model specific override (or didn't ask for one), use the brand one
        if (!$found_override && !$model_param) {
            $found_override = $seo_data[$brand_target];
        } else if (!$found_override && $model_param) {
            // If model was asked but not found in our specific list, we can fallback to brand
            // OR we can rely on the dynamic auto-generation below.
            // Let's rely on auto-generation for specific model details if not explicitly defined to avoid generic brand titles on model pages.
        }
    }
}

// Apply Overrides if found
if ($found_override) {
    if (!empty($found_override['title']))
        $title = $found_override['title'];
    if (!empty($found_override['description']))
        $description = $found_override['description'];
    if (!empty($found_override['keywords']))
        $keywords = $found_override['keywords'];
} else {
    // --- AUTO GENERATION FALLBACK ---
    // This runs if the specific brand/model isn't in our hardcoded list above

    // Resolve display names first if not already done
    if ($brand_param && isset($carData)) {
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

    // Simple formatter if not found in carData
    if (empty($brandNameDisplay) && $brand_param)
        $brandNameDisplay = ucwords(str_replace('-', ' ', urldecode($brand_param)));
    if (empty($modelNameDisplay) && $model_param)
        $modelNameDisplay = ucwords(str_replace('-', ' ', urldecode($model_param)));

    if ($model_param && $brand_param) {
        $title = "$brandNameDisplay $modelNameDisplay PDI Checklist | Complete Inspection Guide - PDICARS";
        $description = "Download the ultimate Pre-Delivery Inspection (PDI) checklist for $brandNameDisplay $modelNameDisplay. Check for common issues, electronics, paint, and engine health.";
        $keywords = "$brandNameDisplay $modelNameDisplay PDI, $modelNameDisplay inspection checklist, new $modelNameDisplay issues, $brandNameDisplay defects";
    } elseif ($brand_param) {
        $title = "$brandNameDisplay PDI Checklist | Models & Common Issues - PDICARS";
        $description = "Select your $brandNameDisplay model to get a tailored Pre-Delivery Inspection checklist. Avoid factory defects in your new $brandNameDisplay.";
        $keywords = "$brandNameDisplay PDI, $brandNameDisplay inspection, $brandNameDisplay common issues, new $brandNameDisplay verification";
    } else {
        // Page Specific Overrides
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
}
?>