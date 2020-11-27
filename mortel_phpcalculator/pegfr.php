<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eGFR Calculator</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="css/style.css">-->
    <!-- jQuery (Bootstrap JS plugins depend on it) -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    
    <style>
      .label{
        font-size: 20px;
        color: #777;
      }

      #header-nav{
        background-color: lightblue;
        vertical-align: center;
      }
      #result-textbox{
        font-size: 24px;
        width: 90px;
        height: 40px;
        text-align: center;
        font-weight: bold;
        color: #337ab7;
      }
      #result-textbox:hover{
        cursor: none;
      }

      #answer{
        display: inline-flex;
        padding:15px;
        margin: 5px;
        border: 1px solid darkgray;
        align-items: center;

      }

      .navbar h1{
        color: black;
        font-weight: bold;
      }

      * {
        font-family: sans-serif;
        text-decoration: none;
        color: #777;
      }

      h1 {
        margin-top: 5px;
        margin-bottom: 5px;
        padding: 0px;
        font-size: 22px;

      }

      h2{
        font-weight: bold;
      }

      p, ul {
        margin: 10px;
        font-size: 18px;
      }

      li{
        text-align: justify;
      }

      .text-indent-left{
        padding-left: 35px;
      }
      #nav-list{
        background-color: #fff;
        color: #337ab7;
        font-size: 18px;
        border: 1px solid #2e6da4;
      }

      #nav-list:hover{
        background-color: #337ab7;
        color: #fff;
      }

      #site-name{
        font-size: 38px;
      }
      #header-nav{
        border-radius: 0;
      }
      #side-nav{
        padding-left:40px;
        font-size: 24px;
      }
      #titleckd{
        margin-top: -20px;
      }
      #span-item{
        font-size: 23px;
        display: inline-block;
        vertical-align: middle;
      }
      #span-item:hover{
        color: teal;
        font-weight: bold;
        cursor: pointer;
      }
      #line-break{
        padding-top: 20px;
        border-top: 1px solid teal;
        margin-top:20px;
      }
      #calc-button{
        font-size: 24px;
      }
      #calc-button:hover{
        background-color: #fff;
        color: #337ab7;
      }
      #given-data{
        font-size: 20px;
        padding: 20px 0px 20px 0px;
      }
      #input-textbox{
        width: 200px;
      }
      #formula{
        border: 2px solid #337ab7;
        border-radius: 3px;
        padding: 10px
      }
      #height{
        margin-left: -140px;
      }
      #serumcrea{
        margin-left: -40px;
      }
    </style>
  </head>

<body>
  <nav id="header-nav" class="navbar-default">
    <div class="container">
      <div class="navbar-header">
        <div class="navbar-header">
          <button id="nav-button" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a id="site-name" class="navbar-brand" href="index.php">eGFR Calculator</a>
        </div>

        <div id="collapsable-nav" class="collapse navbar-collapse">
          <ul class="nav navbar-nav visible-xs navbar-right">
            <li class="text-center" id="nav-list"><a href="index.php">eGFR Calculator</a></li>
            <li class="text-center" id="nav-list"><a href="creacystatin.php">Creatinine-Cystatin Equation</a></li>
            <li class="text-center" id="nav-list"><a href="pegfr.php">Pediatric eGFR</a></li>
            <li class="text-center" id="nav-list"><a href="about.php">About Us</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
    
  <div id="main-content" class="container-fluid">
    <div id="home-tiles" class="row">
      <div class="col-md-8 col-sm-8 col-xs-12" id="left-div">
      <h2 class="text-center">CREATININE-BASED "BEDSIDE&nbsp;SCHWARTZ" EQUATION&nbsp;(2009)</h2>
        <!--FORM TO GET DATA FOR CALCULATION-->
        <form action="" method="POST" id="given-data">
          <div class="form-group"><!--SERUM CREA-->
          <center>
            <label for="SCr" id="serumcrea">Serum Creatinine:</label>
            <input type="text" class="form-control" name="scr" id="input-textbox" placeholder="in mg/dL" 
            value="<?php if(isset($_POST['scr'])){$scr=$_POST['scr']; echo htmlentities($_POST['scr']);}?>">
          </center>
          </div>
          <div class="form-group"><!--HEIGHT-->
            <center>
            <label for="height" id="height">Height:</label>
            <input type="text" class="form-control" name="height" id="input-textbox" placeholder="in cm"
            value="<?php if(isset($_POST['height'])){$height=$_POST['height']; echo htmlentities($_POST['height']);}?>">
            </center>
          </div>
          
          <center><!--CALCULATE BUTTON-->  
            <input type="submit" class="btn btn-primary" name="submit1" id="calc-button" value="Calculate"></input>
          </center>
        </form>

        <!--PHP CODE ONCE CALCULATE BUTTON IS CLICKED-->    
        <?php
          if(isset($_POST["submit1"])){         
            if ((!isset($scr) || trim($scr) == '') || (!isset($height) || trim($height) == '') || $scr <= 0 || $height <= 0 )
            {
              echo "PLEASE FILL OUT THE REQUIRED FIELDS PROPERLY.";
              $epiresult = "";
            }
            else {
              $epiresult = 0.413 * ($height/$scr);
              $epiresult = round($epiresult,0);
            }}//close else
        ?><!--END OF PHP CALCULATION-->

        <form action="" method="POST" class="form-inline">
              <center>
                <div class="form-group" id="answer">
                <label for="epi" class="label">eGFR is: </label>    
                <input type="text" name="epi" id="result-textbox" class="form-control" disabled value="<?php if(isset($_POST["submit1"])) {echo htmlentities($epiresult);} ?>" /> 
                <label for="epi" class="label">mL/min/1.73m<sup>2</sup></label>
                </div> 
              </center>
        </form>
        

        <h2 id="line-break" class="text-left">FORMULA</h2>
          <p class="text-justify">Expressed as a single equation:<br>
          <p class="text-center" id="formula">eGFR = 0.413 * (height/SCr)</p>
          <p><br>where:<br></p>
          <p class="text-indent-left">eGFR (estimated glomerular filtration rate) = mL/min/1.73 m<sup>2</sup><br>
          SCr (standardized serum creatinine) = mg/dL<br>
          height = in cm<br>
          </p>

          <h2 id="line-break">CLINICAL USE</h2>
          <ul>
            <li>For use in children 1-18 years old.</li>
            <li>The formula was updated in 2009 and is currently considered the best method for estimating GFR in children. It is known as the “Bedside Schwartz” formula.</li>
            <li>It is devised for use with creatinine methods with calibration traceable to IDMS. All laboratories should be using creatinine methods calibrated to be IDMS traceable.</li>
          </ul>
        
      </div><!--END OF <div class="col-md-8 col-sm-8 col-xs-12">-->
    
      <div id="side-nav" class="col-md-4 col-sm-4 col-xs-12 hidden-xs">
        <span id="span-item"></span><br>
        <span id="span-item"><a href="index.php">eGFR Calculator</a></span><br>
        <span id="span-item"><a href="creacystatin.php">Creatinine-Cystatin</a></span><br>
        <span id="span-item"><a href="pegfr.php">Pediatric eGFR</a></span><br>
        <span id="span-item"><a href="about.php">About This Calculator</a></span><br>
      </div>
    </div>
  </div>
</body>
</html>