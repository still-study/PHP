<?php
session_start();
require_once __DIR__ . '/lib.php';

$content = getContent();
if (!empty($content)) {
    echo $content;
}