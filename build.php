<?php
/*
	BUILD SCRIPT

	Takes the all the icons from the heroicons/optimized directory,
	modifies them to add the check for attributes and saves them as PHP files
*/

$solid = new DirectoryIterator(__DIR__ . '/heroicons/optimized/solid');
$outline = new DirectoryIterator(__DIR__ . '/heroicons/optimized/outline');

mkdir(__DIR__ . '/snippets/solid', recursive: true);
mkdir(__DIR__ . '/snippets/outline', recursive: true);

foreach ($solid as $file) {
	if ($file->getType() !== 'file') {
		continue;
	}

	$icon = file_get_contents($file->getPathname());
	$icon = str_replace('<svg', '<svg class="<?= $class ?? \'\' ?>"', $icon);
	$name = __DIR__ . '/snippets/solid/' . str_replace('svg', 'php', $file->getFilename());
	file_put_contents($name, $icon);
}

foreach ($outline as $file) {
	if ($file->getType() !== 'file') {
		continue;
	}

	$icon = file_get_contents($file->getPathname());
	$icon = str_replace('<svg', '<svg class="<?= $class ?? \'\' ?>"', $icon);
	$icon = str_replace('stroke-width="2"', 'stroke-width="<?= $strokeWidth ?? 2 ?>"', $icon);
	$name = __DIR__ . '/snippets/solid/' . str_replace('svg', 'php', $file->getFilename());
	file_put_contents($name, $icon);
}