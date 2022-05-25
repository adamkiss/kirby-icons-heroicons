<h1 align="center">Heroicons for Kirby</h1>

<p align="center">
  <img src="https://raw.githubusercontent.com/tailwindlabs/heroicons/master/.github/logo.svg" alt="Heroicons">
</p>

<p align="center">
  A set of 450+ free MIT-licensed high-quality SVG icons for you to use in your Kirby CMS Projects. <br>Packaged as a set of Kirby snippets, allowing you to embed them easily. Check out the [original project](https://github.com/tailwindlabs/heroicons) for more information.
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

// or add additional classes
snippet('heroicons/ouline/check', [
    'class' => 'red-color',
    'strokeWidth' => 3 // Outline icons have a modifiable stroke width as well
]);
```