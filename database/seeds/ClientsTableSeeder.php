<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('clients')->delete();		
		
		$clients = array(
			array( 'name' => 'Skolnik', 'url' => 'skolnik.com',
				array( 'name' => 'CPanel', 'url' => 'skolnik.com/cpanel' ),
				array( 'name' => 'Local', 'url' => 'skolnik.rjm' ),
				array( 'name' => 'phpmyadmin', 'url' => 'server6.sherwoodhosting.com:2083/cpsess5181035222/3rdparty/phpMyAdmin/index.php?login=1&post_login=98688230792783#PMAURL-1:sql.php?db=skolnik_skolnik&table=webideas&server=1&target=&token=3c05041c4fcf54b595e75f8ccda5b9a8' ),
				array( 'name' => 'Blog', 'url' => 'skolnik.com/blog/wp-login.php' ),
				array( 'name' => 'New Newsletter', 'url' => 'skolnik.rjm/admin/newnewsletter.php' ),
				array( 'name' => 'Make Newsletter', 'url' => 'skolnik.rjm/makenewsletter.php' ) ),

			array( 'name' => 'Skolnik Wine', 'url' => 'skolnikwine.com',
				array( 'name' => 'CPanel', 'url' => 'skolnikwine.com/cpanel' ),
				array( 'name' => 'phpmyadmin', 'url' => 'server2.sherwoodhosting.com:2083/cpsess6467926254/3rdparty/phpMyAdmin/index.php?login=1&post_login=15223856651841#PMAURL-0:index.php?db=&table=&server=1&target=&lang=en&collation_connection=utf8_general_ci&token=5e699c49b5e3b9bbc49f78db1c4d5406' ),
				array( 'name' => 'blog', 'url' => 'skolnikwine.com/blog/rjlogin' ),
				array( 'name' => 'Local', 'url' => 'skolnikwine.rjm' ) ),

			array( 'name' => 'Homestaging By Vivian', 'url' => 'homestagingbyvivian.com',
				array( 'name' => 'Admin Control Panel', 'url' => 'homestagingbyvivian.com/admincp' ),
				array( 'name' => 'Local', 'url' => 'newviv.rjm' ) ),

			array( 'name' => 'DGTA', 'url' => 'dgta.org',
				array( 'name' => 'CPanel', 'url' => 'dgta.org/cpanel' ),
				array( 'name' => 'Local', 'url' => 'dgta.rjm' ),
				array( 'name' => 'Test', 'url' => 'dgta.rjmprogramming.com' ),
				array( 'name' => 'Wordpress Login', 'url' => 'dgta.rjmprogramming.com/rjlogin' ),
				array( 'name' => 'Development', 'url' => 'localhost/dgta-wp' ),
				array( 'name' => 'Development Login', 'url' => 'localhost/dgta-wp/wp-admin' ) ),

			array( 'name' => 'WE Train', 'url' => 'wetrainconsulting.com',
				array( 'name' => 'Wordpress Login', 'url' => 'wetrainconsulting.com/wp-admin' ),
				array( 'name' => 'Local', 'url' => 'wetrain.rjm' ) ),

			array( 'name' => 'Executive Coach for Lawyers', 'url' => 'executive-coach-for-lawyers.com',
				array( 'name' => 'Local', 'url' => 'coachforexecutives.rjm' ) ),

			array( 'name' => 'HMF2', 'url' => 'hmf2.com',
				array( 'name' => 'Local', 'url' => 'hmf2.rjm' ) ),
		);
		

		foreach ( $clients as $client ) {
			$id = $this->newClient($client['name'], $client['url'], null);

			foreach ( $client as $k => $link ) {
				if ( is_numeric($k) ) {
					$this->newClient($link['name'], $link['url'], $id);
				}
			}
		}		
  }
	
	public function newClient($name, $url, $id=null) {
		
		$client = new \App\Client;
		$client->name = $name;
		$client->url = $url;
		if ($id){
			$client->client_id = $id;
		}
		$client->Save();		
		return $client->id;
	}
}
