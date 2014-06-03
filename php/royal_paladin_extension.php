<?php
	include ("account.php");

	$clan = 'cfv_royal_paladin';

	// create new column to hold total number of units
	$column_total = mysql_query("SELECT COUNT(*) as total_units FROM $clan") or die(mysql_error());
	$row_total = mysql_fetch_array($column_total);
	$max_units = $row_total['total_units'];

	echo '
		<h1>
		  <div class="row">
			<div class="col-xs-7">Royal Paladin</div>
			<div class="col-xs-5"><div style="text-align:right;"><small>Total Units: ' . $max_units . ' </small></div></div>
		  </div>
		</h1>	

		<div class="panel-group" id="accordion">

		  <div class="panel panel-default">   
		    <div class="panel-starter">
		  	  <h3 class="panel-title">
		  	    <div class="row">
      			  <div class="col-xs-6">NAME</div>
  		  	  	  <div class="col-xs-1">GRADE</div>
		  	  	  <div class="col-xs-1">POWER</div>
		  	  	  <div class="col-xs-1">SHIELD</div>
		  	  	  <div class="col-xs-1">TRIGGER</div>		 
		  	    </div>
		      </h4>
		    </div>
		  </div>
	';

	$table_clan = mysql_query("SELECT * FROM $clan ORDER BY grade, name") or die(mysql_error());

	for ($panelNum = 0; $panelNum < $max_units; $panelNum++) { 

		$row_clan = mysql_fetch_array($table_clan);

	echo '
		  <div class="panel panel-default">

		  	<a data-toggle="collapse" data-parent="#accordion" href="#collapse' . $panelNum . '">
		      <div class="panel-heading">
		      	<h4 class="panel-title">
		      	  <div class="row">
		            <div class="col-xs-6">' . $row_clan["name"] . '</div>
		      	  	<div class="col-xs-1"><div style="text-align:center;">' . $row_clan["grade"] . '</div></div>
		          	<div class="col-xs-1"><div style="text-align:right;">' . $row_clan["power"] . '</div></div>
		          	<div class="col-xs-1"><div style="text-align:right;">' . $row_clan["shield"] . '</div></div>
		          	<div class="col-xs-1">' . $row_clan["trigger"] . '</div>
		          </div>
		        </h4>
		      </div>
		    </a>		    

		    <div id="collapse' . $panelNum . '" class="panel-collapse collapse">
		      <div class="panel-body">
		          <div class="col-xs-4">
		          	<p><img src="../img/royal_paladin/' . $row_clan["name"] . '.jpg" width="170" class="img-polaroid"></p>
		          </div>		      
			      <div class="col-xs-8">
			        <p><b>Effect: </b>' . $row_clan["skill"] . '</p>
			        <p><b>Race: </b>' . $row_clan["race"] . '</p>
			      </div>
		      </div>
		    </div>
		    
		  </div>
	';

	}

	echo '
		</div>
	';

?>