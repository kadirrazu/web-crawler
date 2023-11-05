<?php
$sourceURL="https://www.rokomari.com/book/author/1";

$content=file_get_contents($sourceURL);

$content = strip_tags($content,'<li class="breadcrumb-item active" aria-current="page">');

echo $content;

