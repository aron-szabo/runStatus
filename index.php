<!--Note:
  Adjust max-width of .statusImage to set sizes of run names and statuses. They are PNG images. Each run has a png image
  for open and closed. Adjusting max-height will cause the widths to be slightly off because the PDF I got th image from
  is not all the same width if you look closely. 
-->
<?php

include('xml.php');

//Refreshses Page Every Hour
$page = $_SERVER['PHP_SELF'];
$sec = "3600";

?>
<!DOCTYPE html>
<html>
<head>
  
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
  
  <title>Run Status Report</title>
  
  <script src="script.js"></script>
  
  <style>
  #mainContainer{
    margin:0 auto;
    text-align:center;
    width:95%;
  }

  .areaContainer{
    margin: 1em;
    padding: 0.5em;
    text-align: left;
  }

  #page1,#page2,#page3,#page4{
    height: 100vh;
  }

  .statusImage{
    max-width: 390px;
  }

  .isHidden{
    display:none;
  }

  .notHidden{
    display:block;
  }

  .areaHeader{
    color: red;
    font-weight: bold;
    font-family: sans-serif;
    text-align: left;
    width:100%;
  }

  #headerImage{
    position: absolute;
    z-index: -1;
    width: 100%;
  }

  #pageHeader{
    text-align:center;
  }

  #title{
    color:white;
    font-family: sans-serif;
    color: white;
    font-family: sans-serif;
    font-size: 4em;
    padding-top: .7em;
    margin-bottom: 2em;

  }

  body{
    background-color:#f2f3f6;
  }

  #disclaimer{
    font-size: 1.75em;
    margin-bottom: 0em;
    padding-bottom: 0em;
    padding-top: 0em;
    margin-top: 0em;
  }

  #date{
    margin-bottom:0em;
    padding-bottom:0em;
  }

  @media screen and (min-width: 1900px) {
  .statusImage{
    
  }
} 

 
  
  </style>
</head>


<body>
  <img id='headerImage'src='imgs/header.jpg'></img>
  
  <div id='pageHeader'>
    <h1 id='title'>Run Status Report</h1>
    <h1 id='date'></h1>
    <p id='disclaimer'>Run Status Report is issued each morning. Run openings may be delayed due to weather or avalanche control work, and status may change without notice.</p>
  </div>
  
  <div id='mainContainer'>
    
    <div class='page notHidden' id='page1'>
      <?=  makeTable($statusArrayLowerFrontSide,'lowerFrontSide','LOWER FRONT SIDE');?>
      <?=  makeTable($statusArrayUpperFrontSide,'upperFrontSide','UPPER FRONT SIDE');?>
    </div>
   
    <div class='page isHidden' id='page2'>
      <?=  makeTable($statusArrayPtarmigan,'ptarmigan','PTARMIGAN');?>
      <?=  makeTable($statusArrayEagleRidge1and2,'ER12',"EAGLE RIDGE 1 & 2");?>
      <?=  makeTable($statusArrayEagleRidge3,'ER3','EAGLE RIDGE 3');?>
    </div>

    <div class='page isHidden' id='page3'>
      <?=  makeTable($statusArrayParadiseBowl,'paradiseBowl','PARADISE BOWL');?>
      <?=  makeTable($statusArrayEagleRidge6and7,'ER67','EAGLE RIDGE 6 & 7');?>
      <?=  makeTable($statusArraySaddleBackBowl,'saddleBackBowl','SADDLE BACK BOWL');?>
    </div>

    <div class='page isHidden' id='page4'>
      <?=  makeTable($statusArrayWhiteHorn1,'whiteHorn1','WHITEHORN 1');?>
      <?=  makeTable($statusArrayWhiteHorn2,'whiteHorn2','WHITEHORN 2');?>
    </div>

  </div>
</body>


</html>

