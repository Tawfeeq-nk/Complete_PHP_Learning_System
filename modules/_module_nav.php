<?php
// Renders previous/next module links based on folder ordering.
if (!defined('PFZ_MODULE_NAV_INCLUDED')) {
    define('PFZ_MODULE_NAV_INCLUDED', true);

    $root = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR;
    // list module folders
    $entries = array_filter(scandir($root), function ($e) {
        return preg_match('/^\d{2}_/', $e); });
    sort($entries);

    // determine current module folder (two levels: modules/<xx_name>/lesson.php includes this file, so __DIR__ is modules/<xx_name>)
    $currentDir = basename(__DIR__);
    // try to find index of current
    $index = array_search($currentDir, $entries, true);
    $prev = ($index !== false && $index > 0) ? $entries[$index - 1] : null;
    $next = ($index !== false && $index < count($entries) - 1) ? $entries[$index + 1] : null;

    echo '<div style="display:flex;gap:10px;margin-bottom:18px;flex-wrap:wrap">';
    if ($prev) {
        $pnum = substr($prev, 0, 2);
        echo '<a href="../' . htmlspecialchars($prev) . '/lesson.php' . '" class="btn" style="background:#f0f2ff;color:#667eea;padding:8px 12px;border-radius:6px;text-decoration:none;">← Module ' . $pnum . '</a>';
    } else {
        echo '<span style="padding:8px 12px;border-radius:6px;background:#f3f4f6;color:#999;">Start</span>';
    }
    echo '<a href="../index.php" class="btn" style="padding:8px 12px;border-radius:6px;background:#fff;border:1px solid #e5e7eb;color:#333;text-decoration:none;">All Modules</a>';
    if ($next) {
        $nnum = substr($next, 0, 2);
        echo '<a href="../' . htmlspecialchars($next) . '/lesson.php' . '" class="btn" style="background:#667eea;color:#fff;padding:8px 12px;border-radius:6px;text-decoration:none;">Module ' . $nnum . ' →</a>';
    } else {
        echo '<span style="padding:8px 12px;border-radius:6px;background:#f3f4f6;color:#999;">End</span>';
    }
    echo '</div>';
}
