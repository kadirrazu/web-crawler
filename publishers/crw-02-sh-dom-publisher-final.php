<?php

include('simple_html_dom.php');

$publishersIdAsString = "4531,38,51,9239,369,8,175,586,572,1,123,91,606,642,21,58,16,7,414,609,2,226,39,1055,12035,224,117,476,4023,65,11156,14,152,2302,5785,2807,84,12,779,364,665,466,4363,2278,120,44,67,1465,5331,1614,3448,11487,11693,227,1231,182,262,55,404,408,112,6906,6854,11193,43,2773,3594,41,2491,248,9545,211,3169,503,3262,595,496,202,17,18,4126,11,42,5351,505,1065,237,1683,545,739,805,2944,6849,5060,729,2889,701,10471,4284,2665,686,77,429,3059,4388,2332,6901,1046,62,6,6952,81,4670,223,29,425,25,257,3020,749,457,793,3861";

$publishersIdAsArray = explode(',', $publishersIdAsString);

sort($publishersIdAsArray);

array_unique($publishersIdAsArray);

$publishers = [];

$baseUrl = 'https://www.rokomari.com/book/publisher/';

foreach( $publishersIdAsArray as $publisherId )
{
	$html = file_get_html( $baseUrl . $publisherId );

	$resultName = $html->find('.breadcrumb-item.active', 0)->plaintext;

	if( $resultName == '' ){
		continue;
	}

	$resultSlug = $html->find('#js--browse-sidebar-form', 0)->action;

	$resultSlug = str_replace('/book/publisher/'.$publisherId.'/', '', $resultSlug);

	$splittedResultName = explode('-', $resultName);

	$publishers[] = [
		'title_bn' => trim($splittedResultName[1]),
		'title_en' => trim($splittedResultName[0]),
		'slug' => trim($resultSlug)
	];

}

$insertString = '';

foreach( $publishers as $publisher )
{

	$insertString .= "INSERT INTO `publishers` (`id`, `title_bn`, `title_en`, `slug`, `status`, `created_at`, `updated_at`) VALUES (NULL, '".$publisher['title_bn']."', '".$publisher['title_en']."', '".$publisher['slug']."', '1', NOW(), NOW());";

}

$content = file_put_contents('publishers-data-2.txt', $insertString);


echo '<pre>';
print_r( $publishers );
echo '</pre>';

echo 'Total Items: ' . count($publishers) . '<br>';
echo "Data was written in the text file. Check!";

