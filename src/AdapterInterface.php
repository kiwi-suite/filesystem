<?php
/**
 * @link https://github.com/ixocreate
 * @copyright IXOCREATE GmbH
 * @license MIT License
 */

declare(strict_types=1);

namespace Ixocreate\Filesystem;

interface AdapterInterface
{
    public function adapter(): \League\Flysystem\AdapterInterface;
}