# Heroicons for Kirby

[Heroicons](https://heroicons.com) icons by Refactoring UI, packaged as snippets with the svg code inline for the [Kirby CMS](https://getkirby.com/).

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
snippet('heroicons/ouline/check', ['class' => 'red-color']);
```