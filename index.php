<?php
header('Content-Type: application/json; charset=utf-8');
$json = json_decode(file_get_contents(__DIR__ . '/data.json'), true);
$result = [];
foreach ($json as $first) {
    $result[$first['tag_name']] = [];
    foreach ($first['assets'] as $second) {
        $result[$first['tag_name']][$second['name']] = [
            'browser_download_url' => $second['browser_download_url'],
            'created_at' => $second['created_at'],
            'size' => $second['size']
        ];
    }
    $result[$first['tag_name']][$second['body']] = $first['body'];
}
ksort($result);
echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);
