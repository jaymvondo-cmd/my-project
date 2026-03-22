<?php
// Define the base URL for the project
// If the application is served from the root of the domain, use '/'
// This ensures that assets like /css/theme.css are correctly found.
if (!defined('BASE_URL')) {
    define('BASE_URL', '/');
}

// Absolute path to the project root for local includes
if (!defined('ROOT_DIR')) {
    define('ROOT_DIR', dirname(__DIR__) . '/');
}
?>
