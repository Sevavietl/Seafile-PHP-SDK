<?php

namespace Seafile\Tests;

use GuzzleHttp\Psr7\Response;
use Seafile\Domain\Library;
use Seafile\Tests\TestCase;

/**
 * Library domain test
 *
 * PHP version 5
 *
 * @category  API
 * @package   Seafile\Domain
 * @author    Rene Schmidt DevOps UG (haftungsbeschränkt) & Co. KG <rene@reneschmidt.de>
 * @copyright 2015 Rene Schmidt DevOps UG (haftungsbeschränkt) & Co. KG <rene@reneschmidt.de>
 * @license   https://opensource.org/licenses/MIT MIT
 * @link      https://github.com/rene-s/seafile-php-sdk
 */
class LibraryTest extends TestCase
{
    /**
     * getAll()
     *
     * @return void
     */
    public function testGetAll()
    {
        $libraryDomain = new Library($this->getMockedClient(
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                file_get_contents(__DIR__ . '/../../assets/LibraryTest_getAll.json')
            )
        ));

        $libs = $libraryDomain->getAll();

        $this->assertInternalType('array', $libs);

        foreach ($libs as $lib) {
            $this->assertInstanceOf('Seafile\Type\Library', $lib);
        }
    }

    /**
     * getById()
     *
     * @return void
     */
    public function testGetById()
    {
        $libraryDomain = new Library($this->getMockedClient(
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                file_get_contents(__DIR__ . '/../../assets/LibraryTest_getById.json')
            )
        ));

        $this->assertInstanceOf('Seafile\Type\Library', $libraryDomain->getById('some_id'));
    }
}
