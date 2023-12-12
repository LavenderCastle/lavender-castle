<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '<ul itemscope itemtype="http://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$strReturn .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .=  '<div itemprop="item"><a itemprop="name" href="'.$arResult[$index]["LINK"].'">'.$title.'</a></div>';
	}
	else
	{
		$strReturn .= '<div><span>'.$title.'</span></div>';
	}
	$strReturn .= '</li>';
}
$strReturn .= '</ul>';
return $strReturn;
