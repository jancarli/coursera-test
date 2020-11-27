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
      #age{
        margin-left: -150px;
      }
      #serumcrea{
        margin-left: -28px;
      }
      #serumcystatin{
        margin-left: -45px;
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
      <h2 class="text-center">CKD-EPI CREATININE-CYSTATIN EQUATION&nbsp;(2012)</h2>
        <!--FORM TO GET DATA FOR CALCULATION-->
        <form action="" method="POST" id="given-data">
          <div class="form-group"><!--SERUM CREA-->
          <center>
            <label for="SCr" id="serumcrea">Serum Creatinine:</label>
            <input type="text" class="form-control" name="scr" id="input-textbox" placeholder="in mg/dL" 
            value="<?php if(isset($_POST['scr'])){$scr=$_POST['scr']; echo htmlentities($_POST['scr']);}?>">
          </center>
          </div>
          <div class="form-group"><!--SERUM CYSTATIN-->
          <center>
            <label for="SCys" id="serumcystatin">Serum Cystatin:</label>
            <input type="text" class="form-control" name="scys" id="input-textbox" placeholder="in mg/dL" 
            value="<?php if(isset($_POST['scr'])){$scys=$_POST['scys']; echo htmlentities($_POST['scys']);}?>">
          </center>
          </div>
          <div class="form-group"><!--AGE-->
            <center>
            <label for="age" id="age">Age:</label>
            <input type="text" class="form-control" name="age" id="input-textbox" placeholder="in years"
            value="<?php if(isset($_POST['age'])){$age=$_POST['age']; echo htmlentities($_POST['age']);}?>">
            </center>
          </div>
          <div class="form-group"><!--GENDER-->
            <center>
            <label for="gender">Gender:  </label>
            <label class="radio-inline">
            <input type="radio" id="male" name="gender" checked value="male" 
            <?php if (isset($_POST['gender']) && $_POST['gender'] == 'male') echo 'checked="checked"';?>>Male
            </label>
            <label class="radio-inline">
            <input type="radio" id="female" name="gender" value="female"
            <?php if (isset($_POST['gender']) && $_POST['gender'] == 'female') echo ' checked="checked"';?>>Female
            </label>
            </center>
          </div>
          <div class="form-group"><!--RACE-->
            <center>
            <label for="race">Race:  </label>
            <label class="radio-inline">
            <input type="radio" id="black" name="race" checked value="black"
            <?php if (isset($_POST['race']) && $_POST['race'] == 'black') echo ' checked="checked"';?>>Black
            </label>
            <label class="radio-inline">
            <input type="radio" id="others" name="race" value="others" 
            <?php if (isset($_POST['race']) && $_POST['race'] == 'others') echo ' checked="checked"';?>>Others
            </label>
            </center>
          </div>
          
          <!--JS TO GET VALUE OF RADIOBUTTON-->            
          <script type="text/javascript">
            document.getElementById('race').value = "<?php $race=$_POST['race']; echo $_POST['race']; ?>";
          </script>

          <script type="text/javascript">
            document.getElementById('gender').value = "<?php $gender=$_POST['gender']; echo $_POST['gender']; ?>";
          </script>

          <center><!--CALCULATE BUTTON-->  
            <input type="submit" class="btn btn-primary" name="submit1" id="calc-button" value="Calculate"></input>
          </center>
        </form>

        <!--PHP CODE ONCE CALCULATE BUTTON IS CLICKED-->    
        <?php
          if(isset($_POST["submit1"])){         
            if ((!isset($scr) || trim($scr) == '') || (!isset($scys) || trim($scys) == '') || (!isset($age) || trim($age) == '') || (!isset($gender) 
              || trim($gender) == '') || (!isset($race) || trim($race) == '' || $scr <= 0 || $age <= 0 ))
            {
              echo "PLEASE FILL OUT THE REQUIRED FIELDS PROPERLY.";
              $epiresult = "";
            }
            else {
              //FOR MALES
              if ($gender == 'male'){ 
                if($race == 'black'){                
                  $epiresult = 135 * pow(min(($scr/0.9),1),-0.207) * pow(max(($scr/0.9),1),-0.601) * pow(min(($scys/0.8),1),-0.375) * pow(max(($scys/0.8),1),-0.711) * pow(0.995,$age) * 1.08;
                  $epiresult = round($epiresult,0);  
                  }
                else if ($race == 'others'){
                  $epiresult = 135 * pow(min(($scr/0.9),1),-0.207) * pow(max(($scr/0.9),1),-0.601) * pow(min(($scys/0.8),1),-0.375) * pow(max(($scys/0.8),1),-0.711) * pow(0.995,$age);
                  $epiresult = round($epiresult,0);
                  }
                }
              //FOR FEMALES
              else if ($race == 'black'){
                  $epiresult = 135 * pow(min(($scr/0.7),1),-0.248) * pow(max(($scr/0.7),1),-0.601) * pow(min(($scys/0.8),1),-0.375) * pow(max(($scys/0.8),1),-0.711) * pow(0.995,$age) * 0.969 * 1.08;
                  $epiresult = round($epiresult,0);  
                  }
              else if ($race == 'others'){
                  $epiresult = 135 * pow(min(($scr/0.7),1),-0.248) * pow(max(($scr/0.7),1),-0.601) * pow(min(($scys/0.8),1),-0.375) * pow(max(($scys/0.8),1),-0.711) * pow(0.995,$age) * 0.969;
                  $epiresult = round($epiresult,0);            
                  }
              }//close if($gender == 'male')
            }//close else
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
          <p class="text-center" id="formula">eGFR = 135 x&nbsp;min&nbsp;(SCr/&kappa;,&nbsp;1)<sup>&alpha;</sup> x&nbsp;max&nbsp;(SCr/&kappa;,&nbsp;1)<sup>-0.601</sup> x&nbsp;min&nbsp;(SCys/0.8,&nbsp;1)<sup>-0.375</sup> x&nbsp;max&nbsp;(SCys/0.8,&nbsp;1)<sup>-0.711</sup> x&nbsp;0.995<sup>age</sup> x&nbsp;0.969&nbsp;[if&nbsp;female] x&nbsp;1.08&nbsp;[if&nbsp;Black]</p>
          <p><br>where:<br></p>
          <p class="text-indent-left">eGFR (estimated glomerular filtration rate) = mL/min/1.73m<sup>2</sup><br>
          SCr (standardized serum creatinine) = mg/dL<br>
          SCys (standardized serum cystatin C) = mg/L<br>
          &kappa; = 0.7 (females) or 0.9 (males)<br>
          &alpha; = -0.248 (females) or -0.207 (males)<br>
          min(SCr/&kappa;,&nbsp;1) = indicates the minimum of SCr/&kappa; or 1<br>
          max(SCr/&kappa;,&nbsp;1) = indicates the maximum of SCr/&kappa; or 1<br>
          min(SCys/0.8,&nbsp;1) = indicates the minimum of SCys/0.8 or 1<br>
          max(SCys/0.8,&nbsp;1) = indicates the maximum of SCys/0.8 or 1<br>
          age = years<br>
          </p>

          <h2 id="line-break">CLINICAL USE</h2>
          <ul>
            <li>Designed for use with standardized creatinine values that are calibrated to be IDMS traceable and standardized cystatin C values.</li>
            <li>May provide more accurate estimates in patients with differences in diet, extremes of muscle mass (such as body builders or patients with muscle wasting), or those outside the boundaries of where the MDRD Study equation has been validated.</li>
            <li>May also prove useful in estimating change in eGFR over time in people with changing muscle mass or diet.</li>
            <li>May have a role in identifying persons with CKD who have the highest risk for complications.</li>
            <li>Cystatin C is a basic protein produced by all nucleated cells. It is freely filtered by the glomerulus and reabsorbed and metabolized by tubular cells, with only small amounts excreted in the urine. It is reported to be generated at a relatively constant rate, irrespective of muscle mass.</li>
            <li>The original formula was re-expressed in 2011 for standardized cystatin C.</li>
            <li>Developed in 2008 by the Chronic Kidney Disease Epidemiology Collaboration (CKD-EPI).</li>
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