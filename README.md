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

// or add additional classes
snippet('heroicons/ouline/check', [
    'class' => 'red-color',
    'strokeWidth' => 3 // Outline icons have a modifiable stroke width as well
]);
```
