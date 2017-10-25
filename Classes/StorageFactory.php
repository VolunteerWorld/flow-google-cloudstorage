<?php
namespace Flownative\Google\CloudStorage;

/*
 * This file is part of the Flownative.Google.CloudStorage package.
 *
 * (c) Robert Lemke, Flownative GmbH - www.flownative.com
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\Flow\Annotations as Flow;
use Vowo\Google\CloudConnect\ConnectFactory;

/**
 * Factory for the Google Cloud Storage service class
 *
 * @Flow\Scope("singleton")
 */
class StorageFactory
{

    /**
     * @Flow\Inject
     * @var ConnectFactory
     */
    protected $connectFactory;

    /**
     * Creates a new Storage instance and authenticates agains the Google API
     *
     * @param string $credentialsProfileName
     * @return \Google\Cloud\Storage\StorageClient
     * @throws Exception
     */
    public function create($credentialsProfileName = 'default')
    {
        $googleCloud = $this->connectFactory->create($credentialsProfileName);
        return $googleCloud->storage();
    }
}
