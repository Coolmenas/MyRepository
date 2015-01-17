<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}
	public function testUsersAviability(){
		$crawler = $this->client->request('GET', '/users');

		$this->assertTrue($this->client->getResponse()->isOk());
	}
	public function testTaxisAviability(){
		$crawler = $this->client->request('GET', '/taxis');

		$this->assertTrue($this->client->getResponse()->isOk());
	}
	public function testUserPostCorrectData(){
		//$this->setExpectedException('Exception');
		$this->seed();
		DB::table('users')->insert(
    		array(
    			'email' => 'john@example.com',
    			'username' => 'test',
	    		'password' => Hash::make('passtest'),
	            'name' => 'asddd',
	            'x'  => 55.5,
	            'y'  => 28.5)
		);
		
    }
    public function testUserPostDuplicateUser(){
		$success = false;
		try {
		$this->seed();
		DB::table('users')->insert(
    		array(
    			'email' => 'john@example.com',
    			'username' => 'test',
	    		'password' => Hash::make('passtest'),
	            'name' => 'asddd',
	            'x'  => 55.5,
	            'y'  => 28.5)
		);
		}catch(\Exception $e){
    		$success = false;
		};
		try {
		DB::table('users')->insert(
    		array(
    			'email' => 'john@example.com',
    			'username' => 'test',
	    		'password' => Hash::make('passtest'),
	            'name' => 'asddd',
	            'x'  => 55.5,
	            'y'  => 28.5)
		);
		}catch(\Exception $e){
    		 $success = true;
		};
		$this->assertTrue($success);
    }
    public function testTaxiPostCorrectData(){
		//$this->setExpectedException('Exception');
		$this->seed();
		DB::table('taxis')->insert(
    		array(
    			'id' => '12',
    			'Name' => 'test',
	    		'password' => Hash::make('passtest'),
	            'phone' => 'asddd',
	            'x'  => 55.5,
	            'y'  => 28.5)
		);
		
    }
    public function testTaxiPostDuplicateUser(){
		$success = false;
		try {
		$this->seed();
		DB::table('taxis')->insert(
    		array(
    			'id' => '1234',
    			'Name' => 'test',
	    		'password' => Hash::make('passtest'),
	            'phone' => 'asddd',
	            'x'  => 55.5,
	            'y'  => 28.5)
		);
		}catch(\Exception $e){
    		$success = false;
		};
		try {
		DB::table('taxis')->insert(
    		array(
    			'id' => '1234',
    			'Name' => 'test',
	    		'password' => Hash::make('passtest'),
	            'phone' => 'asddd',
	            'x'  => 55.5,
	            'y'  => 28.5)
		);
		}catch(\Exception $e){
    		 $success = true;
		};
		$this->assertTrue($success);
    }


}
