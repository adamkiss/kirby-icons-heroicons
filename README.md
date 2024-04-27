<h1 align="center">Heroicons for Kirby</h1>

<p align="center">
  <a href="https://heroicons.com/#gh-light-mode-only" target="_blank">
    <img src="https://raw.githubusercontent.com/tailwindlabs/heroicons/master/.github/logo-light.svg" alt="Heroicons" width="300">
  </a>
  <a href="https://heroicons.com/#gh-dark-mode-only" target="_blank">
    <img src="https://raw.githubusercontent.com/tailwindlabs/heroicons/master/.github/logo-dark.svg" alt="Heroicons" width="300">
  </a>
</p>

<p align="center">
  A set of 450+ free MIT-licensed high-quality SVG icons for you to use in your Kirby CMS Projects. <br>Packaged as a set of Kirby snippets, allowing you to embed them easily. Check out the <a href="https://github.com/tailwindlabs/heroicons">original project</a> for more information.
<p>

## Installation

Either download the folder and copy it to your `site/plugins/` folder, or with composer:

``` bash
composer require adamkiss/kirby-icons-heroicons
```

## Usage

``` php
// use an icon as is
snippet('heroicons/solid/check');

// or
snippet('heroicons/mini/check');

// or add additional classes
snippet('heroicons/outline/check', [
    'class' => 'red-color',
    'attributes' => 'aria-hidden="true" data-hook="something"' // You can also add custom attributes
    'strokeWidth' => 3 // Outline icons have a modifiable stroke width as well
]);
```

Available variants/sizes:

- outline (24px)
- solid (24px)
- mini (20px)
- micro (16px)

By default, no class is used, and the default attribute is `aria-hidden="true"`. If you add an attribute and want to keep the `aria-hidden` attribute, you have to add it as well.

## Icon Field support (WIP)

When you install Heroicons and Icon Field at the same time, you can use all Heroicons as the options in the Icon Field:

```php
// in your config.php, configure icon-field to use Heroicons by default
'tobimori.icon-field' => [
    'folder' => fn() => \Heroicons::folder(),
    'sprite' => fn() => \Heroicons::sprite(),
],
```

```yml
# In your bluprints, keep the icon field folder/sprite blank for the
# default to to be picked upw
fields:
  icon:
    label: Icon
    type: icon
    max: 1
```

And then, once the you've set up the icon in the panel, you can use it in your templates/snippets like so:

```php
<?= snippet("heroicons/mini/{$page->icon()}") ?>
```

For more information, you can check out the [Kirby Icon Field documentation](https://github.com/tobimori/kirby-icon-field#readme).

## License

MIT (c) 2024 Adam Kiss for the plugin, Tailwind Labs for the Heroicons