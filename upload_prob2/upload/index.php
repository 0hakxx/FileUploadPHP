<?php
// upload/index.php
if (!isset($_SESSION['user'])) {
    http_response_code(403);
    echo "403 Forbidden - You don't have permission to access this directory.";
    exit;
}