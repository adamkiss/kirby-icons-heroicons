<?php
/*
	BUILD SCRIPT

	Takes the all the icons from the heroicons/optimized directory,
	modifies them to add the check for attributes and saves them as PHP files
*/

mkdir(__DIR__ . '/snippets/solid', recursive: true);
mkdir(__DIR__ . '/snippets/outline', recursive: true);

foreach (new DirectoryIterator(__DIR__ . '/heroicons/optimized/solid') as $file) {
	if ($file->getType() !== 'file') {
		continue;
	}

	$icon = file_get_contents($file->getPathname());
	$icon = str_replace('<svg', '<svg class="<?= $class ?? \'\' ?>"', $icon);
	$name = __DIR__ . '/snippets/solid/' . str_replace('svg', 'php', $file->getFilename());
	file_put_contents($name, $icon);
}

foreach (new DirectoryIterator(__DIR__ . '/heroicons/optimized/outline') as $file) {
	if ($file->getType() !== 'file') {
		continue;
	}

	$icon = file_get_contents($file->getPathname());
	$icon = str_replace('<svg', '<svg class="<?= $class ?? \'\' ?>"', $icon);
	$icon = str_replace('stroke-width="2"', 'stroke-width="<?= $strokeWidth ?? 2 ?>"', $icon);
	$name = __DIR__ . '/snippets/outline/' . str_replace('svg', 'php', $file->getFilename());
	file_put_contents($name, $icon);
}

$snippets = [];
foreach(new DirectoryIterator(__DIR__ . '/snippets/solid') as $file) {
	if ($file->getType() !== 'file') { continue; }

	$baseName = $file->getBasename('.php');
	$loadPath = "/snippets/solid/{$baseName}.php";
	$snippets []= compact('baseName', 'loadPath');
}
foreach(new DirectoryIterator(__DIR__ . '/snippets/outline') as $file) {
	if ($file->getType() !== 'file') { continue; }

	$baseName = $file->getBasename('.php');
	$loadPath = "/snippets/outline/{$baseName}.php";
	$snippets []= compact('baseName', 'loadPath');
}
$snippetsJoined = implode("\n", array_map(function($snippet) {
	return "		'{$snippet['baseName']}' => __DIR__ . '{$snippet['loadPath']}',";
}, $snippets));

file_put_contents('index.php', <<<PHP
<?php
use Kirby\Cms\App;

App::plugin('adamkiss/kirby-icons-heroicons', [
	'snippets' => [
{$snippetsJoined}
	]
]);
PHP);