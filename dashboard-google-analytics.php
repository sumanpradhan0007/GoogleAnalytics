<?php 
include('includes/header.php'); 
?>
<style type="text/css">
	.eq-height {
    height: 301px;
}
.col-6.channel .bg-pink {
    background-color: #47a447;
}
.col-6.channel {
  padding: 12px 10px 30px;
    border-right: 1px solid #99a099;
    border-bottom: 1px solid #919791;;
}
.col-6.channel:nth-child(3)
{
	border-bottom: 0px solid #919791;
}
.col-6.channel:nth-child(2)
{
	border-right: 0px solid #99a099;
}
.col-6.channel:nth-child(4)
{
	border-right: 0px solid #99a099;border-bottom: 0px solid #919791;
}
.fixtb table td:nth-child(2) {
    /* width: 70%; */
    /* float: left; */
   
    vertical-align: top;
    
    white-space: pre-wrap;
}
.table-responsive.fixtb {
    height: 604px;
}
.card-dashboard-table .table thead tr:first-child th {
 
    background-color: #47a447;
   
    color: #fff;
}
.card-header {
    padding: 12px 20px;
    background-color: #47a447;
   
}
.card-header h6 {

    color: #fff;
}
</style>
<div class="content-body">
	<div class="container pd-x-0">
		<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
			<div>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-style1 mg-b-10">
						<li class="breadcrumb-item"><a href="#">Dashboard</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Website Analytics</li>
					</ol>
				</nav>
				<h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
			</div>
			
			<!--			
			<div class="d-none d-md-block">
				<button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="save" class="wd-10 mg-r-5"></i> Save</button>
				<button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="upload" class="wd-10 mg-r-5"></i> Export</button>
				<button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="share-2" class="wd-10 mg-r-5"></i> Share</button>
				<button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="sliders" class="wd-10 mg-r-5"></i> Settings</button>
			</div>-->
		</div>
		
		<div>
			<div class="col-lg-8">
				<p>To Load Data:</p>
				<ol>
				  <li>Click the authorize button to grant access to your Google Analytics data.</li>
				  <li>Click the run button to start the Dashboard.</li>
				</ol>
				<hr>
				<button id="authorize-button" style="visibility: hidden">Authorize</button>
				<button id="run-demo-button" style="visibility: hidden">Load Data</button>
				<hr>
			   <div id="output_area">Loading, one sec....</div>

			</div>
		</div>
		<div class="row row-xs " id="dashboard_area" style="visibility: hidden">
			<div class="col-lg-8 col-xl-9 ">
				<div class="card">
                  <div class="card-header  pd-l-20 pd-lg-l-25 d-flex flex-column flex-sm-row align-items-sm-start justify-content-sm-between">
					
							<h6 class="mg-b-0">Website Audience Metrics</h6>
						<!--	<p class="tx-12 tx-color-03 mg-b-0">Audience to which the users belonged while on the current date range.</p> -->
						
						<!--<div class="btn-group mg-t-20 mg-sm-t-0">
							<a href="dashboard-google-analytics.php?start_date=today&enddate=today">
								<button class="btn btn-xs btn-white btn-uppercase">Day</button>
							</a>
							<a href="dashboard-google-analytics.php?start_date=7daysAgo&end_date=today">
								<button class="btn btn-xs btn-white btn-uppercase active">Week</button>
							</a>
							<a href="dashboard-google-analytics.php?start_date=30daysAgo&end_date=today">
								<button class="btn btn-xs btn-white btn-uppercase ">Month</button>
							</a>
						</div>-->
					</div> 
					<!-- card-header -->
					<div class="card-body pd-lg-25">
						<div id="WebsiteAudienceMetrics" class="row align-items-sm-end">
							
							<!--
							<div class="col-sm-6 col-lg-3 mg-b-10">
									<div class="card card-body">
										<h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">
											Users
										</h6>
										<div class="d-flex d-lg-block d-xl-flex align-items-end">
											<h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"></h3>


										</div>

									</div>
								</div>
							<div class="col-sm-6 col-lg-3 mg-b-10">
								<div class="card card-body">
									<h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">
										New Users
									</h6>
									<div class="d-flex d-lg-block d-xl-flex align-items-end">
										<h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"></h3>
										
									</div>

								</div>
							</div>
							<div class="col-sm-6 col-lg-3 mg-b-10">
								<div class="card card-body">
									<h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Sessions</h6>
									<div class="d-flex d-lg-block d-xl-flex align-items-end">
										<h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"></h3>
									</div>

								</div>
							</div>
							<div class="col-sm-6 col-lg-3 mg-b-10">
								<div class="card card-body">
									<h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Sessions/user</h6>
									<div class="d-flex d-lg-block d-xl-flex align-items-end">
										<h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"></h3>
									</div>

								</div>
							</div>
							
							<div class="col-sm-6 col-lg-3 mg-b-10">
								<div class="card card-body">
									<h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Pageviews</h6>
									<div class="d-flex d-lg-block d-xl-flex align-items-end">
										<h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">
											<?php  echo $analyticsData['result']['pageViews'];?></h3>
									</div>

								</div>
							</div>
							<div class="col-sm-6 col-lg-3 mg-b-10">
								<div class="card card-body">
									<h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Pages/Session</h6>
									<div class="d-flex d-lg-block d-xl-flex align-items-end">
										<h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"></h3>
										
									</div>

								</div>
							</div>
							<div class="col-sm-6 col-lg-3 mg-b-10 ">
								<div class="card card-body">
									<h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Bounce Rate</h6>
									<div class="d-flex d-lg-block d-xl-flex align-items-end">
										<h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"></h3>
										
									</div>

								</div>
							</div>
							<div class="col-sm-6 col-lg-3 mg-b-10">
								<div class="card card-body">
									<h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Session Duration</h6>
									<div class="d-flex d-lg-block d-xl-flex align-items-end">
										<h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">
											</h3>
										
									</div>

								</div>
							</div>-->
							
							
							<div class="col-lg-5 col-xl-4 mg-t-30 mg-lg-t-0">
								<!-- <div class="row">
                        <div class="col-sm-6 col-lg-12">
                          <div class="d-flex align-items-center justify-content-between mg-b-5">
                            <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">New Users</h6>
                            <span class="tx-10 tx-color-04">65% goal reached</span>
                          </div>
                          <div class="d-flex align-items-end justify-content-between mg-b-5">
                            <h5 class="tx-normal tx-rubik lh-2 mg-b-0">13,596</h5>
                            <h6 class="tx-normal tx-rubik tx-color-03 lh-2 mg-b-0">20,000</h6>
                          </div>
                          <div class="progress ht-4 mg-b-0 op-5">
                            <div class="progress-bar bg-teal wd-65p" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-lg-12 mg-t-30 mg-sm-t-0 mg-lg-t-30">
                          <div class="d-flex align-items-center justify-content-between mg-b-5">
                            <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">Page Views</h6>
                            <span class="tx-10 tx-color-04">45% goal reached</span>
                          </div>
                          <div class="d-flex justify-content-between mg-b-5">
                            <h5 class="tx-normal tx-rubik mg-b-0">83,123</h5>
                            <h5 class="tx-normal tx-rubik tx-color-03 mg-b-0"><small>250,000</small></h5>
                          </div>
                          <div class="progress ht-4 mg-b-0 op-5">
                            <div class="progress-bar bg-orange wd-45p" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-lg-12 mg-t-30">
                          <div class="d-flex align-items-center justify-content-between mg-b-5">
                            <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">Page Sessions</h6>
                            <span class="tx-10 tx-color-04">20% goal reached</span>
                          </div>
                          <div class="d-flex justify-content-between mg-b-5">
                            <h5 class="tx-normal tx-rubik mg-b-0">16,869</h5>
                            <h5 class="tx-normal tx-rubik tx-color-03 mg-b-0"><small>85,000</small></h5>
                          </div>
                          <div class="progress ht-4 mg-b-0 op-5">
                            <div class="progress-bar bg-pink wd-20p" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-lg-12 mg-t-30">
                          <div class="d-flex align-items-center justify-content-between mg-b-5">
                            <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">Bounce Rate</h6>
                            <span class="tx-10 tx-color-04">85% goal reached</span>
                          </div>
                          <div class="d-flex justify-content-between mg-b-5">
                            <h5 class="tx-normal tx-rubik mg-b-0">28.50%</h5>
                            <h5 class="tx-normal tx-rubik tx-color-03 mg-b-0"><small>30.50%</small></h5>
                          </div>
                          <div class="progress ht-4 mg-b-0 op-5">
                            <div class="progress-bar bg-primary wd-85p" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>-->
								<!-- row -->

							</div>
						</div>
					</div>
					<!-- card-body -->
				</div>
				<!-- card -->
			</div>
			<div class="col-md-6 col-lg-4 col-xl-3 mg-t-10 mg-lg-t-0 ">
				<div class="card eq-height">
					<div class="card-header">
						<h6 class="mg-b-0">Users By Channel</h6>
					</div>
					<!-- card-header -->
					<!--<div class="card-body pd-lg-25">
						<div class="chart-seven"><canvas id="chartDonut"></canvas>
						</div>
						
					</div>-->
					<!-- card-body -->
					<div class="card-footer pd-20">
						<div class="row" id="UsersByChannel">

<!--							
							<div class="col-6 card card-body">
								<p class="tx-10 tx-uppercase tx-medium tx-color-03 tx-spacing-1 tx-nowrap mg-b-5">Organic Search</p>
								<div class="d-flex align-items-center">
									<div class="wd-10 ht-10 rounded-circle bg-pink mg-r-5"></div>
									<h6 class="tx-normal tx-rubik mg-b-0"><?php  echo $analyticsData['result']['users'];?>
										</h6>
								</div>
							</div>
							<div class="col-6 card card-body">
								<p class="tx-10 tx-uppercase tx-medium tx-color-03 tx-spacing-1 mg-b-5">Email</p>
								<div class="d-flex align-items-center">
									<div class="wd-10 ht-10 rounded-circle bg-primary mg-r-5"></div>
									<h6 class="tx-normal tx-rubik mg-b-0">987</h6>
								</div>
							</div>
							<div class="col-6 mg-t-20 card card-body">
								<p class="tx-10 tx-uppercase tx-medium tx-color-03 tx-spacing-1 mg-b-5">Referrral</p>
								<div class="d-flex align-items-center">
									<div class="wd-10 ht-10 rounded-circle bg-teal mg-r-5"></div>
									<h6 class="tx-normal tx-rubik mg-b-0">2,010 </h6>
								</div>
							</div>
							<div class="col-6 mg-t-20 card card-body">
								<p class="tx-10 tx-uppercase tx-medium tx-color-03 tx-spacing-1 mg-b-5">Social Media</p>
								<div class="d-flex align-items-center">
									<div class="wd-10 ht-10 rounded-circle bg-orange mg-r-5"></div>
									<h6 class="tx-normal tx-rubik mg-b-0">1,054 </h6>
								</div>
							</div>
							
-->						</div>
						<!-- row -->
					</div>
					<!-- card-footer -->
				</div>
				<!-- card -->
			</div>
			
			<!-- col -->
			<div class="col-sm-4 col-md-4 col-lg-4  mg-t-10">
				<div class="card eq-height2">
					<div class="card-header">
						<h6 class="mg-b-0">Device Sessions</h6>
					</div>
					<!-- card-header -->
					<div class="card-body">
						<div id="UsersByDevice" class="row row-xs">
							<div class="col-4 col-lg">
								<div class="d-flex align-items-baseline">
									<span class="d-block wd-8 ht-8 rounded-circle bg-primary"></span>
									<span class="d-block tx-10 tx-uppercase tx-medium tx-spacing-1 tx-color-03 mg-l-7">Mobile</span>
								</div>
								<h4 class="tx-normal tx-rubik tx-spacing--1 mg-l-15 mg-b-0">6,098</h4>
							</div>

							<div class="col-4 col-lg">
								<div class="d-flex align-items-baseline">
									<span class="d-block wd-8 ht-8 rounded-circle bg-teal"></span>
									<span class="d-block tx-10 tx-uppercase tx-medium tx-spacing-1 tx-color-03 mg-l-7">Desktop</span>
								</div>
								<h4 class="tx-normal tx-rubik tx-spacing--1 mg-l-15 mg-b-0">3,902</h4>
							</div>

							<div class="col-4 col-lg">
								<div class="d-flex align-items-baseline">
									<span class="d-block wd-8 ht-8 rounded-circle bg-gray-300"></span>
									<span class="d-block tx-10 tx-uppercase tx-medium tx-spacing-1 tx-color-03 mg-l-7">Other</span>
								</div>
								<h4 class="tx-normal tx-rubik tx-spacing--1 mg-l-15 mg-b-0">1,065</h4>
							</div>
							<!-- col -->
						</div>
						<!-- row -->

						<!-- <div class="chart-nine">
							<div id="flotChart2" class="flot-chart"></div>
						</div>-->
					</div>
					<!-- card-body -->
				</div>
				<!-- card -->

				<div class="card eq-height2 mg-t-10">
					<div class="card-header">
						<h6 class="mg-b-0">Top Traffic Source</h6>
					</div>
					<!-- card-header -->
					<div class="card-body tx-center" style="    padding-bottom: 0px;
    padding-top: 6px;">
						<h4 id="organicSearch" class="tx-normal tx-rubik tx-15 tx-spacing--1 mg-b-0">29,931</h4>
						<p class="tx-12 tx-uppercase tx-semibold tx-spacing-1 tx-color-02">Organic Search</p>
					</div>
					<!-- card-body -->
					<!-- <div class="card-footer bd-t-0 pd-t-0">
						<button class="btn btn-sm btn-block btn-outline-primary btn-uppercase tx-spacing-1">Learn More</button>
					</div>-->
					<!-- card-footer -->
				</div>
			</div>
			<!-- col -->
			
			<!-- col -->
			<div class="col-lg-8 mg-t-10 ">
				<div class="card">
					<div class="card-header d-flex align-items-start justify-content-between">
						<h6 class=" mg-b-0">Total Visits</h6>
<!--						<a href="" class="tx-13 link-03">Mar 01 - Mar 20, 2019 <i class="icon ion-ios-arrow-down"></i></a>
-->					</div>
					<!-- card-header -->
					<div class="card-body pd-y-15 pd-x-10">
						<div class="table-responsive">
							<table class="table table-border table-sm tx-13 tx-nowrap mg-b-0">
								<thead>
									<tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
										<th class="wd-5p">Link</th>
										<th>Page Title</th>
<!--										<th class="text-right">Percentage (%)</th>-->
										<th class="text-right">Value</th>
									</tr>
								</thead>
								<tbody id="UsersByPagetitle">
									<tr>
										<td class="align-middle text-center"><a href=""><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a>
										</td>
										<td class="align-middle tx-medium">Homepage</td>
										<td class="align-middle text-right">
											<div class="wd-150 d-inline-block">
												<div class="progress ht-4 mg-b-0">
													<div class="progress-bar bg-teal wd-65p" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
										</td>
										<td class="align-middle text-right"><span class="tx-medium">65.35%</span>
										</td>
									</tr>
									<tr>
										<td class="align-middle text-center"><a href=""><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a>
										</td>
										<td class="align-middle tx-medium">Our Services</td>
										<td class="align-middle text-right">
											<div class="wd-150 d-inline-block">
												<div class="progress ht-4 mg-b-0">
													<div class="progress-bar bg-primary wd-85p" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
										</td>
										<td class="text-right"><span class="tx-medium">84.97%</span>
										</td>
									</tr>
									<tr>
										<td class="align-middle text-center"><a href=""><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a>
										</td>
										<td class="align-middle tx-medium">List of Products</td>
										<td class="align-middle text-right">
											<div class="wd-150 d-inline-block">
												<div class="progress ht-4 mg-b-0">
													<div class="progress-bar bg-warning wd-45p" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
										</td>
										<td class="text-right"><span class="tx-medium">38.66%</span>
										</td>
									</tr>
									<tr>
										<td class="align-middle text-center"><a href=""><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a>
										</td>
										<td class="align-middle tx-medium">Contact Us</td>
										<td class="align-middle text-right">
											<div class="wd-150 d-inline-block">
												<div class="progress ht-4 mg-b-0">
													<div class="progress-bar bg-pink wd-15p" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
										</td>
										<td class="text-right"><span class="tx-medium">16.11%</span>
										</td>
									</tr>
									<tr>
										<td class="align-middle text-center"><a href=""><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a>
										</td>
										<td class="align-middle tx-medium">Product 50% Sale</td>
										<td class="align-middle text-right">
											<div class="wd-150 d-inline-block">
												<div class="progress ht-4 mg-b-0">
													<div class="progress-bar bg-teal wd-60p" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
										</td>
										<td class="text-right"><span class="tx-medium">59.34%</span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- card-body -->
				</div>
				<!-- card -->
			</div>
			<!-- col -->
			<div class="col-lg-5 mg-t-10">
				<div class="card">
					<div class="card-header d-sm-flex align-items-start justify-content-between">
						<h6 class="lh-5 mg-b-0">Acquisition By City</h6>
				</div>
					<!-- card-header -->
					<div class="card-body pd-y-15 pd-x-10">
						<div class="table-responsive">
							<table class="table table-borderless table-sm tx-13 tx-nowrap mg-b-0">
								<thead>
									<tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
										<th>City</th>
										<th class="text-right">Sessions(%)</th>
										<th class="text-right">Bounce Rate</th>
										<th class="text-right">Users</th>
									</tr>
								</thead>
								<tbody id="DataByCity">
									<tr>
										<td></td>
										<td class="tx-medium">Google Chrome</td>
										<td class="text-right">13,410</td>
										<td class="text-right">40.95%</td>
										<td class="text-right">19.45%</td>
									</tr>
									<tr>
										<td><i class="fab fa-firefox tx-orange"></i>
										</td>
										<td class="tx-medium">Mozilla Firefox</td>
										<td class="text-right">1,710</td>
										<td class="text-right">47.58%</td>
										<td class="text-right">19.99%</td>
									</tr>
									<tr>
										<td><i class="fab fa-safari tx-primary"></i>
										</td>
										<td class="tx-medium">Apple Safari</td>
										<td class="text-right">1,340</td>
										<td class="text-right">56.50%</td>
										<td class="text-right">11.00%</td>
									</tr>
									<tr>
										<td><i class="fab fa-edge tx-primary"></i>
										</td>
										<td class="tx-medium">Microsoft Edge</td>
										<td class="text-right">713</td>
										<td class="text-right">59.62%</td>
										<td class="text-right">4.69%</td>
									</tr>
									<tr>
										<td><i class="fab fa-opera tx-danger"></i>
										</td>
										<td class="tx-medium">Opera</td>
										<td class="text-right">380</td>
										<td class="text-right">52.50%</td>
										<td class="text-right">8.75%</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- table-responsive -->
					</div>
					<!-- card-body -->
				</div>
				<!-- card -->
			</div>
			
			<!-- col -->
			<div class="col-lg-7 mg-t-10">
				<div class="card">
					<div class="card-header d-sm-flex align-items-start justify-content-between">
						<h6 class="lh-5 mg-b-0">Acquisition By Keywords</h6>
				</div>
					<!-- card-header -->
					<div class="card-body pd-y-15 pd-x-10">
						<div class="table-responsive fixtb">
							<table class="table table-borderless table-sm tx-13 tx-nowrap mg-b-0 ">
								<thead>
									<tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
										<th class="tx-medium">Source</th>
										<th class="text-left">Keyword</th>
										<th class="text-right">Visit</th>

									</tr>
								</thead>
								<tbody id="DataByKeywords">
									<tr>
										<td class="tx-medium">Google Chrome</td>
										<td class="text-right">13,410</td>
										<td class="text-right">40.95%</td>
									</tr>
									<tr>

										<td class="tx-medium">Mozilla Firefox</td>
										<td class="text-right">1,710</td>
										<td class="text-right">47.58%</td>
									</tr>
									<tr>
										<td class="tx-medium">Apple Safari</td>
										<td class="text-right">1,340</td>
										<td class="text-right">56.50%</td>
									</tr>
									<tr>
										<td class="tx-medium">Microsoft Edge</td>
										<td class="text-right">713</td>
										<td class="text-right">59.62%</td>
									</tr>
									<tr>
										<td class="tx-medium">Opera</td>
										<td class="text-right">380</td>
										<td class="text-right">52.50%</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- table-responsive -->
					</div>
					<!-- card-body -->
				</div>
				<!-- card -->
			</div>
			
			<!-- col -->
			<div class="col mg-t-10">
				<div class="card card-dashboard-table">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>&nbsp;</th>
									<th colspan="3">Acquisition</th>
									<th colspan="3">Behavior</th>
								</tr>
								<tr>
									<th>Source</th>
									<th>Users</th>
									<th>New Users</th>
									<th>Sessions</th>
									<th>Bounce Rate</th>
									<th>Pages/Session</th>
									<th>Avg. Session</th>

								</tr>
							</thead>
							<tbody id="DataAll">
								<tr>
									<td><a href="">Organic search</a>
									</td>
									<td><strong>350</strong>
									</td>
									<td><strong>22</strong>
									</td>
									<td><strong>5,628</strong>
									</td>
									<td><strong>25.60%</strong>
									</td>
									<td><strong>1.92</strong>
									</td>
									<td><strong>00:01:05</strong>
									</td>
						
								</tr>
								<tr>
									<td><a href="">Social media</a>
									</td>
									<td><strong>276</strong>
									</td>
									<td><strong>18</strong>
									</td>
									<td><strong>5,100</strong>
									</td>
									<td><strong>23.66%</strong>
									</td>
									<td><strong>1.89</strong>
									</td>
									<td><strong>00:01:03</strong>
									</td>
							
								</tr>
								<tr>
									<td><a href="">Referral</a>
									</td>
									<td><strong>246</strong>
									</td>
									<td><strong>17</strong>
									</td>
									<td><strong>4,880</strong>
									</td>
									<td><strong>26.22%</strong>
									</td>
									<td><strong>1.78</strong>
									</td>
									<td><strong>00:01:09</strong>
									</td>
								
								</tr>
								<tr>
									<td><a href="">Email</a>
									</td>
									<td><strong>187</strong>
									</td>
									<td><strong>14</strong>
									</td>
									<td><strong>4,450</strong>
									</td>
									<td><strong>24.97%</strong>
									</td>
									<td><strong>1.35</strong>
									</td>
									<td><strong>00:02:07</strong>
									</td>
							
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- table-responsive -->
				</div>
				<!-- card -->
			</div>
			<!-- col -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>
</div>



<?php include('includes/footer.php'); ?>
<script type="text/javascript">
	$( function () {
		'use strict'

		var ctx1 = document.getElementById( 'chartBar1' ).getContext( '2d' );
		new Chart( ctx1, {
			type: 'bar',
			data: {
				labels: [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],
				datasets: [ {
					data: [ 150, 110, 90, 115, 125, 160, 160, 140, 100, 110, 120, 120 ],
					backgroundColor: '#66a4fb'
				}, {
					data: [ 180, 140, 120, 135, 155, 170, 180, 150, 140, 150, 130, 130 ],
					backgroundColor: '#65e0e0'
				} ]
			},
			options: {
				maintainAspectRatio: false,
				legend: {
					display: false,
					labels: {
						display: false
					}
				},
				scales: {
					xAxes: [ {
						display: false,
						barPercentage: 0.5
					} ],
					yAxes: [ {
						gridLines: {
							color: '#ebeef3'
						},
						ticks: {
							fontColor: '#8392a5',
							fontSize: 10,
							min: 80,
							max: 200
						}
					} ]
				}
			}
		} );


		/** PIE CHART **/
		var datapie = {
			labels: [ 'Organic Search', 'Email', 'Referral', 'Social Media' ],
			datasets: [ {
				data: [ 20, 20, 30, 25 ],
				backgroundColor: [ '#f77eb9', '#7ebcff', '#7ee5e5', '#fdbd88' ]
			} ]
		};

		var optionpie = {
			maintainAspectRatio: false,
			responsive: true,
			legend: {
				display: false,
			},
			animation: {
				animateScale: true,
				animateRotate: true
			}
		};

		// For a pie chart
		var ctx2 = document.getElementById( 'chartDonut' );
		var myDonutChart = new Chart( ctx2, {
			type: 'doughnut',
			data: datapie,
			options: optionpie
		} );


		$.plot( '#flotChart1', [ {
			data: df1,
			color: '#c0ccda',
			lines: {
				fill: true,
				fillColor: '#f5f6fa'
			}
		}, {
			data: df3,
			color: '#0168fa',
			lines: {
				fill: true,
				fillColor: '#d1e6fa'
			}
		} ], {
			series: {
				shadowSize: 0,
				lines: {
					show: true,
					lineWidth: 1.5
				}
			},
			grid: {
				borderWidth: 0,
				labelMargin: 0
			},
			yaxis: {
				show: false,
				max: 65
			},
			xaxis: {
				show: false,
				min: 40,
				max: 100
			}
		} );


		$.plot( '#flotChart2', [ {
			data: df2,
			color: '#66a4fb',
			lines: {
				show: true,
				lineWidth: 1.5,
				fill: .03
			}
		}, {
			data: df1,
			color: '#00cccc',
			lines: {
				show: true,
				lineWidth: 1.5,
				fill: true,
				fillColor: '#fff'
			}
		}, {
			data: df3,
			color: '#e3e7ed',
			bars: {
				show: true,
				lineWidth: 0,
				barWidth: .5,
				fill: 1
			}
		} ], {
			series: {
				shadowSize: 0
			},
			grid: {
				aboveData: true,
				color: '#e5e9f2',
				borderWidth: {
					top: 0,
					right: 1,
					bottom: 1,
					left: 1
				},
				labelMargin: 0
			},
			yaxis: {
				show: false,
				min: 0,
				max: 100
			},
			xaxis: {
				show: true,
				min: 40,
				max: 80,
				ticks: 6,
				tickColor: 'rgba(0,0,0,0.04)'
			}
		} );

		var df3data1 = [
			[ 0, 12 ],
			[ 1, 10 ],
			[ 2, 7 ],
			[ 3, 11 ],
			[ 4, 15 ],
			[ 5, 20 ],
			[ 6, 22 ],
			[ 7, 19 ],
			[ 8, 18 ],
			[ 9, 20 ],
			[ 10, 17 ],
			[ 11, 19 ],
			[ 12, 18 ],
			[ 13, 14 ],
			[ 14, 9 ]
		];
		var df3data2 = [
			[ 0, 0 ],
			[ 1, 0 ],
			[ 2, 0 ],
			[ 3, 2 ],
			[ 4, 5 ],
			[ 5, 2 ],
			[ 6, 12 ],
			[ 7, 15 ],
			[ 8, 10 ],
			[ 9, 8 ],
			[ 10, 10 ],
			[ 11, 7 ],
			[ 12, 2 ],
			[ 13, 4 ],
			[ 14, 0 ]
		];
		var df3data3 = [
			[ 0, 2 ],
			[ 1, 1 ],
			[ 2, 2 ],
			[ 3, 4 ],
			[ 4, 2 ],
			[ 5, 1 ],
			[ 6, 0 ],
			[ 7, 0 ],
			[ 8, 5 ],
			[ 9, 2 ],
			[ 10, 8 ],
			[ 11, 6 ],
			[ 12, 9 ],
			[ 13, 2 ],
			[ 14, 0 ]
		];
		var df3data4 = [
			[ 0, 0 ],
			[ 1, 5 ],
			[ 2, 2 ],
			[ 3, 0 ],
			[ 4, 2 ],
			[ 5, 7 ],
			[ 6, 10 ],
			[ 7, 12 ],
			[ 8, 8 ],
			[ 9, 6 ],
			[ 10, 4 ],
			[ 11, 2 ],
			[ 12, 0 ],
			[ 13, 0 ],
			[ 14, 0 ]
		];

		var flotChartOption1 = {
			series: {
				shadowSize: 0,
				bars: {
					show: true,
					lineWidth: 0,
					barWidth: .5,
					fill: 1
				}
			},
			grid: {
				aboveData: true,
				color: '#e5e9f2',
				borderWidth: 0,
				labelMargin: 0
			},
			yaxis: {
				show: false,
				min: 0,
				max: 25
			},
			xaxis: {
				show: false
			}
		};

		$.plot( '#flotChart3', [ {
			data: df3data1,
			color: '#e5e9f2'
		}, {
			data: df3data2,
			color: '#66a4fb'
		} ], flotChartOption1 );


		$.plot( '#flotChart4', [ {
			data: df3data1,
			color: '#e5e9f2'
		}, {
			data: df3data3,
			color: '#7ee5e5'
		} ], flotChartOption1 );

		$.plot( '#flotChart5', [ {
			data: df3data1,
			color: '#e5e9f2'
		}, {
			data: df3data4,
			color: '#f77eb9'
		} ], flotChartOption1 );

	} )
</script>
<script src="JSgoogleAnalytics/auth_util.js"></script>
<script src="JSgoogleAnalytics/analytics_api_v3.js"></script>
<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>

</body>
</html>