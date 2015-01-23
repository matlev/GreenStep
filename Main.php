<html>
<head>
    <title>EcoBase</title>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">  
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-select.css" rel="stylesheet">
    <link href="css/getStarted.css" rel="stylesheet">
    <link href="css/reveal.css" rel="stylesheet" >
    <link href="css/excelcss.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.js"></script>
    <script type="text/javascript" src="js/excelscript.js"></script>
    <script type = "text/javascript" src = "js/ecoAjax.js"></script> 
</head>

<body>
    <div class="container">
        <div class="tabbable boxed parentTabs">
            <ul class="nav nav-tabs" style="font-size:initial; width:auto">
                <li class="nav-tab-main active"><a href="#welcome">Welcome</a></li>
                <li class="nav-tab-main"><a href="#getstarted">Get Started</a></li>
                <li class="nav-tab-main"><a href="#measure">Measure</a></li>
                <li class="nav-tab-main"><a href="#report">Report</a></li>
                <li class="nav-tab-main"><a href="#reduce">Reduce</a></li>
                <li class="nav-tab-main"><a href="#offset">Offset</a></li>
                <h4 style="float:right; color:red" >Beta V 0.2</h4><a href="Main"><img src="img/logo.gif"style="margin-top: 1.2%; float:right; width: 7%"></a>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="welcome">
                    <?php include('welcome.html');?>
                </div>

                <div class="tab-pane" id="getstarted">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#corp">Corporate</a></li>
                            <li><a href="#bu">Business Units</a></li>
                            <li><a href="#es">Emission Sources</a></li>
                            <li><a href="#access">Access</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="corp">
                               <?php include('gsCorporate.php');?>  
                           </div>
                           <div class="tab-pane" id="bu">
                            <?php include('gsBusinessUnits.php');?>
                        </div>
                        <div class="tab-pane" id="es">
                            <?php include('gsEmissionSources.php');?>
                        </div>
                        <div class="tab-pane" id="access">
                            <?php include('gsAccess.php');?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="measure">
                <?php include('Measure.html');?>
            </div>

            <div class="tab-pane" id="report">
                <?php include('Report.html');?>      
            </div>

            <div class="tab-pane" id="reduce">
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#check">Reduction Checklist</a></li>
                        <li><a href="#calc">Reduction Calculator</a></li>
                        <li><a href="#whatif">What-If Tool</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="check">
                            <?php include('reductionchecklist.html');?>      
                        </div>
                        <div class="tab-pane" id="calc">
                            <?php include('reductioncalculator.php');?>
                        </div>
                        <div class="tab-pane" id="whatif">
                            <?php include('whatiftool.php');?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="offset">
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#carboffsets">Carbon Offsets</a></li>
                        <li><a href="#carbneutral">Go Carbon Neutral</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="carboffsets">
                            <?php include('carboffset.php');?>
                        </div>
                        <div class="tab-pane" id="carbneutral">
                            <?php include('cabonneutral.php');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("ul.nav-tabs a").click(function (e){
            e.preventDefault(); 
            $(this).tab('show');

            var tabID = $(this).attr('href').slice(1);

            // Handles nav clicks to load the correct content depending on the requested tab.  Not all tabs need a pull request.
            switch (tabID) {
                // These do the same thing
                case "getstarted":
                case "corp":
                    //var response = 
                    console.log(parseAction("corp", "pull", null, tabID));
                    break;
            }
        });

        $('#welcome a').on('click', function(e){
            e.preventDefault();

            var tabID = $(this).attr('href');
            $('ul.nav-tabs a[href = ' + tabID + ']').tab('show');

            // Calls a pull request for the default sub-tab that is opened when you click on an image (note: not all sub-tabs necessarily require a pull on load)
            switch (tabID) {
                case "#getstarted":
                    var response = parseAction("corp", "pull", null, tabID);
                    break;
            }
        });
    </script>
</body>
</html>