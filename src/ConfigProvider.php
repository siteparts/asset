<?php

declare(strict_types=1);

namespace SiteParts\Asset;

class ConfigProvider
{
	public function __invoke() : array
	{
		return [
			'dependencies' => $this->getDependencies(),
		];
	}

	public function getDependencies() : array
	{
		return [
			'factories' => [
				AssetHelper::class => AssetHelperFactory::class,
			],
		];
	}
}
