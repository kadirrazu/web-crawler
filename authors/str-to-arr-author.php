<?php

$authorsIdAsString = "1,93,7054,3182,4195,4207,50,2496,5717,15240,318,8549,25,1247,930,9157,7245,4378,2254,1224,2546,2444,5184,610,1165,2559,171,2210,846,975,3298,1009,3471,26452,42364,6774,1566,49301,4658,6684,47902,25060,3064,1937,20582,1687,2491,6019,550,25907,30837,26082,40845,15259,14877,6705,9175,14353,53075,8325,31918,39876,6703,3031,32,60139,2430,63,783,5360,60053,8075,2187,426,15615,7088,6,1209,968,2145,29171,8993,82203,1759,14326,23750,40266,30813,49512,39874,10827,6863,3625,44261,3696,2490,176,2423,21399,2232,195,60639,33347,30632,13423,82961,6693,367,159,9757,27009,5905,6389,80987,12,2190,14277,5340,23843,1742,40707,2185,12503,3180,14864,9221,13171,74624,80898,85361,12850,26297,81140,20292,2505,80215,80216,3285,2392";

$authorsIdAsArray = explode(',', $authorsIdAsString);

sort($authorsIdAsArray);

echo '<pre>';
print_r( $authorsIdAsArray );
echo '</pre>';