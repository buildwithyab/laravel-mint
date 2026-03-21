<?php

namespace Yab\Mint\Tests;

use PHPUnit\Framework\Attributes\Test;
use Yab\Mint\Actions\Inititals;
use Yab\Mint\Tests\TestCase;

class InitialsTest extends TestCase
{
    #[Test]
    public function it_can_generate_initials()
    {
        $result = (new Inititals)->generate('Chris Blackwell');
        $this->assertEquals('CB', $result);
    }

    #[Test]
    public function it_can_generate_initials_from_single_name()
    {
        $result = (new Inititals)->generate('Chris');
        $this->assertEquals('CH', $result);
    }

    #[Test]
    public function it_can_generate_initials_from_multiple_names()
    {
        $result = (new Inititals)->generate('Chris Shane Blackwell');
        $this->assertEquals('CB', $result);
    }
}
