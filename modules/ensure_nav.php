<?php
// ensure_nav.php
// Run this script from your project root (php modules/ensure_nav.php)
// It will insert include for _nav_ui.php into lesson.php and exercises.php files if missing.

$root = __DIR__ . DIRECTORY_SEPARATOR;
$dirs = scandir($root);
foreach ($dirs as $d) {
    if ($d === '.' || $d === '..') continue;
    $path = $root . $d;
    if (!is_dir($path)) continue;
    if (!preg_match('/^\d{2}_/', $d)) continue;

    foreach (['lesson.php','exercises.php'] as $file) {
        $f = $path . DIRECTORY_SEPARATOR . $file;
        if (!file_exists($f)) continue;
        $content = file_get_contents($f);
        if (strpos($content, "_nav_ui.php") !== false) {
            echo "OK: $d/$file already has nav\n";
            continue;
        }
        // insert include after first <body> tag
        $new = preg_replace("#<body(.*?)>#is", "<body$1>\n    <?php include __DIR__ . '/../_nav_ui.php'; ?>", $content, 1);
        if ($new === null) {
            echo "ERROR: failed to modify $d/$file\n";
            continue;
        }
        // backup
        copy($f, $f . '.bak');
        file_put_contents($f, $new);
        echo "Updated: $d/$file (backup created)\n";
    }
}

echo "Done. Review changes and remove .bak files when satisfied.\n";
