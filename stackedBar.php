<?php
	session_start();
	require_once("class/pData.class.php");
	require_once("class/pDraw.class.php");
	require_once("class/pImage.class.php");

	$id = $_GET['id'];

	$MyData = new pData();

	$MyData->addPoints($_SESSION['SB'][$id]['villa'],"Villa");
	$MyData->addPoints($_SESSION['SB'][$id]['college'],"College");
	$MyData->addPoints($_SESSION['SB'][$id]['gym'],"Gymnase");

	/* Define the absissa serie */
	$MyData->setAxisName(0,"Ventes");

	$MyData->addPoints($_SESSION['SB'][$id]['lab'],"Labels");
	$MyData->setAbscissa("Labels");

	/* Set Colors */
	$serieSettings = array("R"=>255,"G"=>0,"B"=>0,"Alpha"=>80);
	$MyData->setPalette("Villa",$serieSettings);

	$serieSettings = array("R"=>0,"G"=>255,"B"=>0,"Alpha"=>80);
	$MyData->setPalette("College",$serieSettings);

	$serieSettings = array("R"=>0,"G"=>0,"B"=>255,"Alpha"=>80);
	$MyData->setPalette("Gymnase",$serieSettings);

	/* Create the pChart object */
	$myPicture = new pImage($_SESSION['SB'][$id]['x'],$_SESSION['SB'][$id]['y'],$MyData);

	$Settings = array("R"=>251, "G"=>222, "B"=>24);
	$myPicture->drawFilledRectangle(0,0,$_SESSION['SB'][$id]['x'],$_SESSION['SB'][$id]['y'],$Settings);

	/* Set the default font properties */
	$myPicture->setFontProperties(array("FontName"=>"fonts/pf_arma_five.ttf","FontSize"=>8));

	/* Draw the scale and the chart */
	$myPicture->setGraphArea(40,20, $_SESSION['SB'][$id]['x'] - 20,$_SESSION['SB'][$id]['y'] - 40);

	$AxisBoundaries = array(0=>array("Min"=>0,"Max"=>$_SESSION['SB'][$id]['max']));
	$ScaleSettings = array("DrawSubTicks"=>TRUE, "Mode"=>SCALE_MODE_MANUAL,"ManualScale"=>$AxisBoundaries);

	$myPicture->drawScale($ScaleSettings);
	$myPicture->setShadow(FALSE);

	$Palette = array(
					"0"=>array("R"=>255,"G"=>0,"B"=>0,"Alpha"=>100),
					"1"=>array("R"=>0,"G"=>255,"B"=>0,"Alpha"=>100),
					"2"=>array("R"=>0,"G"=>0,"B"=>255,"Alpha"=>100)
					);


	$myPicture->drawStackedBarChart(array("DisplayValues"=>TRUE));

	/* Write the chart legend */
	$myPicture->drawLegend(50, $_SESSION['SB'][$id]['y'] - 15,array("Style"=>LEGEND_ROUND, "Mode"=>LEGEND_HORIZONTAL));

	$myPicture->stroke();
	// $myPicture->render("img/charts/" .$_SESSION['SB'][$id]['name']. ".png");
