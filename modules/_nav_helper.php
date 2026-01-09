<?php
/**
 * Navigation Helper for Module Pages
 * Include this file at the top of any module lesson/exercise page
 */

function renderModuleNav($moduleNumber, $moduleTitle, $isExercise = false)
{
    $uplink = $isExercise ? "lesson.php" : "exercises.php";
    $uptext = $isExercise ? "View Lesson" : "Try Exercises";
    $moduleDir = str_pad($moduleNumber, 2, '0', STR_PAD_LEFT) . '_' . str_replace(' ', '_', strtolower($moduleTitle));

    echo '<div style="background:#f8f9fa;padding:15px;border-radius:8px;margin-bottom:20px;display:flex;gap:15px;flex-wrap:wrap;align-items:center;">';
    echo '<a href="../index.php" style="color:#667eea;text-decoration:none;font-weight:500;">← Back to Modules</a>';
    echo '<span style="color:#ddd;">|</span>';
    echo '<a href="' . $uplink . '" style="color:#667eea;text-decoration:none;font-weight:500;">' . $uptext . ' →</a>';
    echo '<span style="color:#ddd;">|</span>';
    echo '<a href="../../index.php" style="color:#667eea;text-decoration:none;font-weight:500;">Home</a>';
    echo '<span style="color:#ddd;">|</span>';
    echo '<a href="../../projects/index.php" style="color:#667eea;text-decoration:none;font-weight:500;">Projects</a>';
    echo '</div>';
}

function renderModuleFooter($moduleNumber, $moduleTitle)
{
    $moduleDir = str_pad($moduleNumber, 2, '0', STR_PAD_LEFT) . '_' . str_replace(' ', '_', strtolower($moduleTitle));

    echo '<div style="margin-top:40px;padding-top:20px;border-top:2px solid #ddd;">';
    echo '<p style="color:#666;">';
    echo '<a href="../index.php" style="color:#667eea;text-decoration:none;font-weight:500;">← Back to Modules</a> | ';
    echo '<a href="../../START_HERE.php" style="color:#667eea;text-decoration:none;font-weight:500;">Dashboard</a> | ';
    echo '<a href="../../LEARNING_PATH.php" style="color:#667eea;text-decoration:none;font-weight:500;">Learning Path</a>';
    echo '</p>';
    echo '</div>';
}
?>