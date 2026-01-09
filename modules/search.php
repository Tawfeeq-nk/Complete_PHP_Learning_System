<?php
// Modules search page - server generates module list, client filters instantly
function getModules() {
    $path = __DIR__ . DIRECTORY_SEPARATOR;
    $entries = scandir($path);
    $modules = [];
    foreach ($entries as $e) {
        if ($e === '.' || $e === '..') continue;
        if (is_dir($path . $e) && preg_match('/^\d{2}_/', $e)) {
            $modules[] = $e;
        }
    }
    sort($modules);
    return $modules;
}
$modules = getModules();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Search Modules</title>
    <style>
        body{font-family:Segoe UI, Tahoma, Geneva, sans-serif;background:#f5f7fb;padding:20px}
        .container{max-width:1100px;margin:0 auto}
        .nav-wrap{margin-bottom:18px}
        .search-box{display:flex;gap:8px;margin-bottom:18px}
        .search-box input{flex:1;padding:12px;border-radius:8px;border:1px solid #ddd}
        .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:14px}
        .card{background:#fff;padding:16px;border-radius:10px;box-shadow:0 8px 30px rgba(0,0,0,0.06)}
        .card h4{margin:0 0 8px 0;color:#667eea}
        .muted{color:#666;font-size:0.95rem}
        .footer{margin-top:20px;text-align:center;color:#777}
    </style>
</head>
<body>
    <div class="container">
        <div class="nav-wrap"><?php include __DIR__ . '/_nav_ui.php'; ?></div>
        <h1>Search Modules</h1>
        <p class="muted">Type to filter modules by name or number.</p>
        <div class="search-box">
            <input id="q" placeholder="Search modules (e.g. 'database' or '13')" autofocus />
            <button id="clear">Clear</button>
        </div>

        <div id="grid" class="grid">
            <?php foreach($modules as $m):
                $num = substr($m,0,2);
                $label = str_replace('_',' ',substr($m,3));
            ?>
            <div class="card" data-title="<?= htmlspecialchars($label) ?>" data-num="<?= $num ?>">
                <h4>Module <?= $num ?> — <?= htmlspecialchars(ucwords($label)) ?></h4>
                <p class="muted">Folder: <?= htmlspecialchars($m) ?></p>
                <p style="margin-top:10px"><a href="<?= $m ?>/lesson.php">Open Lesson</a> • <a href="<?= $m ?>/exercises.php">Exercises</a></p>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="footer"><a href="index.php">← Back to Modules</a></div>
    </div>

    <script>
        const q = document.getElementById('q');
        const grid = document.getElementById('grid');
        const cards = Array.from(grid.children);
        const clear = document.getElementById('clear');
        function filter(value){
            value = value.trim().toLowerCase();
            cards.forEach(c=>{
                const title = c.dataset.title.toLowerCase();
                const num = c.dataset.num.toLowerCase();
                if(!value || title.includes(value) || num.includes(value)) c.style.display='block'; else c.style.display='none';
            });
        }
        q.addEventListener('input', e=>filter(e.target.value));
        clear.addEventListener('click', ()=>{ q.value=''; filter(''); q.focus(); });
    </script>
</body>
</html>
