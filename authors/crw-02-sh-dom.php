<?php

include('simple_html_dom.php');

$author_id_start = 1;
$author_id_end = 10;

$authors = [];

$refAuthorsId = [
	
];

$baseUrl = 'https://www.rokomari.com/book/author/';

for( $i = $author_id_start; $i<=$author_id_end; $i++ )
{
	$html = file_get_html( $baseUrl . $i );

	$resultName = $html->find('.breadcrumb-item.active', 0)->plaintext;

	if( $resultName == '' ){
		continue;
	}

	$resultSlug = $html->find('#js--browse-sidebar-form', 0)->action;

	$resultSlug = str_replace('/book/author/'.$i.'/', '', $resultSlug);

	$splittedResultName = explode('-', $resultName);

	$authors[] = [
		'title_bn' => trim($splittedResultName[1]),
		'title_en' => trim($splittedResultName[0]),
		'slug' => trim($resultSlug)
	];

}

echo '<pre>';
print_r( $authors );
echo '</pre>';

