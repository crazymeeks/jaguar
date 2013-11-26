<?php

/*
 * This file is part of the Jaguar package.
 *
 * (c) Hyyan Abo Fakher <tiribthea4hyyan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jaguar\Tests\Canvas\Drawable;

use Jaguar\Canvas\Drawable\Pixel;

class PixelTest extends AbstractDrawableTest {

    public function getDrawable() {
        return new Pixel();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEqualsThrowInvalidArgumnetException() {
        $this->getDrawable()->equals('invalid');
    }

    public function testEquals() {
        $pixel = $this->getDrawable();
        $clone = clone $pixel;

        $this->assertTrue($pixel->equals(clone $pixel));

        $clone->getCoordinate()->move(100, 100);
        $this->assertFalse($pixel->equals($clone));

        $clone->getCoordinate()->move(0, 0);
        $clone->getColor()->setRed(255);
        $this->assertFalse($pixel->equals($clone));
    }

    public function testToString() {
        $this->assertInternalType('string', (string) $this->getDrawable());
    }

}
