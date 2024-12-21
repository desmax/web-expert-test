<?php

declare(strict_types=1);

namespace App\Tests\Functional\Infra\Controller;

use App\Domain\Entity\User\User;
use App\Infra\Model\UserId;
use App\Tests\Functional\WebTestCase;
use Doctrine\ORM\EntityManagerInterface;

class FeedControllerTest extends WebTestCase
{
    public function testFeed(): void
    {
        // Debug environment variables
        echo "APP_ENV: " . $_SERVER['APP_ENV'] . "\n";
        echo "KERNEL_CLASS: " . $_SERVER['KERNEL_CLASS'] . "\n";

        // Debug kernel configuration
        $kernel = static::bootKernel();
        echo "Kernel environment: " . $kernel->getEnvironment() . "\n";

        // Debug framework.test parameter
        $container = $kernel->getContainer();
        echo "framework.test value: " . ($container->hasParameter('framework.test') ? 'true' : 'false') . "\n";

        // Your original test
//        $browser = static::createClient()->request('GET', '/');
//        self::assertStringContainsString('Here will be the news feed', $browser->html());
    }
}
