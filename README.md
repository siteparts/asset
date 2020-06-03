# Asset

*Generate cache busted asset url.*

## Installation

Via Composer:

```bash
$ composer require siteparts/asset
```

## Usage

The following example assumes that your application is located at
`example.org/app` and you have all your assets in directory `public` in your
project root directory:

```
project-root
|- public
   |- css
      |- style.css
   |- img
      |- image.png
...
```

Create the AssetHelper and you can start generating cache busted asset urls:

```php
use SiteParts\Asset\AssetHelper;

$localPath = "public";
$basePath = "/app";

$assetHelper = new AssetHelper(
	$localPath,
	$basePath
);

$styleUrl = $assetHelper("css/style.css");
// $styleUrl contains e.g. "/app/css/style.css?v=1591103864"

$imageUrl = $assetHelper("img/image.png");
// $imageUrl contains e.g. "/app/img/image.png?v=1591057923"
```
