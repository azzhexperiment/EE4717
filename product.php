<?php

/**
 * Models
 */

include_once('models/auth.php');
// include('model/connect-db.php');
$imageNum = 4;

/**
 * Variables
 */

$productName = 'Product Name';

$title = $productName . 'Shop product - CLEO & AZZH Collection';

$productDescription = 'Bacon ipsum dolor amet capicola doner fatback picanha kielbasa pancetta leberkas burgdoggen pig shankle ball tip kevin landjaeger beef ribs. Filet mignon t-bone short loin pancetta chislic. Fatback venison ham hock pancetta cow shankle tongue prosciutto filet mignon landjaeger pork chop. Ham hock picanha short ribs bresaola tri-tip salami short loin alcatra ground round sirloin chicken pork belly. Buffalo boudin kielbasa kevin meatball strip steak prosciutto hamburger pork chop filet mignon shoulder pork loin.

Tail cupim meatloaf chicken leberkas. Ham tail alcatra fatback cow turkey corned beef. Filet mignon salami pastrami drumstick pancetta, cupim brisket short loin ground round andouille. Bacon drumstick leberkas tri-tip ball tip, chuck shoulder beef ground round short loin pork. Hamburger picanha prosciutto kevin, sausage corned beef jowl beef filet mignon andouille t-bone alcatra flank brisket. Burgdoggen porchetta turkey, leberkas venison ham hock chislic pastrami tail. Spare ribs venison beef ribs, short ribs fatback meatloaf flank shoulder ball tip alcatra landjaeger.';

$productPrice = 10;

include_once('lang/listings.php');


/**
 * Layouts
 */

include_once('layouts/common/header.php');

// START OF MAIN CONTENT

echo '<main>';

include_once('layouts/product.php');
// include_once('layouts/recommendation.php');

echo '</main>';

// START OF MAIN CONTENT

include_once('layouts/common/footer.php');
