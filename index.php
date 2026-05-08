<?php

$markdown = file_get_contents(__DIR__ . "/dictionary/docs_sample/uebersicht.md");
$baseDir = __DIR__ . "/dictionary/docs_sample/test";

if (!is_dir($baseDir)) {
    mkdir($baseDir, 0777, true);
}

$currentFolder = null;
$currentTitle = null;

$lines = explode("\n", $markdown);

$nav = [
    'nav' => []
];

foreach ($lines as $line) {
    $line = trim($line);

    // ## Überschrift = Ordner
    if (preg_match('/^###\s+(.+)$/', $line, $matches)) {

        $currentTitle = trim($matches[1]);
        $folderName = makeSafeName($currentTitle);

        $currentFolder = $baseDir . "/" . $folderName;

        if (!is_dir($currentFolder)) {
            mkdir($currentFolder, 0777, true);
        }

        $nav[] = [];
        $nav['nav'][] = [
            $currentTitle => []
        ];

        continue;
    }

    // Aufzählungspunkt = Datei
    if ($currentFolder && preg_match('/^\*\s+(.+)$/', $line, $matches)) {

        $title = trim($matches[1]);

        $fileName = makeSafeName($title) . ".md";
        $relativePath = makeSafeName($currentTitle) . "/" . $fileName;

        $filePath = $currentFolder . "/" . $fileName;

        if (!file_exists($filePath)) {
            file_put_contents($filePath, "# " . $title . "\n");
        }

        $lastIndex = count($nav['nav']) - 1;

        $nav['nav'][$lastIndex][$currentTitle][] = [
            $title => $relativePath
        ];
    }
}

// YAML erzeugen
$yaml = "nav:\n";

foreach ($nav['nav'] as $section) {

    foreach ($section as $sectionTitle => $items) {

        $yaml .= '  - "' . $sectionTitle . "\":" . "\n";

        foreach ($items as $item) {

            foreach ($item as $title => $path) {

                $yaml .= '      - "' . $title . '": "' . $path . '"' . "\n";
            }
        }

        $yaml .= "\n";
    }
}

file_put_contents($baseDir . "/nav.yml", $yaml);

echo sprintf('<pre>%s</pre>', $yaml);

function makeSafeName(string $text): string
{
    $text = trim($text);

    $replacements = [
        'Ä' => 'Ae',
        'Ö' => 'Oe',
        'Ü' => 'Ue',
        'ä' => 'ae',
        'ö' => 'oe',
        'ü' => 'ue',
        'ß' => 'ss',
    ];

    $text = strtr($text, $replacements);

    $text = strtolower($text);

    $text = preg_replace('/[^a-z0-9\s-]/', '', $text);

    $text = preg_replace('/[\s-]+/', '-', $text);

    return trim($text, '-');
}
