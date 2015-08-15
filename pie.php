<?php 
	require_once("class/pData.class.php");
	require_once("class/pDraw.class.php");
	require_once("class/pPie.class.php");
	require_once("class/pImage.class.php");

/* Create and populate the pData object */
	$MyData = new pData();   
	$MyData->addPoints(array(97, 120, 32, 12, 5),"ScoreA");

/* Define the absissa serie */
	$MyData->addPoints(array("Coca","Leffe blonde", "Bounty", "Oasis Zero", "Mars"),"Labels");
	$MyData->setAbscissa("Labels");

/* Create the pChart object */
	$myPicture = new pImage(500,300,$MyData);

/* Draw a solid background */
	$Settings = array("R"=>251, "G"=>222, "B"=>24);
	$myPicture->drawFilledRectangle(0,0,500,300,$Settings);

/* Create the pPie object */ 
	$PieChart = new pPie($myPicture,$MyData);

	$PieChart->setSliceColor(0,array("R"=>255,"G"=>0,"B"=>0));
	$PieChart->setSliceColor(1,array("R"=>0,"G"=>255,"B"=>0));
	$PieChart->setSliceColor(2,array("R"=>0,"G"=>0,"B"=>255));
	$PieChart->setSliceColor(3,array("R"=>255,"G"=>255,"B"=>0));
	$PieChart->setSliceColor(4,array("R"=>0,"G"=>255,"B"=>255));

 /* Draw a splitted pie chart */ 
	$PieChart->draw2DPie(250,150,array(
										"Radius" => 100,
										"WriteValues"=>PIE_VALUE_NATURAL,
										"ValueR" => 0,
										"ValueG" => 0,
										"ValueB" => 0,
										"DataGapAngle"=>10,
										"DataGapRadius"=>6,
										"Border"=>TRUE,
										"BorderR"=>0,
										"BorderG"=>0,
										"BorderB"=>0
									));

	$PieChart->drawPieLegend(15,40,array(
										"Alpha"=>20,
										"Style" => LEGEND_ROUND
										));

	$myPicture->stroke();

