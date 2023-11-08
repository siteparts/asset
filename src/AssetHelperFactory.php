<?php

declare(strict_types=1);

namespace SiteParts\Asset;

use Psr\Container\ContainerInterface;

class AssetHelperFactory
{
	public function __invoke(ContainerInterface $container) : AssetHelper
	{
		/**
		 * @var array{
		 *     base_path?: string,
		 *     asset?: array{
		 *         local_path?: string,
		 *     },
		 * } $config
		 */
		$config = $container->has('config') ? $container->get('config') : [];

		return new AssetHelper(
			$config['asset']['local_path'] ?? '.',
			$config['base_path'] ?? '/'
		);
	}
}
