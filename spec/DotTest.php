<?php

use SelvinOrtiz\Dot\Dot;
use PHPUnit\Framework\TestCase;

/**
 * Class DotTest
 */
class DotTest extends TestCase
{
    public function test_has()
    {
        $input = [
            'name' => [
                'first' => 'Brad',
                'last'  => 'Bell',
            ],
            'spouse' => [
                'name' => [
                    'first' => 'Brandon',
                    'last'  => 'Kelly'
                ],
                'mood' => 'Happy',
                'age'  => '75',
            ],
            'mood' => 'Angry',
            'age'  => 25,
        ];

        $this->assertTrue(Dot::has($input, 'name'));
        $this->assertTrue(Dot::has($input, 'spouse.name.last'));
        $this->assertFalse(Dot::has($input, 'mistress.relationship'));
    }

    public function test_get()
    {
        $input = [
            'name' => [
                'first' => 'Brad',
                'last'  => 'Bell',
            ],
            'spouse' => [
                'name' => [
                    'first' => 'Brandon',
                    'last'  => 'Kelly'
                ],
                'mood' => 'Happy',
                'age'  => '75',
            ],
            'mood' => 'Angry',
            'age'  => 25,
        ];

        $this->assertEquals(25, Dot::get($input, 'age'));
        $this->assertEquals(75, Dot::get($input, 'spouse.age'));
        $this->assertEquals('Kelly', Dot::get($input, 'spouse.name.last'));
    }

    public function test_set()
    {
        $input = [
            'name' => [
                'first' => 'Brad',
                'last'  => 'Bell',
            ],
            'spouse' => [
                'name' => [
                    'first' => 'Brandon',
                    'last'  => 'Kelly'
                ],
                'mood' => 'Happy',
                'age'  => '75',
            ],
            'mood' => 'Angry',
            'age'  => 25,
        ];

        $inputCopy    = $input;
        $expectedCopy = $input;

        $this->assertEquals($input, $inputCopy);
        $this->assertEquals($input, $expectedCopy);

        Dot::set($inputCopy, 'gender', 'Other');
        Dot::set($inputCopy, 'spouse.name.last', 'Bell');

        $expectedCopy['gender']                 = 'Other';
        $expectedCopy['spouse']['name']['last'] = 'Bell';

        $this->assertEquals($expectedCopy, $inputCopy);
        $this->assertNotEquals($input, $inputCopy);
    }

    public function test_delete()
    {
        $input = [
            'name' => [
                'first' => 'Brad',
                'last'  => 'Bell',
            ],
            'spouse' => [
                'name' => [
                    'first' => 'Brandon',
                    'last'  => 'Kelly'
                ],
                'mood' => 'Happy',
                'age'  => '75',
            ],
            'mood' => 'Angry',
            'age'  => 25,
        ];

        $expect = [
            'name' => [
                'first' => 'Brad',
                'last'  => 'Bell',
            ],
            'spouse' => [
                'name' => [
                    'first' => 'Brandon',
                    'last'  => 'Kelly'
                ],
                'age'  => '75',
            ],
            'mood' => 'Angry',
            'age'  => 25,
        ];

        $actual = $input;

        Dot::delete($actual, 'spouse.mood');

        $this->assertNotEquals($input, $actual);
        $this->assertEquals($expect, $actual);
    }

    public function inspect($data)
    {
        fwrite(STDERR, print_r($data));
    }
}
