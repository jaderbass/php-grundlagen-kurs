<?php
// Router für PHP Built-in Server - zeigt Verzeichnislisten an

$path = $_SERVER['REQUEST_URI'];
$file = $_SERVER['DOCUMENT_ROOT'] . parse_url($path, PHP_URL_PATH);

// Wenn es eine existierende PHP-Datei ist, führe sie aus
if (is_file($file) && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
    return false;
}

// Wenn es eine andere existierende Datei ist, liefere sie aus
if (is_file($file)) {
    return false;
}

// Wenn es ein Verzeichnis ist, zeige den Inhalt
if (is_dir($file)) {
    $files = scandir($file);
    $relativePath = parse_url($path, PHP_URL_PATH);
    
    echo '<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Index of ' . htmlspecialchars($relativePath) . '</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        h1 { color: #333; border-bottom: 2px solid #4CAF50; padding-bottom: 10px; }
        table { width: 100%; background: white; border-collapse: collapse; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        th { background: #4CAF50; color: white; padding: 12px; text-align: left; }
        td { padding: 10px; border-bottom: 1px solid #ddd; }
        a { color: #2196F3; text-decoration: none; }
        a:hover { text-decoration: underline; }
        tr:hover { background: #f9f9f9; }
        .icon { margin-right: 8px; }
    </style>
</head>
<body>
    <h1>Index of ' . htmlspecialchars($relativePath) . '</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Typ</th>
        </tr>';
    
    // Parent directory link
    if ($relativePath !== '/') {
        echo '<tr><td><a href="../">📁 ..</a></td><td>Übergeordnetes Verzeichnis</td></tr>';
    }
    
    foreach ($files as $item) {
        if ($item === '.' || $item === '..') continue;
        
        $fullPath = $file . '/' . $item;
        $isDir = is_dir($fullPath);
        $icon = $isDir ? '📁' : '📄';
        $type = $isDir ? 'Verzeichnis' : 'Datei';
        $link = rtrim($relativePath, '/') . '/' . $item;
        
        echo '<tr>';
        echo '<td><a href="' . htmlspecialchars($link) . '">' . $icon . ' ' . htmlspecialchars($item) . '</a></td>';
        echo '<td>' . $type . '</td>';
        echo '</tr>';
    }
    
    echo '</table>
</body>
</html>';
    exit;
}

// 404 für alles andere
http_response_code(404);
echo '404 - Datei nicht gefunden';
