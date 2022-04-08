<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		$font_weight 		= array("normal","bold","bolder","lighter","300","600","700","800");		

    global $google_fonts;
	$google_fonts = array(
							"0" => "Select Font",
							"ABeeZee" => "ABeeZee",
							"Abel" => "Abel",
							"Abril Fatface" => "Abril Fatface",
							"Aclonica" => "Aclonica",
							"Acme" => "Acme",
							"Actor" => "Actor",
							"Adamina" => "Adamina",
							"Advent Pro" => "Advent Pro",
							"Aguafina Script" => "Aguafina Script",
							"Akronim" => "Akronim",
							"Aladin" => "Aladin",
							"Aldrich" => "Aldrich",
							"Alegreya" => "Alegreya",
							"Alegreya SC" => "Alegreya SC",
							"Alex Brush" => "Alex Brush",
							"Alfa Slab One" => "Alfa Slab One",
							"Alice" => "Alice",
							"Alike" => "Alike",
							"Alike Angular" => "Alike Angular",
							"Allan" => "Allan",
							"Allerta" => "Allerta",
							"Allerta Stencil" => "Allerta Stencil",
							"Allura" => "Allura",
							"Almendra" => "Almendra",
							"Almendra Display" => "Almendra Display",
							"Almendra SC" => "Almendra SC",
							"Amarante" => "Amarante",
							"Amaranth" => "Amaranth",
							"Amatic SC" => "Amatic SC",
							"Amethysta" => "Amethysta",
							"Anaheim" => "Anaheim",
							"Andada" => "Andada",
							"Andika" => "Andika",
							"Angkor" => "Angkor",
							"Annie Use Your Telescope" => "Annie Use Your Telescope",
							"Anonymous Pro" => "Anonymous Pro",
							"Antic" => "Antic",
							"Antic Didone" => "Antic Didone",
							"Antic Slab" => "Antic Slab",
							"Anton" => "Anton",
							"Arapey" => "Arapey",
							"Arbutus" => "Arbutus",
							"Arbutus Slab" => "Arbutus Slab",
							"Architects Daughter" => "Architects Daughter",
							"Archivo Black" => "Archivo Black",
							"Archivo Narrow" => "Archivo Narrow",
							"Arimo" => "Arimo",
							"Arizonia" => "Arizonia",
							"Armata" => "Armata",
							"Artifika" => "Artifika",
							"Arvo" => "Arvo",
							"Asap" => "Asap",
							"Asset" => "Asset",
							"Astloch" => "Astloch",
							"Asul" => "Asul",
							"Atomic Age" => "Atomic Age",
							"Aubrey" => "Aubrey",
							"Audiowide" => "Audiowide",
							"Autour One" => "Autour One",
							"Average" => "Average",
							"Average Sans" => "Average Sans",
							"Averia Gruesa Libre" => "Averia Gruesa Libre",
							"Averia Libre" => "Averia Libre",
							"Averia Sans Libre" => "Averia Sans Libre",
							"Averia Serif Libre" => "Averia Serif Libre",
							"Bad Script" => "Bad Script",
							"Balthazar" => "Balthazar",
							"Bangers" => "Bangers",
							"Basic" => "Basic",
							"Battambang" => "Battambang",
							"Baumans" => "Baumans",
							"Bayon" => "Bayon",
							"Belgrano" => "Belgrano",
							"Belleza" => "Belleza",
							"BenchNine" => "BenchNine",
							"Bentham" => "Bentham",
							"Berkshire Swash" => "Berkshire Swash",
							"Bevan" => "Bevan",
							"Bigelow Rules" => "Bigelow Rules",
							"Bigshot One" => "Bigshot One",
							"Bilbo" => "Bilbo",
							"Bilbo Swash Caps" => "Bilbo Swash Caps",
							"Bitter" => "Bitter",
							"Black Ops One" => "Black Ops One",
							"Bokor" => "Bokor",
							"Bonbon" => "Bonbon",
							"Boogaloo" => "Boogaloo",
							"Bowlby One" => "Bowlby One",
							"Bowlby One SC" => "Bowlby One SC",
							"Brawler" => "Brawler",
							"Bree Serif" => "Bree Serif",
							"Bubblegum Sans" => "Bubblegum Sans",
							"Bubbler One" => "Bubbler One",
							"Buda" => "Buda",
							"Buenard" => "Buenard",
							"Butcherman" => "Butcherman",
							"Butterfly Kids" => "Butterfly Kids",
							"Cabin" => "Cabin",
							"Cabin Condensed" => "Cabin Condensed",
							"Cabin Sketch" => "Cabin Sketch",
							"Caesar Dressing" => "Caesar Dressing",
							"Cagliostro" => "Cagliostro",
							"Calligraffitti" => "Calligraffitti",
							"Cambo" => "Cambo",
							"Candal" => "Candal",
							"Cantarell" => "Cantarell",
							"Cantata One" => "Cantata One",
							"Cantora One" => "Cantora One",
							"Capriola" => "Capriola",
							"Cardo" => "Cardo",
							"Carme" => "Carme",
							"Carrois Gothic" => "Carrois Gothic",
							"Carrois Gothic SC" => "Carrois Gothic SC",
							"Carter One" => "Carter One",
							"Caudex" => "Caudex",
							"Cedarville Cursive" => "Cedarville Cursive",
							"Ceviche One" => "Ceviche One",
							"Changa One" => "Changa One",
							"Chango" => "Chango",
							"Chau Philomene One" => "Chau Philomene One",
							"Chela One" => "Chela One",
							"Chelsea Market" => "Chelsea Market",
							"Chenla" => "Chenla",
							"Cherry Cream Soda" => "Cherry Cream Soda",
							"Cherry Swash" => "Cherry Swash",
							"Chewy" => "Chewy",
							"Chicle" => "Chicle",
							"Chivo" => "Chivo",
							"Cinzel" => "Cinzel",
							"Cinzel Decorative" => "Cinzel Decorative",
							"Clicker Script" => "Clicker Script",
							"Coda" => "Coda",
							"Coda Caption" => "Coda Caption",
							"Codystar" => "Codystar",
							"Combo" => "Combo",
							"Comfortaa" => "Comfortaa",
							"Coming Soon" => "Coming Soon",
							"Concert One" => "Concert One",
							"Condiment" => "Condiment",
							"Content" => "Content",
							"Contrail One" => "Contrail One",
							"Convergence" => "Convergence",
							"Cookie" => "Cookie",
							"Copse" => "Copse",
							"Corben" => "Corben",
							"Courgette" => "Courgette",
							"Cousine" => "Cousine",
							"Coustard" => "Coustard",
							"Covered By Your Grace" => "Covered By Your Grace",
							"Crafty Girls" => "Crafty Girls",
							"Creepster" => "Creepster",
							"Crete Round" => "Crete Round",
							"Crimson Text" => "Crimson Text",
							"Croissant One" => "Croissant One",
							"Crushed" => "Crushed",
							"Cuprum" => "Cuprum",
							"Cutive" => "Cutive",
							"Cutive Mono" => "Cutive Mono",
							"Damion" => "Damion",
							"Dancing Script" => "Dancing Script",
							"Dangrek" => "Dangrek",
							"Dawning of a New Day" => "Dawning of a New Day",
							"Days One" => "Days One",
							"Delius" => "Delius",
							"Delius Swash Caps" => "Delius Swash Caps",
							"Delius Unicase" => "Delius Unicase",
							"Della Respira" => "Della Respira",
							"Denk One" => "Denk One",
							"Devonshire" => "Devonshire",
							"Didact Gothic" => "Didact Gothic",
							"Diplomata" => "Diplomata",
							"Diplomata SC" => "Diplomata SC",
							"Domine" => "Domine",
							"Donegal One" => "Donegal One",
							"Doppio One" => "Doppio One",
							"Dorsa" => "Dorsa",
							"Dosis" => "Dosis",
							"Dr Sugiyama" => "Dr Sugiyama",
							"Droid Sans" => "Droid Sans",
							"Droid Sans Mono" => "Droid Sans Mono",
							"Droid Serif" => "Droid Serif",
							"Duru Sans" => "Duru Sans",
							"Dynalight" => "Dynalight",
							"EB Garamond" => "EB Garamond",
							"Eagle Lake" => "Eagle Lake",
							"Eater" => "Eater",
							"Economica" => "Economica",
							"Electrolize" => "Electrolize",
							"Elsie" => "Elsie",
							"Elsie Swash Caps" => "Elsie Swash Caps",
							"Emblema One" => "Emblema One",
							"Emilys Candy" => "Emilys Candy",
							"Engagement" => "Engagement",
							"Englebert" => "Englebert",
							"Enriqueta" => "Enriqueta",
							"Erica One" => "Erica One",
							"Esteban" => "Esteban",
							"Euphoria Script" => "Euphoria Script",
							"Ewert" => "Ewert",
							"Exo" => "Exo",
							"Expletus Sans" => "Expletus Sans",
							"Fanwood Text" => "Fanwood Text",
							"Fascinate" => "Fascinate",
							"Fascinate Inline" => "Fascinate Inline",
							"Faster One" => "Faster One",
							"Fasthand" => "Fasthand",
							"Federant" => "Federant",
							"Federo" => "Federo",
							"Felipa" => "Felipa",
							"Fenix" => "Fenix",
							"Finger Paint" => "Finger Paint",
							"Fjalla One" => "Fjalla One",
							"Fjord One" => "Fjord One",
							"Flamenco" => "Flamenco",
							"Flavors" => "Flavors",
							"Fondamento" => "Fondamento",
							"Fontdiner Swanky" => "Fontdiner Swanky",
							"Forum" => "Forum",
							"Francois One" => "Francois One",
							"Freckle Face" => "Freckle Face",
							"Fredericka the Great" => "Fredericka the Great",
							"Fredoka One" => "Fredoka One",
							"Freehand" => "Freehand",
							"Fresca" => "Fresca",
							"Frijole" => "Frijole",
							"Fruktur" => "Fruktur",
							"Fugaz One" => "Fugaz One",
							"GFS Didot" => "GFS Didot",
							"GFS Neohellenic" => "GFS Neohellenic",
							"Gabriela" => "Gabriela",
							"Gafata" => "Gafata",
							"Galdeano" => "Galdeano",
							"Galindo" => "Galindo",
							"Gentium Basic" => "Gentium Basic",
							"Gentium Book Basic" => "Gentium Book Basic",
							"Geo" => "Geo",
							"Geostar" => "Geostar",
							"Geostar Fill" => "Geostar Fill",
							"Germania One" => "Germania One",
							"Gilda Display" => "Gilda Display",
							"Give You Glory" => "Give You Glory",
							"Glass Antiqua" => "Glass Antiqua",
							"Glegoo" => "Glegoo",
							"Gloria Hallelujah" => "Gloria Hallelujah",
							"Goblin One" => "Goblin One",
							"Gochi Hand" => "Gochi Hand",
							"Gorditas" => "Gorditas",
							"Goudy Bookletter 1911" => "Goudy Bookletter 1911",
							"Graduate" => "Graduate",
							"Grand Hotel" => "Grand Hotel",
							"Gravitas One" => "Gravitas One",
							"Great Vibes" => "Great Vibes",
							"Griffy" => "Griffy",
							"Gruppo" => "Gruppo",
							"Gudea" => "Gudea",
							"Habibi" => "Habibi",
							"Hammersmith One" => "Hammersmith One",
							"Hanalei" => "Hanalei",
							"Hanalei Fill" => "Hanalei Fill",
							"Handlee" => "Handlee",
							"Hanuman" => "Hanuman",
							"Happy Monkey" => "Happy Monkey",
							"Headland One" => "Headland One",
							"Henny Penny" => "Henny Penny",
							"Herr Von Muellerhoff" => "Herr Von Muellerhoff",
							"Holtwood One SC" => "Holtwood One SC",
							"Homemade Apple" => "Homemade Apple",
							"Homenaje" => "Homenaje",
							"IM Fell DW Pica" => "IM Fell DW Pica",
							"IM Fell DW Pica SC" => "IM Fell DW Pica SC",
							"IM Fell Double Pica" => "IM Fell Double Pica",
							"IM Fell Double Pica SC" => "IM Fell Double Pica SC",
							"IM Fell English" => "IM Fell English",
							"IM Fell English SC" => "IM Fell English SC",
							"IM Fell French Canon" => "IM Fell French Canon",
							"IM Fell French Canon SC" => "IM Fell French Canon SC",
							"IM Fell Great Primer" => "IM Fell Great Primer",
							"IM Fell Great Primer SC" => "IM Fell Great Primer SC",
							"Iceberg" => "Iceberg",
							"Iceland" => "Iceland",
							"Imprima" => "Imprima",
							"Inconsolata" => "Inconsolata",
							"Inder" => "Inder",
							"Indie Flower" => "Indie Flower",
							"Inika" => "Inika",
							"Irish Grover" => "Irish Grover",
							"Istok Web" => "Istok Web",
							"Italiana" => "Italiana",
							"Italianno" => "Italianno",
							"Jacques Francois" => "Jacques Francois",
							"Jacques Francois Shadow" => "Jacques Francois Shadow",
							"Jim Nightshade" => "Jim Nightshade",
							"Jockey One" => "Jockey One",
							"Jolly Lodger" => "Jolly Lodger",
							"Josefin Sans" => "Josefin Sans",
							"Josefin Slab" => "Josefin Slab",
							"Joti One" => "Joti One",
							"Judson" => "Judson",
							"Julee" => "Julee",
							"Julius Sans One" => "Julius Sans One",
							"Junge" => "Junge",
							"Jura" => "Jura",
							"Just Another Hand" => "Just Another Hand",
							"Just Me Again Down Here" => "Just Me Again Down Here",
							"Kameron" => "Kameron",
							"Karla" => "Karla",
							"Kaushan Script" => "Kaushan Script",
							"Kavoon" => "Kavoon",
							"Keania One" => "Keania One",
							"Kelly Slab" => "Kelly Slab",
							"Kenia" => "Kenia",
							"Khmer" => "Khmer",
							"Kite One" => "Kite One",
							"Knewave" => "Knewave",
							"Kotta One" => "Kotta One",
							"Koulen" => "Koulen",
							"Kranky" => "Kranky",
							"Kreon" => "Kreon",
							"Kristi" => "Kristi",
							"Krona One" => "Krona One",
							"La Belle Aurore" => "La Belle Aurore",
							"Lancelot" => "Lancelot",
							"Lato" => "Lato",
							"League Script" => "League Script",
							"Leckerli One" => "Leckerli One",
							"Ledger" => "Ledger",
							"Lekton" => "Lekton",
							"Lemon" => "Lemon",
							"Libre Baskerville" => "Libre Baskerville",
							"Life Savers" => "Life Savers",
							"Lilita One" => "Lilita One",
							"Limelight" => "Limelight",
							"Linden Hill" => "Linden Hill",
							"Lobster" => "Lobster",
							"Lobster Two" => "Lobster Two",
							"Londrina Outline" => "Londrina Outline",
							"Londrina Shadow" => "Londrina Shadow",
							"Londrina Sketch" => "Londrina Sketch",
							"Londrina Solid" => "Londrina Solid",
							"Lora" => "Lora",
							"Love Ya Like A Sister" => "Love Ya Like A Sister",
							"Loved by the King" => "Loved by the King",
							"Lovers Quarrel" => "Lovers Quarrel",
							"Luckiest Guy" => "Luckiest Guy",
							"Lusitana" => "Lusitana",
							"Lustria" => "Lustria",
							"Macondo" => "Macondo",
							"Macondo Swash Caps" => "Macondo Swash Caps",
							"Magra" => "Magra",
							"Maiden Orange" => "Maiden Orange",
							"Mako" => "Mako",
							"Marcellus" => "Marcellus",
							"Marcellus SC" => "Marcellus SC",
							"Marck Script" => "Marck Script",
							"Margarine" => "Margarine",
							"Marko One" => "Marko One",
							"Marmelad" => "Marmelad",
							"Marvel" => "Marvel",
							"Mate" => "Mate",
							"Mate SC" => "Mate SC",
							"Maven Pro" => "Maven Pro",
							"McLaren" => "McLaren",
							"Meddon" => "Meddon",
							"MedievalSharp" => "MedievalSharp",
							"Medula One" => "Medula One",
							"Megrim" => "Megrim",
							"Meie Script" => "Meie Script",
							"Merienda" => "Merienda",
							"Merienda One" => "Merienda One",
							"Merriweather" => "Merriweather",
							"Merriweather Sans" => "Merriweather Sans",
							"Metal" => "Metal",
							"Metal Mania" => "Metal Mania",
							"Metamorphous" => "Metamorphous",
							"Metrophobic" => "Metrophobic",
							"Michroma" => "Michroma",
							"Milonga" => "Milonga",
							"Miltonian" => "Miltonian",
							"Miltonian Tattoo" => "Miltonian Tattoo",
							"Miniver" => "Miniver",
							"Miss Fajardose" => "Miss Fajardose",
							"Modern Antiqua" => "Modern Antiqua",
							"Molengo" => "Molengo",
							"Molle" => "Molle",
							"Monda" => "Monda",
							"Monofett" => "Monofett",
							"Monoton" => "Monoton",
							"Monsieur La Doulaise" => "Monsieur La Doulaise",
							"Montaga" => "Montaga",
							"Montez" => "Montez",
							"Montserrat" => "Montserrat",
							"Montserrat Alternates" => "Montserrat Alternates",
							"Montserrat Subrayada" => "Montserrat Subrayada",
							"Moul" => "Moul",
							"Moulpali" => "Moulpali",
							"Mountains of Christmas" => "Mountains of Christmas",
							"Mouse Memoirs" => "Mouse Memoirs",
							"Mr Bedfort" => "Mr Bedfort",
							"Mr Dafoe" => "Mr Dafoe",
							"Mr De Haviland" => "Mr De Haviland",
							"Mrs Saint Delafield" => "Mrs Saint Delafield",
							"Mrs Sheppards" => "Mrs Sheppards",
							"Muli" => "Muli",
							"Mystery Quest" => "Mystery Quest",
							"Neucha" => "Neucha",
							"Neuton" => "Neuton",
							"New Rocker" => "New Rocker",
							"News Cycle" => "News Cycle",
							"Niconne" => "Niconne",
							"Nixie One" => "Nixie One",
							"Nobile" => "Nobile",
							"Nokora" => "Nokora",
							"Norican" => "Norican",
							"Nosifer" => "Nosifer",
							"Nothing You Could Do" => "Nothing You Could Do",
							"Noticia Text" => "Noticia Text",
							"Noto Sans" => "Noto Sans",
							"Noto Serif" => "Noto Serif",
							"Nova Cut" => "Nova Cut",
							"Nova Flat" => "Nova Flat",
							"Nova Mono" => "Nova Mono",
							"Nova Oval" => "Nova Oval",
							"Nova Round" => "Nova Round",
							"Nova Script" => "Nova Script",
							"Nova Slim" => "Nova Slim",
							"Nova Square" => "Nova Square",
							"Numans" => "Numans",
							"Nunito" => "Nunito",
							"Odor Mean Chey" => "Odor Mean Chey",
							"Offside" => "Offside",
							"Old Standard TT" => "Old Standard TT",
							"Oldenburg" => "Oldenburg",
							"Oleo Script" => "Oleo Script",
							"Oleo Script Swash Caps" => "Oleo Script Swash Caps",
							"Open Sans" => "Open Sans",
							"Open Sans Condensed" => "Open Sans Condensed",
							"Oranienbaum" => "Oranienbaum",
							"Orbitron" => "Orbitron",
							"Oregano" => "Oregano",
							"Orienta" => "Orienta",
							"Original Surfer" => "Original Surfer",
							"Oswald" => "Oswald",
							"Over the Rainbow" => "Over the Rainbow",
							"Overlock" => "Overlock",
							"Overlock SC" => "Overlock SC",
							"Ovo" => "Ovo",
							"Oxygen" => "Oxygen",
							"Oxygen Mono" => "Oxygen Mono",
							"PT Mono" => "PT Mono",
							"PT Sans" => "PT Sans",
							"PT Sans Caption" => "PT Sans Caption",
							"PT Sans Narrow" => "PT Sans Narrow",
							"PT Serif" => "PT Serif",
							"PT Serif Caption" => "PT Serif Caption",
							"Pacifico" => "Pacifico",
							"Paprika" => "Paprika",
							"Parisienne" => "Parisienne",
							"Passero One" => "Passero One",
							"Passion One" => "Passion One",
							"Patrick Hand" => "Patrick Hand",
							"Patrick Hand SC" => "Patrick Hand SC",
							"Patua One" => "Patua One",
							"Paytone One" => "Paytone One",
							"Peralta" => "Peralta",
							"Permanent Marker" => "Permanent Marker",
							"Petit Formal Script" => "Petit Formal Script",
							"Petrona" => "Petrona",
							"Philosopher" => "Philosopher",
							"Piedra" => "Piedra",
							"Pinyon Script" => "Pinyon Script",
							"Pirata One" => "Pirata One",
							"Plaster" => "Plaster",
							"Play" => "Play",
							"Playball" => "Playball",
							"Playfair Display" => "Playfair Display",
							"Playfair Display SC" => "Playfair Display SC",
							"Podkova" => "Podkova",
							"Poiret One" => "Poiret One",
							"Poller One" => "Poller One",
							"Poly" => "Poly",
							"Pompiere" => "Pompiere",
							"Pontano Sans" => "Pontano Sans",
							"Port Lligat Sans" => "Port Lligat Sans",
							"Port Lligat Slab" => "Port Lligat Slab",
							"Prata" => "Prata",
							"Preahvihear" => "Preahvihear",
							"Press Start 2P" => "Press Start 2P",
							"Princess Sofia" => "Princess Sofia",
							"Prociono" => "Prociono",
							"Prosto One" => "Prosto One",
							"Puritan" => "Puritan",
							"Purple Purse" => "Purple Purse",
							"Quando" => "Quando",
							"Quantico" => "Quantico",
							"Quattrocento" => "Quattrocento",
							"Quattrocento Sans" => "Quattrocento Sans",
							"Questrial" => "Questrial",
							"Quicksand" => "Quicksand",
							"Quintessential" => "Quintessential",
							"Qwigley" => "Qwigley",
							"Racing Sans One" => "Racing Sans One",
							"Radley" => "Radley",
							"Raleway" => "Raleway",
							"Raleway Dots" => "Raleway Dots",
							"Rambla" => "Rambla",
							"Rammetto One" => "Rammetto One",
							"Ranchers" => "Ranchers",
							"Rancho" => "Rancho",
							"Rationale" => "Rationale",
							"Redressed" => "Redressed",
							"Reenie Beanie" => "Reenie Beanie",
							"Revalia" => "Revalia",
							"Ribeye" => "Ribeye",
							"Ribeye Marrow" => "Ribeye Marrow",
							"Righteous" => "Righteous",
							"Risque" => "Risque",
							"Roboto" => "Roboto",
							"Roboto Condensed" => "Roboto Condensed",
							"Roboto Slab" => "Roboto Slab",
							"Rochester" => "Rochester",
							"Rock Salt" => "Rock Salt",
							"Rokkitt" => "Rokkitt",
							"Romanesco" => "Romanesco",
							"Ropa Sans" => "Ropa Sans",
							"Rosario" => "Rosario",
							"Rosarivo" => "Rosarivo",
							"Rouge Script" => "Rouge Script",
							"Ruda" => "Ruda",
							"Rufina" => "Rufina",
							"Ruge Boogie" => "Ruge Boogie",
							"Ruluko" => "Ruluko",
							"Rum Raisin" => "Rum Raisin",
							"Ruslan Display" => "Ruslan Display",
							"Russo One" => "Russo One",
							"Ruthie" => "Ruthie",
							"Rye" => "Rye",
							"Sacramento" => "Sacramento",
							"Sail" => "Sail",
							"Salsa" => "Salsa",
							"Sanchez" => "Sanchez",
							"Sancreek" => "Sancreek",
							"Sansita One" => "Sansita One",
							"Sarina" => "Sarina",
							"Satisfy" => "Satisfy",
							"Scada" => "Scada",
							"Schoolbell" => "Schoolbell",
							"Seaweed Script" => "Seaweed Script",
							"Sevillana" => "Sevillana",
							"Seymour One" => "Seymour One",
							"Shadows Into Light" => "Shadows Into Light",
							"Shadows Into Light Two" => "Shadows Into Light Two",
							"Shanti" => "Shanti",
							"Share" => "Share",
							"Share Tech" => "Share Tech",
							"Share Tech Mono" => "Share Tech Mono",
							"Shojumaru" => "Shojumaru",
							"Short Stack" => "Short Stack",
							"Siemreap" => "Siemreap",
							"Sigmar One" => "Sigmar One",
							"Signika" => "Signika",
							"Signika Negative" => "Signika Negative",
							"Simonetta" => "Simonetta",
							"Sintony" => "Sintony",
							"Sirin Stencil" => "Sirin Stencil",
							"Six Caps" => "Six Caps",
							"Skranji" => "Skranji",
							"Slackey" => "Slackey",
							"Smokum" => "Smokum",
							"Smythe" => "Smythe",
							"Sniglet" => "Sniglet",
							"Snippet" => "Snippet",
							"Snowburst One" => "Snowburst One",
							"Sofadi One" => "Sofadi One",
							"Sofia" => "Sofia",
							"Sonsie One" => "Sonsie One",
							"Sorts Mill Goudy" => "Sorts Mill Goudy",
							"Source Code Pro" => "Source Code Pro",
							"Source Sans Pro" => "Source Sans Pro",
							"Special Elite" => "Special Elite",
							"Spicy Rice" => "Spicy Rice",
							"Spinnaker" => "Spinnaker",
							"Spirax" => "Spirax",
							"Squada One" => "Squada One",
							"Stalemate" => "Stalemate",
							"Stalinist One" => "Stalinist One",
							"Stardos Stencil" => "Stardos Stencil",
							"Stint Ultra Condensed" => "Stint Ultra Condensed",
							"Stint Ultra Expanded" => "Stint Ultra Expanded",
							"Stoke" => "Stoke",
							"Strait" => "Strait",
							"Sue Ellen Francisco" => "Sue Ellen Francisco",
							"Sunshiney" => "Sunshiney",
							"Supermercado One" => "Supermercado One",
							"Suwannaphum" => "Suwannaphum",
							"Swanky and Moo Moo" => "Swanky and Moo Moo",
							"Syncopate" => "Syncopate",
							"Tangerine" => "Tangerine",
							"Taprom" => "Taprom",
							"Tauri" => "Tauri",
							"Telex" => "Telex",
							"Tenor Sans" => "Tenor Sans",
							"Text Me One" => "Text Me One",
							"The Girl Next Door" => "The Girl Next Door",
							"Tienne" => "Tienne",
							"Tinos" => "Tinos",
							"Titan One" => "Titan One",
							"Titillium Web" => "Titillium Web",
							"Trade Winds" => "Trade Winds",
							"Trocchi" => "Trocchi",
							"Trochut" => "Trochut",
							"Trykker" => "Trykker",
							"Tulpen One" => "Tulpen One",
							"Ubuntu" => "Ubuntu",
							"Ubuntu Condensed" => "Ubuntu Condensed",
							"Ubuntu Mono" => "Ubuntu Mono",
							"Ultra" => "Ultra",
							"Uncial Antiqua" => "Uncial Antiqua",
							"Underdog" => "Underdog",
							"Unica One" => "Unica One",
							"UnifrakturCook" => "UnifrakturCook",
							"UnifrakturMaguntia" => "UnifrakturMaguntia",
							"Unkempt" => "Unkempt",
							"Unlock" => "Unlock",
							"Unna" => "Unna",
							"VT323" => "VT323",
							"Vampiro One" => "Vampiro One",
							"Varela" => "Varela",
							"Varela Round" => "Varela Round",
							"Vast Shadow" => "Vast Shadow",
							"Vibur" => "Vibur",
							"Vidaloka" => "Vidaloka",
							"Viga" => "Viga",
							"Voces" => "Voces",
							"Volkhov" => "Volkhov",
							"Vollkorn" => "Vollkorn",
							"Voltaire" => "Voltaire",
							"Waiting for the Sunrise" => "Waiting for the Sunrise",
							"Wallpoet" => "Wallpoet",
							"Walter Turncoat" => "Walter Turncoat",
							"Warnes" => "Warnes",
							"Wellfleet" => "Wellfleet",
							"Wendy One" => "Wendy One",
							"Wire One" => "Wire One",
							"Yanone Kaffeesatz" => "Yanone Kaffeesatz",
							"Yellowtail" => "Yellowtail",
							"Yeseva One" => "Yeseva One",
							"Yesteryear" => "Yesteryear",
							"Zeyada" => "Zeyada"
						);		
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

/* ------------------------------------------------------------------------ */
/* General SECTION
/* ------------------------------------------------------------------------ */	

$generalsettings = get_option('generalsettings');

if($generalsettings==1){

$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading"
				);

					

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "Logo Section",
					"std" => "Logo Section",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Upload Logo",
					"desc" => "",
					"id" => "rnr_upload_logo",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "Upload Stick Logo",
					"desc" => "",
					"id" => "rnr_upload_logo_mobile",
					"std" => "",
					"type" => "media");	
					
$of_options[] = array( "name" => "Upload Registration Logo",
					"desc" => "",
					"id" => "rnr_upload_logo_mobile_rg",
					"std" => "",
					"type" => "media");						

$of_options[] = array( "name" => "Top Header Phone",
					"desc" => "",
					"id" => "rnr_top_header_phone",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Top Header Phone Link",
					"desc" => "",
					"id" => "rnr_top_header_phone_link",
					"std" => "",
					"type" => "text");					
					

$of_options[] = array( "name" => "Top Header Email Address",
					"desc" => "",
					"id" => "rnr_top_header_email_address",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Top Header Email Address Link",
					"desc" => "",
					"id" => "rnr_top_header_email_address_link",
					"std" => "",
					"type" => "text");										


$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "Page Banner Section",
					"std" => "Page Banner Section",
					"icon" => false,
					"type" => "info");


$of_options[] = array( "name" => "Blog Inner Page Banner",
					"desc" => "",
					"id" => "rnr_page_blog_inner_page_banner",
					"std" => "",
					"type" => "media");		

$of_options[] = array( "name" => "Author page Banner Image",
					"desc" => "",
					"id" => "rnr_page_author_page_banner",
					"std" => "",
					"type" => "media");							
					

$of_options[] = array( "name" => "Category page Banner Image",
					"desc" => "",
					"id" => "rnr_page_category_page_banner",
					"std" => "",
					"type" => "media");	
					

$of_options[] = array( "name" => "Search page Banner Image",
					"desc" => "",
					"id" => "rnr_page_search_page_banner",
					"std" => "",
					"type" => "media");	
					
}

/* ------------------------------------------------------------------------ */
/* Home SECTION
/* ------------------------------------------------------------------------ */	


$homesettings = get_option('homesettings');
if($homesettings==1){

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "home_screen_heading",
					"std" => "Sidebar Section",
					"icon" => false,
					"type" => "info");
					

$of_options[] = array( "name" => "Category Heading",
					"desc" => "",
					"id" => "rnr_sidebar_category_heading",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Blog Heading",
					"desc" => "",
					"id" => "rnr_sidebar_blog_heading",
					"std" => "",
					"type" => "text");					
					

		
$of_options[] = array( 	"name" 		=> "Home Settings",
						"type" 		=> "heading"
				); 
				

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "home_screen_heading",
					"std" => "Home First Section",
					"icon" => false,
					"type" => "info");


$of_options[] = array( "name" => "Home First Heading",
					"desc" => "",
					"id" => "rnr_home_first_heading_heading",
					"std" => "",
					"type" => "textarea");	
					

$of_options[] = array( "name" => "Home Read More Text",
					"desc" => "",
					"id" => "rnr_home_read_more_text",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Home Read More Link",
					"desc" => "",
					"id" => "rnr_home_read_more_link",
					"std" => "",
					"type" => "text");					


$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "home_screen_heading",
					"std" => "Home About Section",
					"icon" => false,
					"type" => "info");					

$of_options[] = array( "name" => "Home About Image",
					"desc" => "",
					"id" => "rnr_home_about_image",
					"std" => "",
					"type" => "media");


$of_options[] = array( "name" => "Home About Heading",
					"desc" => "",
					"id" => "rnr_home_about_heading",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Home About Content",
					"desc" => "",
					"id" => "rnr_home_about_content",
					"std" => "",
					"type" => "textarea");					


$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "home_screen_heading",
					"std" => "Home Client Section1",
					"icon" => false,
					"type" => "info");	





$of_options[] = array( "name" => "Home Client Image",
					"desc" => "",
					"id" => "rnr_home_client_image",
					"std" => "",
					"type" => "media");


$of_options[] = array( "name" => "Home Client youtube video link",
					"desc" => "",
					"id" => "rnr_home_client_youtube_video_link",
					"std" => "",
					"type" => "text");




$of_options[] = array( "name" => "Home Client Heading",
					"desc" => "",
					"id" => "rnr_home_client_heading",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Home Client Content",
					"desc" => "",
					"id" => "rnr_home_client_content",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => "Home Client button text",
					"desc" => "",
					"id" => "rnr_home_client_button_text",
					"std" => "",
					"type" => "text");					




$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "home_screen_heading",
					"std" => "Home Client Section2",
					"icon" => false,
					"type" => "info");	





$of_options[] = array( "name" => "Home Client Image",
					"desc" => "",
					"id" => "rnr_home_client_image2",
					"std" => "",
					"type" => "media");


$of_options[] = array( "name" => "Home Client youtube video link",
					"desc" => "",
					"id" => "rnr_home_client_youtube_video_link2",
					"std" => "",
					"type" => "text");




$of_options[] = array( "name" => "Home Client Heading",
					"desc" => "",
					"id" => "rnr_home_client_heading2",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Home Client Content2",
					"desc" => "",
					"id" => "rnr_home_client_content2",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => "Home Client button text",
					"desc" => "",
					"id" => "rnr_home_client_button_text2",
					"std" => "",
					"type" => "text");			


$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "home_screen_heading",
					"std" => "Home Mission Blog Section",
					"icon" => false,
					"type" => "info");	
					
$of_options[] = array( "name" => "Home Blog Heading",
					"desc" => "",
					"id" => "rnr_home_blog_heading",
					"std" => "",
					"type" => "text");		


$of_options[] = array( "name" => "Home Sub Blog Heading",
					"desc" => "",
					"id" => "rnr_home_sub_blog_heading",
					"std" => "",
					"type" => "text");

}					



/* ------------------------------------------------------------------------ */
/* Email SECTION
/* ------------------------------------------------------------------------ */	

$emailssettings = get_option('emailssettings');
if($emailssettings==1){

$of_options[] = array( 	"name" 		=> "Emails Settings",
						"type" 		=> "heading"
				);

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Email Styling",
					"icon" => false,
					"type" => "info"); 
					

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Registration Email Text",
					"icon" => false,
					"type" => "info");					
					

$of_options[] = array( "name" => "Subject",
					"desc" => "",
					"id" => "rnr_regsiter_email_subject",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Message",
					"desc" => "",
					"id" => "rnr_regsiter_email_message",
					"std" => "",
					"type" => "textarea"); 					




$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Forget Password Email Text",
					"icon" => false,
					"type" => "info");					
					

$of_options[] = array( "name" => "Subject",
					"desc" => "",
					"id" => "rnr_forget_email_subject",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Message",
					"desc" => "",
					"id" => "rnr_forget_email_message",
					"std" => "",
					"type" => "textarea"); 					




$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Reset Password Email Text",
					"icon" => false,
					"type" => "info");					
					

$of_options[] = array( "name" => "Subject",
					"desc" => "",
					"id" => "rnr_reset_email_subject",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Message",
					"desc" => "",
					"id" => "rnr_reset_email_message",
					"std" => "",
					"type" => "textarea"); 


$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Post New Submit Email Text",
					"icon" => false,
					"type" => "info");					
					

$of_options[] = array( "name" => "Subject",
					"desc" => "",
					"id" => "rnr_new_post_email_subject",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Message",
					"desc" => "",
					"id" => "rnr_new_post_email_message",
					"std" => "",
					"type" => "textarea"); 	
					
 }

/* ------------------------------------------------------------------------ */
/* FOOTER SECTION
/* ------------------------------------------------------------------------ */	

$footersettings = get_option('footersettings');

if($footersettings==1){

$of_options[] = array( 	"name" 		=> "Footer Settings",
						"type" 		=> "heading"
				);			
				


$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "Footer First Section",
					"std" => "Footer First Section",
					"icon" => false,
					"type" => "info");

$of_options[] = array( "name" => "Footer Image",
					"desc" => "",
					"id" => "rnr_footer_top_image",
					"std" => "",
					"type" => "media"); 						
					

$of_options[] = array( "name" => "About Us Heading",
					"desc" => "",
					"id" => "rnr_footer_about_heading",
					"std" => "",
					"type" => "text"); 					

$of_options[] = array( "name" => "About Us Content",
					"desc" => "",
					"id" => "rnr_footer_about_content",
					"std" => "",
					"type" => "textarea"); 

$of_options[] = array( "name" => "Read More Button Text",
					"desc" => "",
					"id" => "rnr_footer_read_more_text",
					"std" => "",
					"type" => "text");					
					
$of_options[] = array( "name" => "Read More Button Link",
					"desc" => "",
					"id" => "rnr_footer_read_more_link",
					"std" => "",
					"type" => "text");										
					
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "Footer Section Section",
					"std" => "Footer Section Section",
					"icon" => false,
					"type" => "info");					
					
$of_options[] = array( "name" => "Site Link Heading",
					"desc" => "",
					"id" => "rnr_footer_quick_contact_heading",
					"std" => "",
					"type" => "text"); 					


 
					

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "Footer Third Section",
					"std" => "Footer Third Section",
					"icon" => false,
					"type" => "info");					


$of_options[] = array( "name" => "Contact Us Heading",
					"desc" => "",
					"id" => "rnr_footer_contact_us_heading",
					"std" => "",
					"type" => "text"); 
					
		

$of_options[] = array( "name" => "Address ",
					"desc" => "",
					"id" => "rnr_footer_address",
					"std" => "",
					"type" => "text"); 								



$of_options[] = array( "name" => "Phone Number",
					"desc" => "",
					"id" => "rnr_footer_phone_number",
					"std" => "",
					"type" => "text"); 
			

$of_options[] = array( "name" => "Email Address",
					"desc" => "",
					"id" => "rnr_footer_email_address",
					"std" => "",
					"type" => "text"); 			

			
			
					
	
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "Footer Fourth Section",
					"std" => "Footer Fourth Section",
					"icon" => false,
					"type" => "info");
					
					
$of_options[] = array( "name" => "Newsletter Heading",
					"desc" => "",
					"id" => "rnr_footer_newsletter_heading",
					"std" => "",
					"type" => "text");



$of_options[] = array( "name" => "Newsletter Image Link",
					"desc" => "",
					"id" => "rnr_footer_newsletter_image_link",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Newsletter Image Heading",
					"desc" => "",
					"id" => "rnr_footer_newsletter_image_heading",
					"std" => "",
					"type" => "text");
										
					

$of_options[] = array( "name" => "Newsletter Image ",
					"desc" => "",
					"id" => "rnr_footer_newsletter_image",
					"std" => "",
					"type" => "media");					
	

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "Copy Right Section",
					"std" => "Copy Right Section",
					"icon" => false,
					"type" => "info");
 

$of_options[] = array( "name" => "Copy Right Text",
					"desc" => "",
					"id" => "rnr_footer_copy_right_es",
					"std" => "",
					"type" => "textarea"); 					
				
}


/* ------------------------------------------------------------------------ */
/* SOCIAL SECTION
/* ------------------------------------------------------------------------ */	

$socialsharing = get_option('socialsharing');		
if($socialsharing==1){

$of_options[] = array( 	"name" 		=> "Social Sharing",
						"type" 		=> "heading"
				);	

$of_options[] = array( "name" => "Hello there!",
					"desc" => "",
					"id" => "introduction",
					"std" => "Enter your username / URL to show or leave blank to hide Social Media Icons",
					"icon" => true,
					"type" => "info");
					

$of_options[] = array( "name" => "Follow Us Heading",
					"desc" => "heading",
					"id" => "rnr_follow_us_heading",
					"std" => "",
					"type" => "text");					

$of_options[] = array( "name" => "Facebook Url ",
					"desc" => "heading",
					"id" => "rnr_facebook_url",
					"std" => "",
					"type" => "text");	
				

$of_options[] = array( "name" => "Twitter Url",
					"desc" => "heading",
					"id" => "rnr_twitter_url",
					"std" => "",
					"type" => "text");		

$of_options[] = array( "name" => "Clapper Url",
					"desc" => "heading",
					"id" => "rnr_google_url",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "linkedin Url",
					"desc" => "heading",
					"id" => "rnr_linkedin_url",
					"std" => "",
					"type" => "text");							
	

	 
$of_options[] = array( "name" => "Tiktok Url",
					"desc" => "heading",
					"id" => "rnr_tiktok_url",
					"std" => "",
					"type" => "text");



}
				
	}
	//End function: of_options()
}
//End chack if function exists: of_options()
?>
