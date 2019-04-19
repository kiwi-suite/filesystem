<?php
/**
 * @link https://github.com/ixocreate
 * @copyright IXOCREATE GmbH
 * @license MIT License
 */

declare(strict_types=1);

namespace Ixocreate\Filesystem\Storage\Factory;

use Ixocreate\Filesystem\Adapter\FilesystemAdapterSubManager;
use Ixocreate\Filesystem\Storage\StorageConfig;
use Ixocreate\ServiceManager\FactoryInterface;
use Ixocreate\ServiceManager\ServiceManagerInterface;
use League\Flysystem\Filesystem;

final class StorageFactory implements FactoryInterface
{
    /**
     * @param ServiceManagerInterface $container
     * @param $requestedName
     * @param array|null $options
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @return mixed
     */
    public function __invoke(ServiceManagerInterface $container, $requestedName, array $options = null)
    {
        /** @var StorageConfig $storageConfig */
        $storageConfig = $container->get(StorageConfig::class);

        $params = $storageConfig->getStorageParams($requestedName);

        $adapter = $container->get(FilesystemAdapterSubManager::class)->build($params['type'], $params['options']);

        return new Filesystem($adapter);
    }
}
