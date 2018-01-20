<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta id="meta" name="viewport" content="width=device-width; initial-scale=1.0" />
	<link rel="shortcut icon" href="../img/favicon.ico?v=2" type="image/x-icon" />
	

	<link rel="stylesheet" type="text/css" href="../slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="../slick/slick-theme.css"/>
	<link rel="stylesheet" type="text/css" href="../css/sethestep.css">
	<link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Quattrocento|Alegreya+SC:400,400i|Cormorant+Garamond" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
	
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
	<script src="../js/eastcraft2.2.js"></script>
	<script type="text/javascript" src="../slick/slick.min.js"></script>
</head>
<body>


  	<?php 
  	 //error_reporting(E_ALL);
 // I don't know if you need to wrap the 1 inside of double quotes.
 //ini_set("display_startup_errors",1);
 //ini_set("display_errors",1);
  		$selected = 'furniture';
  		require '../seth_header.php'; 		
  	?>
  	
  			<div class="back-panel"></div>
			<div class="content-only blowupable">
			
			<?php
				$span_side = 'left';
				
				function startSection($name){
					global $span_side;
					if ($span_side == 'left'){
						$span_side = 'right';
					}
					else{
						$span_side = 'left';
					}	
					echo '<a name="' . str_replace(' ','', $name) . '" class="clearfix"></a>
						<h2 class="inset-text subtle-inset">' . $name . '</h2>
						<span class="' . $span_side . '-side">';
				}
	
				function endSection(){ 
					echo '</span>'; 
				}
				
				function picAndSpecs($title, $materials, $description, $images, $tearsheet = NULL){
					$img_count=count($images);
					$tearsheet_msg='';
					if($tearsheet != NULL){
						$tearsheet_msg='<span class="tearsheet">download tearsheet</span>';
					}
					
					$ending_snip = '<div class="content-specs">
										<p>' . $title . '</p>
										<p>' . $materials . '</p>
										<p> <span class="place-order">place order</span>' . $tearsheet_msg '</p>
										<p>' . $description . ' </p>	
									</div>
								</div>
							</div>';
					if ($img_count<1){
						echo('ERROR creating picAndSpecs element: not enough arguments; must include images');
					}
					elseif ($img_count<2){
						echo '<div class="picnspecs clearfix">
								<div class="pic-wrap">
									<img class="content-pic" src="' . $images[0] . '" alt="Picture of ' . $title . '">';		
						echo $ending_snip;
					}
					else{
						$first_class=' class="first"';
						echo '<div class="picnspecs clearfix">
								<div class="pic-wrap">
									<div class="series-container clearfix">
										<div class="fading-pic-series">';		
						for ($i = 0; $i < $img_count; $i++){
							echo '<div><img' . $first_class . ' alt="Picture ' . ($i + 1 ) . ' of ' . $title . '" src="' . $images[$i] . '"></div>';
							$first_class='';
						}
						echo '</div>
							</div>';
						echo $ending_snip;
					}
				}
			
//////////////////////////////////////////////////////////////////			
				/*
				/// EXAMPLE: ///
				
				startSection('<name>');
		
					picAndSpecs('<title>',
						'<materials>',
						'<description>',
						'<img1>',
						'<img2>',
						'<etc>');
				
				endSection();
				
				*/
//////////////////////////////////////////////////////////////////		
		
				startSection('Tables');
					
					picAndSpecs('Smokehouse Table',
						'White Oak, American Chestnut, Paduak',
						'The Smokehouse Table is named for the recovery site of the American Chestnut
							beams used for the table legs - a smokehouse on a 19th century Pennsylvania farm. 
							These well aged beams exhibit signs of their previous life, now made permanent with paduak plugs.
							Cracks and splits were also stabilized with paduak bowties to ensure the reclaimed chestnut will
							be as dependable and beautiful for the next half of its lifetime. The table top is solid white oak planks, 
							finished with oil and varnish to protect and deepen the familiar grain of oak. The thickness of the top is
							softened by a slight white stain of the pores.',
						array('img/SmokehouseTable 1.jpg',
							'img/SmokehouseTable 2.jpg',
							'img/SmokehouseTable 3.jpg',
							'img/SmokehouseTable 4.jpg')
						);
					
					
					picAndSpecs('Wing Table',
								'Black Walnut',
								'The Wing Table derives the apron shape from the funciton of the roll away expansion leaves.
								 Simply pulling (or pushing) can expand the table to serve 6 or 10 people. The finish is a blend of 
								 walnut oil - a food safe drying oil and hard waxes.',
								array('img/WingTable.jpg'));
								
					picAndSpecs('Starya Table',
						'White Oak, QSWO',
						'The 30-degree radial pattern of this table was selected to inspire and hopefully
							 match the young imaginations it will serve. It was built strong enough to ensure adults 
							 can join any table games without worry of breaking the table or chair, but not simply 
							 by scaling down a larger table - that would cause awkward and unseemly proportions. The 
							 satin finish is food safe and will resist any and all accidents or experiments and wipe
							  clean to be ready for the next meal or game.',
						array('img/StrayaTable 1.jpg',
							'img/StrayaTable 2.jpg')
						);			
					
					picAndSpecs('Corner Table',
						'Black Walnut, Hard Rock Maple',
						'When a corner needs a table, the table must match the corner. This table was designed
							 to complete a home office with a 135-degree corner with precious space being wasted by
							  rectaliner furniture. The black walnut frame is complimented by hard maple shelves. 
							  The joinery is an interlocking double bridle joint - a very strong and beautiful joint - 
							  challenging in square applications, entertainingly so in this skewed example. 
							  Each corner is the interlocking union of three boards and begs to be seen.
							   The top was under-beveled and elevated with stainless steel pins to preserve the visibility of the joinery.
								The finish is a blend of oils and waxes to protect and accentuate the natural beauty each wood possesses.',
						array('img/CornerTable 2.jpg',
							'img/CornerTable 3.jpg',
							'img/CornerTable 4.jpg',
							'img/CornerTable 5.jpg',
							'img/CornerTable 6.jpg')
						);
						
				endSection();
				startSection('Storage');

					picAndSpecs('Sea Chest',
						'White Oak, American Chestnut, Cherry',
						'The Sea Chest is a replica of a maritime staple of a time when American Chestnut 
							was a preferred hardwood for anything from framing to furniture. The chest front and 
							back are tilted inwards - a practical solution to alleviate knocked shins when many 
							were stowed in the crew quarters of a ship. Chestnut was resawn and bookmatched to 
							create a striking grain configuration that presents differently from each angle. 
							The handles and spines are hand shaped cherry with paracord lanyards. The top is a 
							single piece of white oak. The chest received a satiny smooth varnish and epoxy 
							stabilized worm holes in the chestnut. A one-of-a-kind example!',
						array('img/SeaChest 1.jpg',
							'img/SeaChest 2.jpg',
							'img/SeaChest 3.jpg')
						);
					
					picAndSpecs('Barrister Bookcases',
						'Black Walnut',
						'The barrister case is a time tested design concept that will continue to serve many bibliophiles into the future. 
							This set was built entirely of black walnut. Hardware is stainless steel and brass.',
						array('img/BarristerBookcases 3.jpg',
							'img/BarristerBookcases 4.jpg',
							'img/BarristerBookcases 1.jpg',
							'img/BarristerBookcases 2.jpg')
						);
						
					picAndSpecs('Ebonized Oak Bookshelf',
						'White Oak',
						'This bookcase served as an exploration in reimagining typical alignments. 
							The shelf grain runs perpendicular to the edge, abandoning the stronger orientation
							 in pursuit of novel beauty. To overcome the ineherent weakness of this arrangment 
							 a dado cut on each shelf underside holds an aluminum C-channel in tension. The 
							 recipient loaded it with more books than I thought was possible, and has not noticed
							  even a slight bow. The ebony finish was achieved using a more conventional method 
							  that utilizes the abundant tannins natural in oak.',
						array('img/EbonizedOakBookshelf 1.jpg',
							'img/EbonizedOakBookshelf 2.jpg')
						);
					
					picAndSpecs('Dual Display Cases',
						'Reclaimed Oak',
						'A plain doorway was transformed into an elegant display for a large collection of bone china and artifacts. The 
							glass shelves keep the focus on the pieces that are illuminated by concealed overhead LED lights.',
						array('img/DualDisplayCases.jpg'));
					
				endSection();
				startSection('Office');
				
					picAndSpecs('Printer Stand',
						'Melamine, Oak Banding',
						'Office furnishings are cut to exact specifications, to meet the needs and exceed expectations for any situation.',
						array('img/PrinterStand 1.jpg',
							'img/PrinterStand 2.jpg')
						);
						
				endSection();
				startSection('Other');
				
					picAndSpecs('Maple Wet Bar',
						'Maple, Granite, Ceramic',
						'This built in wet bar needed wood accents to match the stone and ceramics.
							 Hard rock maple was a great fit for two drawers beneath the dishwasher and two access
							 doors for additional storage and plumbing.',
						array('img/MapleWetBar.jpg'));
						
				endSection();
				
			?>
			
				<p class="centered-cloud">These are just a sample of some of my past work.  Feel free to contact me about any project you have in mind.</p>

			</div>
		</div>
		
		<?php require('../seth_footer.php'); ?>
		
	</div>
  </div>
  
  
</body>