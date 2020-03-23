<?php include 'header-Jiawei Guo.php'; ?>
<!DOCTYPE html>
<html>
            <div id="content" class="clearfix">
                <aside>
                        <h2><?php echo date("l"); ?>'s Specials</h2>
						<img src="images/burger_small.jpg" alt="Burger" title="Monday's Special - Burger">
                        <?php
						    @$object = new MenuItem($itemName, $discription, $price);
							$object->setItemName("The WP Burger");
							$object->setDiscription("Freshly made all-beef patty served up with homefries");
							$object->setPrice(" - $14");
		                    echo $object->getItemName();
		                    echo '<br>';
		                    echo $object->getDiscription();
		                    echo $object->getPrice();
		                 ?>
		                   <img src="images/kebobs.jpg" alt="Kebobs" title="WP Kebobs">
						 <?php
		                   @$object1 = new MenuItem($itemName, $discription, $price);
						   $object1->setItemName("WP Kebobs");
						   $object1->setDiscription("Tender cuts of beef and chicken, served with your choice of side");
						   $object1->setPrice(" - $17");
						   echo '<br>';
		                   echo $object1->getItemName();
		                   echo '<br>';
		                   echo $object1->getDiscription();
		                   echo $object1->getPrice();
						?>
                </aside>
                <div class="main">
                    <h1>Welcome</h1>
                    <img src="images/dining_room.jpg" alt="Dining Room" title="The WP Eatery Dining Room" class="content_pic">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h2>*Menu Recommendation*</h2>
						<?php
		                   $menuitem1 = new MenuItem("Veggie Pizza ", "A medley of tomatoes, mushrooms, and onion ", "- $13");
		                   echo $menuitem1->getItemName();
		                   echo '<br>';
		                   echo $menuitem1->getDiscription();
		                   echo $menuitem1->getPrice();
		 
		                  $menuitem2 = new MenuItem("Iced Coffee ", "Premium coffee on ice, 3 flavors to choose ", "- $6");
		                  echo '<br>';
		                  echo $menuitem2->getItemName();
		                  echo '<br>';
		                  echo $menuitem2->getDiscription();
		                  echo $menuitem2->getPrice();
		                ?>
					<h2>Book your Christmas Party!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div><!-- End Main -->
            </div><!-- End Content -->
        
		
		
    </body>
</html>
<?php include 'footer-Jiawei Guo.php'; ?>
