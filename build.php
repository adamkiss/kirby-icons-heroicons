<?php
/*
	BUILD SCRIPT

	Takes the all the icons from the heroicons/optimized directory,
	modifies them to add the check for attributes and saves them as PHP files
*/

@mkdir(__DIR__ . '/snippets/solid', recursive: true);
@mkdir(__DIR__ . '/snippets/outline', recursive: true);
@mkdir(__DIR__ . '/snippets/mini', recursive: true);
@mkdir(__DIR__ . '/snippets/micro', recursive: true);

foreach (new DirectoryIterator(__DIR__ . '/heroicons/optimized/16/solid') as $file) {
	if ($file->getType() !== 'file') {
		continue;
	}

	$icon = file_get_contents($file->getPathname());
	$icon = str_replace('<svg', '<svg class="<?= $class ?? \'\' ?>"', $icon);
	$icon = str_replace('aria-hidden="true" data-slot="icon"', '<?= $attributes ?? \'aria-hidden="true"\' ?>', $icon);
	$name = __DIR__ . '/snippets/micro/' . str_replace('svg', 'php', $file->getFilename());
	file_put_contents($name, $icon);
}

foreach (new DirectoryIterator(__DIR__ . '/heroicons/optimized/20/solid') as $file) {
	if ($file->getType() !== 'file') {
		continue;
	}

	$icon = file_get_contents($file->getPathname());
	$icon = str_replace('<svg', '<svg class="<?= $class ?? \'\' ?>"', $icon);
	$icon = str_replace('aria-hidden="true" data-slot="icon"', '<?= $attributes ?? \'aria-hidden="true"\' ?>', $icon);
	$name = __DIR__ . '/snippets/mini/' . str_replace('svg', 'php', $file->getFilename());
	file_put_contents($name, $icon);
}

foreach (new DirectoryIterator(__DIR__ . '/heroicons/optimized/24/solid') as $file) {
	if ($file->getType() !== 'file') {
		continue;
	}

	$icon = file_get_contents($file->getPathname());
	$icon = str_replace('<svg', '<svg class="<?= $class ?? \'\' ?>"', $icon);
	$name = __DIR__ . '/snippets/solid/' . str_replace('svg', 'php', $file->getFilename());
	$icon = str_replace('aria-hidden="true" data-slot="icon"', '<?= $attributes ?? \'aria-hidden="true"\' ?>', $icon);
	file_put_contents($name, $icon);
}

foreach (new DirectoryIterator(__DIR__ . '/heroicons/optimized/24/outline') as $file) {
	if ($file->getType() !== 'file') {
		continue;
	}

	$icon = file_get_contents($file->getPathname());
	$icon = str_replace('<svg', '<svg class="<?= $class ?? \'\' ?>"', $icon);
	$icon = str_replace('stroke-width="1.5"', 'stroke-width="<?= $strokeWidth ?? 1.5 ?>"', $icon);
	$icon = str_replace('aria-hidden="true" data-slot="icon"', '<?= $attributes ?? \'aria-hidden="true"\' ?>', $icon);
	$name = __DIR__ . '/snippets/outline/' . str_replace('svg', 'php', $file->getFilename());
	file_put_contents($name, $icon);
}

$snippets = [];
foreach(new DirectoryIterator(__DIR__ . '/snippets/micro') as $file) {
	if ($file->getType() !== 'file') { continue; }

	$baseName = $file->getBasename('.php');
	$snippetName = "heroicons/micro/$baseName";
	$loadPath = "/snippets/micro/{$baseName}.php";
	$snippets []= compact('snippetName', 'loadPath');
}
foreach(new DirectoryIterator(__DIR__ . '/snippets/mini') as $file) {
	if ($file->getType() !== 'file') { continue; }

	$baseName = $file->getBasename('.php');
	$snippetName = "heroicons/mini/$baseName";
	$loadPath = "/snippets/mini/{$baseName}.php";
	$snippets []= compact('snippetName', 'loadPath');
}
foreach(new DirectoryIterator(__DIR__ . '/snippets/solid') as $file) {
	if ($file->getType() !== 'file') { continue; }

	$baseName = $file->getBasename('.php');
	$snippetName = "heroicons/solid/$baseName";
	$loadPath = "/snippets/solid/{$baseName}.php";
	$snippets []= compact('snippetName', 'loadPath');
}
foreach(new DirectoryIterator(__DIR__ . '/snippets/outline') as $file) {
	if ($file->getType() !== 'file') { continue; }

	$baseName = $file->getBasename('.php');
	$snippetName = "heroicons/outline/{$baseName}";
	$loadPath = "/snippets/outline/{$baseName}.php";
	$snippets []= compact('snippetName', 'loadPath');
}
$snippetsJoined = implode("\n", array_map(function($snippet) {
	return "		'{$snippet['snippetName']}' => __DIR__ . '{$snippet['loadPath']}',";
}, $snippets));

file_put_contents('index.php', <<<PHP
<?php
use Kirby\Cms\App;

App::plugin('adamkiss/heroicons', [
	'snippets' => [
{$snippetsJoined}
	]
]);
PHP);