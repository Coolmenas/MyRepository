// app/database/seeds/UserTableSeeder.php

<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(
			array(
			'name'     => 'Chris Sevilleja',
			'username' => 'sevilayha',
			'email'    => 'chris@scotch.io',
			'password' => Hash::make('awesome'),
			'x'		   =>54.810059,
			'y'		   =>23.869858	));
		User::create(
			array(
			'name'     => 'Chris1 Sevilleja',
			'username' => 'sevilayha1',
			'email'    => 'chris2@scotch.io',
			'password' => Hash::make('awesome'),
			'x'		   =>54.811,
			'y'		   =>23.865888
			));
	}

}