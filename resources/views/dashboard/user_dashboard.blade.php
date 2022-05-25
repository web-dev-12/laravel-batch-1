@extends('layout.master')
@section('title','User
 Dashboard')
@section('content')
<div class="row">
	<div class="col-md-12 col-xxl-12">
		@if(Session::has('response'))
		<div class="alert alert-success solid alert-dismissible fade show">
			<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
			<strong>Success!</strong>{{Session::get('response')['message']}}
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
			</button>
		</div>
		@endif
	</div>
							<div class="col-xl-12">
								<div class="row">
									<div class="col-xl-12">
										<div class="card tryal-gradient">
											<div class="card-body tryal row">
												<div class="col-xl-7 col-sm-6">
													<h2>Manage your project in one touch</h2>
													<span>Let Fillow manage your project automatically with our best AI systems </span>
													<a href="javascript:void(0);" class="btn btn-rounded  fs-18 font-w500">Try Free Now</a>
												</div>
												<div class="col-xl-5 col-sm-6">
													<img src="images/chart.png" alt="" class="sd-shape">
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<div class="col-xl-12">
								<div class="row">
									
										
											<div class="col-xl-3 col-sm-6">
												<div class="card">
													<div class="card-body px-4 pb-0">
														<h4 class="fs-18 font-w600 mb-5 text-nowrap">Total Clients</h4>
														<div class="progress default-progress">
															<div class="progress-bar bg-gradient1 progress-animated" style="width: 40%; height:10px;" role="progressbar">
																<span class="sr-only">45% Complete</span>
															</div>
														</div>
														<div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
															<span>76 left from target</span>
															<h4 class="mb-0">42</h4>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-sm-6">
												<div class="card">
													<div class="card-body d-flex px-4  justify-content-between">
														<div>
															<div class="">
																<h2 class="fs-32 font-w700">562</h2>
																<span class="fs-18 font-w500 d-block">Total Clients</span>
																<span class="d-block fs-16 font-w400"><small class="text-danger">-2%</small> than last month</span>
															</div>
														</div>
														<div id="NewCustomers"></div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-sm-6">
												<div class="card">
													<div class="card-body d-flex px-4  justify-content-between">
														<div>
															<div class="">
																<h2 class="fs-32 font-w700">892</h2>
																<span class="fs-18 font-w500 d-block">New Projects</span>
																<span class="d-block fs-16 font-w400"><small class="text-success">-2%</small> than last month</span>
															</div>
														</div>
														<div id="NewCustomers1"></div>
													</div>
												</div>
											</div>
																		
								</div>
							</div>
						</div>
@endsection