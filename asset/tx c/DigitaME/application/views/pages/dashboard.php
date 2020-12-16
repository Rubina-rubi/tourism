	
		<div class="row">
			<div class="col-lg-12">
				<center><h1 class="page-header">SMS Sending Report</h1></center>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-lg-12">
				<div class="full-body-content col-lg-12">
					
					<div class="daily col-lg-3">
						<h3><?php echo $all_sms_sent['COUNT(ssi_response_value)']; ?></h3>
						<h2>Total SMS Sent</h2>	
					</div>
					
					<div class="weekly col-lg-3">
						<h3><?php echo $daily_sms_sent['numberdaily']; ?></h3>
						<h2>Today SMS Sent</h2>
					</div>

					<div class="monthly col-lg-3">
						<h3><?php echo $monthly_sms_sent['numbermonthly']; ?></h3>
						<h2>Monthly SMS sent</h2>
					</div>

					<div class="business_wise col-lg-3">
						<h3><?php echo $yearly_sms_sent['numberyearly']; ?></h3>
						<h2>Yearly SMS sent</h2>
					</div>


					<table data-toggle="table" data-url="tables/data1.json"  data-search="true" data-pagination="true" data-sort-name="business-name">
					    <thead>
						    <tr>
						        <th data-field="business-name" data-sortable="true">Business Name</th>
								<th data-field="business-sms" data-sortable="true">Total SMS Sent</th>
						    </tr>
					    </thead>
					    <tbody>
				    	<?php
				    		if($business_wise_sms_sent){
				    			foreach ($business_wise_sms_sent as $val) {
				    				echo '<tr>
				    					<td>'.$val['bi_name'].'</td>
				    					<td>'.$val['COUNT(ssi_response_value)'].'</td>>
				    				</tr>';
				    			}
				    		}// If row more then 1 | END IF
				    	?>
				    	</tbody>
					</table>

					<!-- <div class="col-lg-4 col-lg-offset-4">
						

						<div id="piechart"></div>

						<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

						<script type="text/javascript">
						// Load google charts
						google.charts.load('current', {'packages':['corechart']});
						google.charts.setOnLoadCallback(drawChart);

						// Draw the chart and set the chart values
						function drawChart() {
						  var data = google.visualization.arrayToDataTable([
						  ['Task', 'Hours per Day'],
						  ['Work', 8],
						  ['Eat', 2],
						  ['TV', 4],
						  ['Gym', 2],
						  ['Sleep', 8]
						]);

						  // Optional; add a title and set the width and height of the chart
						  var options = {'title':'Graphical SMS Report', 'width':550, 'height':400};

						  // Display the chart inside the <div> element with id="piechart"
						  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
						  chart.draw(data, options);
						}
						</script>
					</div> -->


				</div>
			</div>
		</div><!--/.row-->