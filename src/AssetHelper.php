<?php

declare(strict_types=1);

namespace SiteParts\Asset;

use function file_exists;
use function filemtime;
use function http_build_query;
use function ltrim;
use function rtrim;

class AssetHelper
{
	/** @var string */
	private $basePath;

	/** @var string */
	private $localPath;

	public function __construct(string $localPath = '.', string $basePath = '/')
	{
		$this->setBasePath($basePath);
		$this->setLocalPath($localPath);
	}

	public function __invoke(string $relPath) : string
	{
		$basePath = rtrim($this->getBasePath(), '/');
		$localPath = rtrim($this->getLocalPath(), '/');
		$relPath = ltrim($relPath, '/');

		$assetPath = $basePath . '/' . $relPath;
		$localAssetPath = $localPath . '/' . $relPath;

		if (file_exists($localAssetPath)) {
			$assetPath .= '?' . http_build_query(['v' => filemtime($localAssetPath)]);
		}

		return $assetPath;
	}

	public function generate(string $relPath) : string
	{
		return $this($relPath);
	}

	public function getBasePath() : string
	{
		return $this->basePath;
	}

	public function getLocalPath() : string
	{
		return $this->localPath;
	}

	public function setBasePath(string $path) : void
	{
		$this->basePath = '/' . ltrim($path, '/');
	}

	public function setLocalPath(string $path) : void
	{
		$this->localPath = $path;
	}
}
