<html>
<head>
    <title>EcoBase</title>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">  
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-select.css" rel="stylesheet">
    <link href="css/getStarted.css" rel="stylesheet">
    <link href="css/reveal.css" rel="stylesheet" >
    <link href="css/excelcss.css" rel="stylesheet">
    <link href="css/pamcss.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.js"></script>
    <script type="text/javascript" src="js/excelscript.js"></script>
    <script type = "text/javascript" src = "js/ecoAjax.js"></script> 
    <script type = "text/javascript" src = "js/jquery.serialize-object.min.js"></script> 
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
                <h4 style="float:right; color:red" >Beta V 0.7</h4><a href="Main"><img src="img/logo.gif"style="margin-top: 1.2%; float:right; width: 7%"></a>
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
                <?php include('Measure.php');?>
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
        var esInitCheck = false;

        $("ul.nav-tabs a").click(function (e){
            e.preventDefault(); 
            $(this).tab('show');

            var tabID = $(this).attr('href').slice(1);
            
            /*********API STARTS HERE***********/
            // Handles nav clicks to load the correct content depending on the requested tab.  Not all tabs need a pull request.
            switch (tabID) {
                // These do the same thing
                case "getstarted":
                case "corp":
                    parseAction("corp", "pull", null)
                        .success(function(data) {
                            //console.log(data);
                            load_gsCorp(data);
                        })
                        .fail(function(){
                            console.log("Error handling request 'pull' in tab '" + tabID + "'' called by element " + $(this).attr('id'));
                        });

                    break;
                case "bu":
                    parseAction("bu", "pull", null)
                        .success(function(data) {
                            console.log(data);
                            var data = data.data;
                            var units = data.accUnits; // an array of names of access units in the database
                            var accUnitHTML;
                            var length = units.length;
                            for(i = 0; i < length; i++){
                                if(i == 0){
                                    accUnitHTML += "<option value = " + units[i] + " selected = 'selected'>" + units[i] + "</option>";
                                } else {
                                    accUnitHTML += "<option value = " + units[i] + ">" + units[i] + "</option>";
                                }
                            }
                            $('#selBU').empty().html(accUnitHTML);
                            load_gsBusiness(data);
                        })
                        .fail(function(){
                            console.log("Error handling request 'pull' in tab '" + tabID + "'' called by element " + $(this).attr('id'));
                        });

                    break;
                case "access":
                    parseAction("access", "pull", null)
                    .success(function(result) {
                        var data = result.data;

                        var units = data.accUnits; // an array of names of access units in the database
                        
                        var accUnitHTML;

                        var length = units.length;
                        
                        for(i = 0; i < length; i++){
                            if(i == 0){
                                accUnitHTML += "<option value = " + units[i] + " selected = 'selected'>" + units[i] + "</option>";
                            } else {
                                accUnitHTML += "<option value = " + units[i] + ">" + units[i] + "</option>";
                            }
                        }
                        
                        var users = data.accUsers // an array of names of access units in the database
                        var pass = data.userPassword;
                        var employeeId=data.employeeId;
                        var accUserHTML;
                        var length = users.length;
                        
                        for(i = 0; i < length; i++){
                            if(i == 0){
                                accUserHTML += "<option value = " + employeeId[i] + " selected = 'selected' >" + users[i] + "</option>";



                            } else {
                                accUserHTML += "<option value = " + employeeId[i] +">" + users[i] + "</option>";


                            }
                        }
                        var pass=data.userPassword;
                        var role = data.userRole;

                        $('#accessUnit').empty().html(accUnitHTML);
                        $('#accessUser').empty().html(accUserHTML);
                        $('#username').val($('#accessUser option:selected').text());

                        var  userIndex=$('#accessUser option:selected').index();
                        
                        $('#password').val(pass[userIndex]);                       
                    })
                    .fail(function() {

                    });

                    break;
                    case "es":
                        if(!esInitCheck){ 
                             parseAction("es", "pull", null)
                                .success(function(result){
                                    //console.log(data);
                                    esInitCheck = true;

                                    var data = result.data;
                                    var units = data.loadUnits;
                                    var loadUnitHTML;
                                    for(i=0; i < units.length; i++){
                                        if(i == 0){
                                            loadUnitHTML += "<option value = " + units[i] + " selected = 'selected'>" + units[i] + "</option>";
                                        } else{
                                            loadUnitHTML += "<option value = " + units[i] + ">" + units[i] + "</option>";
                                        }
                                    }
                                    $('#esBusUnits').empty().html(loadUnitHTML);
                                    //load_gsEmissionSources(data);
                                })
                                .fail(function(){
                                    console.log("Error handling request 'pull' in tab '" + tabID + "'' called by element " + $(this).attr('id'));
                                });
                        };
                    break;
                    
                    case "offset":

                     var data= "bUnit="+ $('#offsetorg').val();
                     var page= "offset";
                     var action= "pull";
                       parseAction("measure", "pull", null)
                            .success(function(result) {

                              var data = result.data;
                        var units = data.loadUnits;
                        var loadUnitHTML;
                        for(i=0; i < units.length; i++){
                            if(i == 0){
                                loadUnitHTML += "<option value = " + units[i] + " selected = 'selected'>" + units[i] + "</option>";
                            } else{
                                loadUnitHTML += "<option value = " + units[i] + ">" + units[i] + "</option>";
                            }
                        }
                        $('#offsetorg').html(loadUnitHTML);
                        $('#offsetorg2').html(loadUnitHTML);

                        // Pull scope from gb_category from the database
                        var scope = data.loadScope;
                        var loadScopeHTML;
                        for(j=0; j < scope.length; j++){
                            if(scope[j] != "") {
                                if(j == 0){
                                    loadScopeHTML += "<option value = '" + scope[j] + "' selected = 'selected'>" + scope[j] + "</option>";
                                } else{
                                    loadScopeHTML += "<option value = '" + scope[j] + "'>" + scope[j] + "</option>";
                                }
                            }
                        }
                        // Pull scope from gb_division2misc (user input from 'defined')
                        var scopePersonal = data.loadScopePersonal;
                        for(k=0; k < scopePersonal.length; k++){
                            if(scopePersonal[k] != ""){
                                if(k == 0){
                                    loadScopeHTML += "<option value = '" + scopePersonal[k] + "' selected = 'selected'>" + scopePersonal[k] + "</option>";
                                } else{
                                    loadScopeHTML += "<option value = '" + scopePersonal[k] + "'>" + scopePersonal[k] + "</option>";
                                }
                            }   
                        }
                        $('#offsource').html(loadScopeHTML);
                        $('#offsource2').html(loadScopeHTML);
                       
                     //        .fail(function(){
                     //                  console.log("Error handling request 'pull' in tab '" + tabID + "'' called by element " + $(this).attr('id'));
                           });


                    break;

           		case "report":
           		 parseAction("report", "pull", null)
                        .success(function(data) {
                      console.log(data);

                   var data = data.data;
                   var org = data.org;
                   var orgHTML;
                   var length=org.length;

                    orgHTML += "<option value = " + "all"+ ">" + "All" + "</option>";
                                
                   for(i = 0; i < length; i++){
                             
                                    orgHTML += "<option value = " + org[i] + ">" + org[i] + "</option>";
                                
                            }
                    $('#selectOrg').empty().html(orgHTML);
         

                        })
                        .fail(function(){
                            console.log("Error handling request 'pull' in tab '" + tabID + "'' called by element " + $(this).attr('id'));
                        });

           		break;

                case "measure":
                    parseAction("measure", "pull", null)
                    .success(function(result){
                        // Pull business units from the database
                        var data = result.data;
                        var units = data.loadUnits;
                        var loadUnitHTML;
                        for(i=0; i < units.length; i++){
                            if(i == 0){
                                loadUnitHTML += "<option value = " + units[i] + " selected = 'selected'>" + units[i] + "</option>";
                            } else{
                                loadUnitHTML += "<option value = " + units[i] + ">" + units[i] + "</option>";
                            }
                        }
                        $('#measureBusUnits').empty().html(loadUnitHTML);

                        // Pull scope from gb_category from the database
                        var scope = data.loadScope;
                        var loadScopeHTML;
                        for(j=0; j < scope.length; j++){
                            if(scope[j] != "") {
                                if(j == 0){
                                    loadScopeHTML += "<option value = '" + scope[j] + "' selected = 'selected'>" + scope[j] + "</option>";
                                } else{
                                    loadScopeHTML += "<option value = '" + scope[j] + "'>" + scope[j] + "</option>";
                                }
                            }
                        }
                        // Pull scope from gb_division2misc (user input from 'defined')
                        var scopePersonal = data.loadScopePersonal;
                        for(k=0; k < scopePersonal.length; k++){
                            if(scopePersonal[k] != ""){
                                if(k == 0){
                                    loadScopeHTML += "<option value = '" + scopePersonal[k] + "' selected = 'selected'>" + scopePersonal[k] + "</option>";
                                } else{
                                    loadScopeHTML += "<option value = '" + scopePersonal[k] + "'>" + scopePersonal[k] + "</option>";
                                }
                            }   
                        }
                        $('#measureScope').empty().html(loadScopeHTML);
                      
                        
                        var data ="bUnit="+$('#measureBusUnits').val() + "&scope="+$('#measureScope').val() + "&date="+$('#measureYear').val(); // Sets data as a key: value object list of all the form elements
                        var page = 'measure';
                        var action = 'pull';

                        parseAction(page, action, data)
                        .success(function(result)
                        {
                            console.log(result);
                            //var unit = result.data.unit;
                            var date = result.data.date;
                            var description = result.data.description;
                            var consumption = result.data.consumption;
                            var cost = result.data.cost;
                            var energy = result.data.energy;
                            var emmission = result.data.emmission;
                            var measureHTML;
                            var countTotal=0;

                            var length = description.length;
                            for(i = 0; i < length; i++)
                            {

                                measureHTML+=  "<tr id='measureRow"+i+"'>"+
                                                   "<td id='measureDate"+i+"' value='"+date[i]+"'><div contenteditable>"+date[i]+"</div></td>"+
                                                   "<td id='measureDiscrition"+i+"'value='"+description[i]+"'><div contenteditable>"+description[i]+"</div></td>"+
                                                   "<td id='measureConsumption"+i+"'value='"+consumption[i]+"'><div contenteditable>"+consumption[i]+"</div></td>"+
                                                   "<td id='measureCost"+i+"'value='"+cost[i]+"'><div contenteditable>"+cost[i]+"</div></td>"+
                                                   "<td id='measureEnergy"+i+"' value='"+energy[i]+"' style='background:#D3D3D3'><div contenteditable>"+energy[i]+"</div></td>"+
                                                   "<td id='measureEmmission"+i+"' value='"+emmission[i]+"' style='background:#D3D3D3'><div contenteditable>"+emmission[i]+"</div></td>"+
                                                   "</tr>";
                             countTotal++;       
                                    
                            }

                       // Initialize sum variables
                            var consumptionTotal = 0;
                            var costTotal = 0;
                            var energyTotal = 0;
                            var emmissionTotal = 0;

                            // Loop through each row and add the corresponding values to the appropriate sum variable
                            for(i=0;i<countTotal;i++)
                            {
                                consumptionTotal += parseInt(consumption[i]);
                                costTotal += parseInt(cost[i]);
                                energyTotal += parseInt(energy[i]);
                                emmissionTotal += parseInt(emmission[i]);
                            }
                             measureHTML+=  "<tr id='measureRowTotal'>"+
                                                   "<td id='measureTotal' value='Total'style='background:#D3D3D3'><div contenteditable>Total</div></td>"+
                                                   "<td id='measureDiscritionTotal'value='"+description+"'style='background:#D3D3D3'><div contenteditable> </div></td>"+
                                                   "<td id='measureConsumptionTotal'value='"+consumptionTotal+"'style='background:#D3D3D3'><div contenteditable>"+consumptionTotal+"</div></td>"+
                                                   "<td id='measureCostTotal'value='"+costTotal+"'style='background:#D3D3D3'><div contenteditable>"+costTotal+"</div></td>"+
                                                   "<td id='measureEnergyTotal' value='"+energyTotal+"' style='background:#D3D3D3'><div contenteditable>"+energyTotal+"</div></td>"+
                                                   "<td id='measureEmmissionTotal' value='"+emmissionTotal+"' style='background:#D3D3D3'><div contenteditable>"+emmissionTotal+"</div></td>"+
                                                   "</tr>";

                            $('#tablebody').empty().html(measureHTML);
        
                        });
                    });


                       // if ($('#mScope').selected().text().startWith("Scope 1"))
                       //        {


                                    
                            
                              // }
                           
                  

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
                    parseAction("corp", "pull", null)
                        .success(function(data) {
                            //console.log(data);
                            load_gsCorp(data);
                        })
                        .fail(function(){
                            console.log("Error handling request 'pull' in tab '" + tabID + "'' called by element " + $(this).attr('id'));
                        });
                    break;
            }
        });

        function load_gsCorp(result) {
            var data = result.data;

            // Set General Information
            $('#corp-name').val(data.cName);
            $('#trade-name').val(data.cTrade);
            $('#addr1').val(data.address);
            $('#city').val(data.city);
            $('#corpSelCountry').val($('#corpSelCountry option').filter(function(){ return $(this).html() == data.country; }).val()).trigger('change');
            $('#corpSelStateProv').val(data.rCode);
            $('#zip-post').val(data.zip);
            $('#weburl').val(data.website);

            // Set Emission Reduction Target
            $('#baseYear').val(data.baseline);
            $('#reducTar').val(data.percentage);
            $('#targetYear').val(data.target);

            // Set GHG Champion
            $('#champname').val(data.champName);
            $('#champtitle').val(data.champTitle);
            $('#champtelnum').val(data.champNumber);
            $('#champemail').val(data.champEmail);

            // Set GHG Accountant
            $('#accountname').val(data.accName);
            $('#accounttitle').val(data.accTitle);
            $('#accounttelnum').val(data.accNumber);
            $('#accountemail').val(data.accEmail);

            // Set Reporting Year
            $('#yearEnd').val(data.fiscMonth);
            $('#yearEndDay').val(data.fiscDay);
        }

        function load_gsBusiness(result) {
            var data = result;
            $('#BU-name').val(data.name);
            $('#BU-addr1').val(data.address);
            $('#BU-city').val(data.city);
            $('#buSelCountry').val(data.cid).trigger('change');
            $('#BU-zip-post').val(data.zip);
            $('#buSelStateProv').val(data.province);
            $('#BU-addr2').val(data.address2);
            $('#BU-baseYear').val(data.baseline);
            $('#BU-targetYear').val(data.target);
            $('#redTarget').val(data.percentage);
            $('#metric1').val(data.custom1Name);
            $('#metric2').val(data.custom2Name);
            $('#metric3').val(data.custom3Name);

        }
  /////////////////////////////////////////////////////
  ////carboffset.php Javascript
  /////////////////////////////////////////////////////

   //change selected value on dropdown
    var getYr= null;
    var getCt= null;
    var getScope= null;
    var getNme= null;
//Get year to match database year
    function changeYr(){
            getYr= document.getElementById("getYear").value;
        document.getElementById("getYear").selectedIndex= getYr;
        $('#getYear').val(getYr);
        $('#getYear2').val(getYr);
        $('#offtest').val(getYr); 
    }

//Get cost estimatin from dropdown
    function changeCost(){
        getCt= document.getElementById("getCost").value;
        document.getElementById("getCost").selectedIndex= getCt;
        $('#getCost').val(getCt);
        $('#getCost2').val(getCt);
        $('#offtest').val(getCt); 
        $('#CalcEm').val(getCt);
    }

//Get scope 
    function calcEmission(){
        var data ="bUnit="+$('#offsetorg').val() + "&scope="+$('#offsource').val() + "&date="+$('#getYear').val(); // Sets data as a key: value object list of all the form elements
                        var page = 'measure';
                        var action = 'pull';

            parseAction(page, action, data)
            .success(function(result)
                {
                    console.log(result);
                    var description = result.data.description;
                    var consumption = result.data.consumption;
                    var length = Object.keys(result.data.description).length;
                    var total= 0;

                for (i =0; i < length; i++)
                {
                    //summing emission total
                    total += parseInt(consumption[i]);
                }
                
                //pull total emissions
                $('#CalcEm').html(total+ " Tonnes");
                $('#CalcEm2').html(total+ " Tonnes");
                //calculate cost
               getCt= document.getElementById("getCost").value;
                var EstCost= total*getCt;
                $('#offtest').val(EstCost);
                $('#CostOff').html("$ "+EstCost);
                $('#CostOff2').html("$ "+EstCost);
                })
             .fail(function(){
                            console.log("Error handling request 'pull' in tab '" + tabID + "'' called by element " + $(this).attr('id'));
                        });
    }

      /////////////////////////////////////////////////////
  ////carboffset.php Javascript
  /////////////////////////////////////////////////////
    </script>
</body>
</html>