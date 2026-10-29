<?php
/**
 * Aura Dental Atelier - Dedicated Control Panel Server Router
 * Enables the Control Panel to run as its own standalone application on port 8080.
 */

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Serve static assets from parent assets directory
if (str_starts_with($uri, '/assets/')) {
    $filePath = __DIR__ . $uri;
    if (file_exists($filePath) && !is_dir($filePath)) {
        $ext = pathinfo($filePath, PATHINFO_EXTENSION);
        $mimeTypes = [
            'css'  => 'text/css',
            'js'   => 'application/javascript',
            'jpg'  => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png'  => 'image/png',
            'svg'  => 'image/svg+xml',
            'ico'  => 'image/x-icon',
            'json' => 'application/json'
        ];
        if (isset($mimeTypes[$ext])) {
            header("Content-Type: {$mimeTypes[$ext]}");
        }
        readfile($filePath);
        exit;
    }
}

// API Routes
if (str_starts_with($uri, '/api/')) {
    $apiFile = __DIR__ . '/admin' . $uri;
    if (file_exists($apiFile)) {
        require $apiFile;
        exit;
    }
}

// Control Panel Page Routes
if ($uri === '/' || $uri === '' || $uri === '/index.php' || $uri === '/index') {
    require __DIR__ . '/admin/index.php';
    exit;
}

if ($uri === '/login.php' || $uri === '/login') {
    require __DIR__ . '/admin/login.php';
    exit;
}

if ($uri === '/logout.php' || $uri === '/logout') {
    require __DIR__ . '/admin/logout.php';
    exit;
}

if ($uri === '/doctors.php' || $uri === '/doctors') {
    require __DIR__ . '/admin/doctors.php';
    exit;
}

if ($uri === '/services.php' || $uri === '/services') {
    require __DIR__ . '/admin/services.php';
    exit;
}

// Fallback to admin/index.php or return false
if (file_exists(__DIR__ . '/admin' . $uri)) {
    require __DIR__ . '/admin' . $uri;
    exit;
}

require __DIR__ . '/admin/index.php';
