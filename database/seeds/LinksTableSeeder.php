<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('links')->delete();		
		$links = array(
		array('Guitar Lessons','www.unstoppableguitarsystem.com/categories/74607',NULL,150,NULL,0),
		array('nglcc17','connect.jujama.com/NGLCC17',NULL,150,NULL,0),
		array('duckduckgo','duckduckgo.com','duckduckgo.jpg',150,99,0),
		array('google','google.com','google.jpg',150,53,0),
		array('YouTube','youtube.com','youtube.jpg',150,106,0),
		array('NetFlix','dvd.netflix.com/Queue?lnkctr=mhbque&qtype=DD','netflix.png',150,'40"',0),
		array('Hulu','www.hulu.com','hulu.svg',150,40,0),
		array('TDAmeritrade','www.tdameritrade.com','tdameritrade.png',150,'40"',0),
		array('Facebook','facebook.com','facebook.png',150,43,0),
		array('ChicagoPotters','chicagopotters.com','chicagopotters.jpg',150,'64"',0),
		array('Skolnik','www.skolnik.com','skolnik.jpg',150,42,0),
		array('Skolnik Wordpress','www.skolnik.com/blog/wp-admin',NULL,150,NULL,0),
		array('LinkedIn','www.linkedin.com/','linkedin.jpg',150,48,0),
		array('IMDB','imdb.com','imdb.jpg',150,72,0),
		array('RJMChicago','www.rjmchicago.com','rjmchicagologo.jpg',150,NULL,0),
		array('RJMProgramming.com','www.rjmprogramming.com',NULL,150,NULL,0),
		array('RJMProgramming.com Comments','rjmprogramming.com/get_comments.php',NULL,150,NULL,0),
		array('RJMProgramming CPanel','www.rjmprogramming.com/cpanel',NULL,150,NULL,0),
		array('Constant Contact','constantcontact.com/login','constant-contact.png',150,25,0),
		array('Local PHPMyAdmin','127.0.0.1/phpmyadmin',NULL,150,NULL,0),
		array('Layer Styles','layerstyles.org/',NULL,150,NULL,0),
		array('Primer CSS','primercss.com/index.php',NULL,150,NULL,0),
		array('Pixlr','pixlr.com/',NULL,150,NULL,0),
		array('Sprite Cow','www.spritecow.com/',NULL,150,NULL,0),
		array('Local Wordpress','127.0.0.1/wordpress',NULL,150,NULL,0),
		array('PrimeMail','www.myprimemail.com','primemail.gif',150,'16"',0),
		array('Astrology Lessons','astrolibrary.org/lessons/',NULL,150,NULL,0),
		array('Webmaster Tools','www.google.com/webmasters/tools/home?hl=en',NULL,150,NULL,0),
		array('Tutorial Index','tutorial-index.com/',NULL,150,NULL,0),
		array('Tarot Documentary','www.youtube.com/watch?v=LIqwpwZJlMo',NULL,150,NULL,0),
		array('FitBay','fitbay.com',NULL,150,NULL,0),
		array('CSS Gradient Generator','www.colorzilla.com/gradient-editor/',NULL,150,NULL,0),
		array('GitHub','github.com/','github.png',150,38,0),
		array('BitBucket','bitbucket.org/','bitbucket.png',150,NULL,0),
		array('Free fonts','www.digitalartsonline.co.uk/features/typography/best-free-fonts-30-free-typefaces-every-designer-should-have/',NULL,150,NULL,0),
		array('Search Replace Database (move wordpress)','localhost/search-replace-db/',NULL,150,NULL,0),
		array('Flexbox','css-tricks.com/snippets/css/a-guide-to-flexbox/',NULL,150,NULL,0)
);
		
		foreach ($links as $link) {
 			DB::table('links')->insert([
            'name' => $link[0],
            'url' => $link[1],
            'image' => $link[2],
			'image_width'=>$link[3],
			'image_height'=>$link[4],
			'sort_order'=>$link[5],			
        	]);		
		}
    }
}
