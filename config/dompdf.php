<?php


//pdf作成ボタン用　機能追加
return [
    'pdf' => [
        'enabled' => true,
        'binary' => 'C:\path\to\wkhtmltopdf\bin\wkhtmltopdf.exe',
        'timeout' => false,
        'options' => [],
        'env' => [],
    ],
    'image' => [
        'enabled' => true,
        'binary' => 'C:\path\to\wkhtmltoimage\bin\wkhtmltoimage.exe', // このパスを修正
        'timeout' => false,
        'options' => [],
        'env' => [],
    ],
    "font_dir" => storage_path('fonts/ipaexg'),
    "font_cache" => storage_path('fonts/ipaexm'),
    'show_warnings' => false,
    'default_font' => 'ipaexg',
    'orientation' => 'portrait',
    'defines' => [
        'DOMPDF_ENABLE_AUTOLOAD' => false,
        'DOMPDF_ENABLE_CSS_FLOAT' => true,
    ],
];

