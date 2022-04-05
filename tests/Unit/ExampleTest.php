<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_example()
    {
        //This Test Code Here
        //Insert correct port of your local url(welcome page) if deferent from mine
        $data = file_get_contents('http://127.0.0.1:8000/');
        $myString = $data;
        if(strpos($myString, 'Marvin') !== false){
             $this->assertTrue(true);
             print_r('Word was found');
        }else{
            print_r('Word was not found');

            $this->assertTrue(false);
        }

    }
}
