# Asset

*Generate cache busted web assets URLs.*

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
   |- index.php
|- src
|- templates
...
```

Create the AssetHelper and start generating cache busted assets URLs:

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

For use with a PSR-11 container, you can also use the `ConfigProvider` supplied.
