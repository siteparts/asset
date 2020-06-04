<?php

declare(strict_types=1);

namespace SiteParts\Asset;

use Psr\Container\ContainerInterface;

class AssetHelperFactory
{
	public function __invoke(ContainerInterface $container) : AssetHelper
	{
		$config = $container->has('config') ? $container->get('config') : [];
		$assetConfig = $config['asset'] ?? [];

		return new AssetHelper(
			$assetConfig['local_path'] ?? '.',
			$config['base_path'] ?? '/'
		);
	}
}
