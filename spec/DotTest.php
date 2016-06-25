<?php

use SelvinOrtiz\Dot\Dot;

/**
 * Class DotTest
 */
class DotTest extends PHPUnit_Framework_TestCase
{
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

    public function inspect($data)
    {
        fwrite(STDERR, print_r($data));
    }
}
