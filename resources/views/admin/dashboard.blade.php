@extends('admin.layouts.layout')
@section('main')




<h4 class="fw-bold py-3 mb-4"> <span class='text-muted fw-light'>Page /</span>Dashboard</h4>
<div class="page-content">
	<section class="row">
		<div class="col-12 col-lg-12">
			<div class="row">

				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body px-3 py-4-5">
							<div class="row">
								<div class="col-md-4">
									<div class="stats-icon purple">
										<i class="iconly-boldShow"></i>
									</div>
								</div>
								<div class="col-md-8">
									<h6 class="text-muted font-semibold">Profile Views</h6>
									<h6 class="font-extrabold mb-0">112.000</h6>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body px-3 py-4-5">
							<div class="row">
								<div class="col-md-4">
									<div class="stats-icon blue">
										<i class="iconly-boldProfile"></i>
									</div>
								</div>
								<div class="col-md-8">
									<h6 class="text-muted font-semibold">Followers</h6>
									<h6 class="font-extrabold mb-0">183.000</h6>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body px-3 py-4-5">
							<div class="row">
								<div class="col-md-4">
									<div class="stats-icon green">
										<i class="iconly-boldAdd-User"></i>
									</div>
								</div>
								<div class="col-md-8">
									<h6 class="text-muted font-semibold">Following</h6>
									<h6 class="font-extrabold mb-0">80.000</h6>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body px-3 py-4-5">
							<div class="row">
								<div class="col-md-4">
									<div class="stats-icon red">
										<i class="iconly-boldBookmark"></i>
									</div>
								</div>
								<div class="col-md-8">
									<h6 class="text-muted font-semibold">Saved Post</h6>
									<h6 class="font-extrabold mb-0">112</h6>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</section >
	<section class="row my-2">
		<div class="col-12 col-lg-12">
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-header">
							<h4>Visitors Profile</h4>
						</div>
						<div class="card-body" style="position: relative;">
							<div id="chart-visitors-profile" style="min-height: 205.7px;">
								<div id="apexchartsft02osge" class="apexcharts-canvas apexchartsft02osge apexcharts-theme-light"
									style="width: 197px; height: 205.7px;"><svg id="SvgjsSvg1264" width="197" height="205.70000000000002"
										xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
										xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS"
										transform="translate(0, 0)" style="background: transparent;">
										<foreignObject x="0" y="0" width="197" height="205.70000000000002">
											<div class="apexcharts-legend apexcharts-align-center position-bottom"
												xmlns="http://www.w3.org/1999/xhtml"
												style="inset: auto 0px 1px; position: absolute; max-height: 175px;">
												<div class="apexcharts-legend-series" rel="1" seriesname="Male" data:collapsed="false"
													style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false"
														style="background: rgb(67, 94, 190) !important; color: rgb(67, 94, 190); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
														class="apexcharts-legend-text" rel="1" i="0" data:default-text="Male" data:collapsed="false"
														style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Male</span>
												</div>
												<div class="apexcharts-legend-series" rel="2" seriesname="Female" data:collapsed="false"
													style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false"
														style="background: rgb(85, 198, 232) !important; color: rgb(85, 198, 232); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
														class="apexcharts-legend-text" rel="2" i="1" data:default-text="Female"
														data:collapsed="false"
														style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Female</span>
												</div>
											</div>
											<style type="text/css">
												.apexcharts-legend {
													display: flex;
													overflow: auto;
													padding: 0 10px;
												}

												.apexcharts-legend.position-bottom,
												.apexcharts-legend.position-top {
													flex-wrap: wrap
												}

												.apexcharts-legend.position-right,
												.apexcharts-legend.position-left {
													flex-direction: column;
													bottom: 0;
												}

												.apexcharts-legend.position-bottom.apexcharts-align-left,
												.apexcharts-legend.position-top.apexcharts-align-left,
												.apexcharts-legend.position-right,
												.apexcharts-legend.position-left {
													justify-content: flex-start;
												}

												.apexcharts-legend.position-bottom.apexcharts-align-center,
												.apexcharts-legend.position-top.apexcharts-align-center {
													justify-content: center;
												}

												.apexcharts-legend.position-bottom.apexcharts-align-right,
												.apexcharts-legend.position-top.apexcharts-align-right {
													justify-content: flex-end;
												}

												.apexcharts-legend-series {
													cursor: pointer;
													line-height: normal;
												}

												.apexcharts-legend.position-bottom .apexcharts-legend-series,
												.apexcharts-legend.position-top .apexcharts-legend-series {
													display: flex;
													align-items: center;
												}

												.apexcharts-legend-text {
													position: relative;
													font-size: 14px;
												}

												.apexcharts-legend-text *,
												.apexcharts-legend-marker * {
													pointer-events: none;
												}

												.apexcharts-legend-marker {
													position: relative;
													display: inline-block;
													cursor: pointer;
													margin-right: 3px;
													border-style: solid;
												}

												.apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
												.apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
													display: inline-block;
												}

												.apexcharts-legend-series.apexcharts-no-click {
													cursor: auto;
												}

												.apexcharts-legend .apexcharts-hidden-zero-series,
												.apexcharts-legend .apexcharts-hidden-null-series {
													display: none !important;
												}

												.apexcharts-inactive-legend {
													opacity: 0.45;
												}
											</style>
										</foreignObject>
										<g id="SvgjsG1266" class="apexcharts-inner apexcharts-graphical" transform="translate(12, 0)">
											<defs id="SvgjsDefs1265">
												<clipPath id="gridRectMaskft02osge">
													<rect id="SvgjsRect1268" width="181" height="289" x="-3" y="-1" rx="0" ry="0" opacity="1"
														stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
												</clipPath>
												<clipPath id="gridRectMarkerMaskft02osge">
													<rect id="SvgjsRect1269" width="179" height="291" x="-2" y="-2" rx="0" ry="0" opacity="1"
														stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
												</clipPath>
												<filter id="SvgjsFilter1278" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%"
													y="-50%">
													<feFlood id="SvgjsFeFlood1279" flood-color="#000000" flood-opacity="0.45"
														result="SvgjsFeFlood1279Out" in="SourceGraphic"></feFlood>
													<feComposite id="SvgjsFeComposite1280" in="SvgjsFeFlood1279Out" in2="SourceAlpha"
														operator="in" result="SvgjsFeComposite1280Out"></feComposite>
													<feOffset id="SvgjsFeOffset1281" dx="1" dy="1" result="SvgjsFeOffset1281Out"
														in="SvgjsFeComposite1280Out"></feOffset>
													<feGaussianBlur id="SvgjsFeGaussianBlur1282" stdDeviation="1 "
														result="SvgjsFeGaussianBlur1282Out" in="SvgjsFeOffset1281Out"></feGaussianBlur>
													<feMerge id="SvgjsFeMerge1283" result="SvgjsFeMerge1283Out" in="SourceGraphic">
														<feMergeNode id="SvgjsFeMergeNode1284" in="SvgjsFeGaussianBlur1282Out"></feMergeNode>
														<feMergeNode id="SvgjsFeMergeNode1285" in="[object Arguments]"></feMergeNode>
													</feMerge>
													<feBlend id="SvgjsFeBlend1286" in="SourceGraphic" in2="SvgjsFeMerge1283Out" mode="normal"
														result="SvgjsFeBlend1286Out"></feBlend>
												</filter>
												<filter id="SvgjsFilter1291" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%"
													y="-50%">
													<feFlood id="SvgjsFeFlood1292" flood-color="#000000" flood-opacity="0.45"
														result="SvgjsFeFlood1292Out" in="SourceGraphic"></feFlood>
													<feComposite id="SvgjsFeComposite1293" in="SvgjsFeFlood1292Out" in2="SourceAlpha"
														operator="in" result="SvgjsFeComposite1293Out"></feComposite>
													<feOffset id="SvgjsFeOffset1294" dx="1" dy="1" result="SvgjsFeOffset1294Out"
														in="SvgjsFeComposite1293Out"></feOffset>
													<feGaussianBlur id="SvgjsFeGaussianBlur1295" stdDeviation="1 "
														result="SvgjsFeGaussianBlur1295Out" in="SvgjsFeOffset1294Out"></feGaussianBlur>
													<feMerge id="SvgjsFeMerge1296" result="SvgjsFeMerge1296Out" in="SourceGraphic">
														<feMergeNode id="SvgjsFeMergeNode1297" in="SvgjsFeGaussianBlur1295Out"></feMergeNode>
														<feMergeNode id="SvgjsFeMergeNode1298" in="[object Arguments]"></feMergeNode>
													</feMerge>
													<feBlend id="SvgjsFeBlend1299" in="SourceGraphic" in2="SvgjsFeMerge1296Out" mode="normal"
														result="SvgjsFeBlend1299Out"></feBlend>
												</filter>
											</defs>
											<g id="SvgjsG1270" class="apexcharts-pie">
												<g id="SvgjsG1271" transform="translate(0, 0) scale(1)">
													<circle id="SvgjsCircle1272" r="23.809756097560975" cx="87.5" cy="87.5" fill="transparent">
													</circle>
													<g id="SvgjsG1273" class="apexcharts-slices">
														<g id="SvgjsG1274" class="apexcharts-series apexcharts-pie-series" seriesName="Male" rel="1"
															data:realIndex="0">
															<path id="SvgjsPath1275"
																d="M 87.5 8.134146341463406 A 79.3658536585366 79.3658536585366 0 1 1 12.01858770672122 112.02539755356291 L 64.85557631201637 94.85761926606887 A 23.809756097560975 23.809756097560975 0 1 0 87.5 63.69024390243902 L 87.5 8.134146341463406 z"
																fill="rgba(67,94,190,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt"
																stroke-width="2" stroke-dasharray="0"
																class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="252"
																data:startAngle="0" data:strokeWidth="2" data:value="70"
																data:pathOrig="M 87.5 8.134146341463406 A 79.3658536585366 79.3658536585366 0 1 1 12.01858770672122 112.02539755356291 L 64.85557631201637 94.85761926606887 A 23.809756097560975 23.809756097560975 0 1 0 87.5 63.69024390243902 L 87.5 8.134146341463406 z"
																stroke="#ffffff"></path>
														</g>
														<g id="SvgjsG1287" class="apexcharts-series apexcharts-pie-series" seriesName="Female"
															rel="2" data:realIndex="1">
															<path id="SvgjsPath1288"
																d="M 12.01858770672122 112.02539755356291 A 79.3658536585366 79.3658536585366 0 0 1 87.48614804547034 8.134147550274477 L 87.4958444136411 63.69024426508234 A 23.809756097560975 23.809756097560975 0 0 0 64.85557631201637 94.85761926606887 L 12.01858770672122 112.02539755356291 z"
																fill="rgba(85,198,232,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt"
																stroke-width="2" stroke-dasharray="0"
																class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="108"
																data:startAngle="252" data:strokeWidth="2" data:value="30"
																data:pathOrig="M 12.01858770672122 112.02539755356291 A 79.3658536585366 79.3658536585366 0 0 1 87.48614804547034 8.134147550274477 L 87.4958444136411 63.69024426508234 A 23.809756097560975 23.809756097560975 0 0 0 64.85557631201637 94.85761926606887 L 12.01858770672122 112.02539755356291 z"
																stroke="#ffffff"></path>
														</g>
														<g id="SvgjsG1276" class="apexcharts-datalabels"><text id="SvgjsText1277"
																font-family="Helvetica, Arial, sans-serif" x="129.23541084884027" y="117.82255090545878"
																text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600"
																fill="#ffffff" class="apexcharts-text apexcharts-pie-label"
																filter="url(#SvgjsFilter1278)"
																style="font-family: Helvetica, Arial, sans-serif;">70.0%</text></g>
														<g id="SvgjsG1289" class="apexcharts-datalabels"><text id="SvgjsText1290"
																font-family="Helvetica, Arial, sans-serif" x="45.76458915115971" y="57.177449094541224"
																text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600"
																fill="#ffffff" class="apexcharts-text apexcharts-pie-label"
																filter="url(#SvgjsFilter1291)"
																style="font-family: Helvetica, Arial, sans-serif;">30.0%</text></g>
													</g>
												</g>
											</g>
											<line id="SvgjsLine1300" x1="0" y1="0" x2="175" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
												stroke-width="1" class="apexcharts-ycrosshairs"></line>
											<line id="SvgjsLine1301" x1="0" y1="0" x2="175" y2="0" stroke-dasharray="0" stroke-width="0"
												class="apexcharts-ycrosshairs-hidden"></line>
										</g>
										<g id="SvgjsG1267" class="apexcharts-annotations"></g>
									</svg>
									<div class="apexcharts-tooltip apexcharts-theme-dark" style="left: -4.27344px; top: -3.59375px;">
										<div class="apexcharts-tooltip-series-group apexcharts-active"
											style="order: 1; display: flex; background-color: rgb(85, 198, 232);"><span
												class="apexcharts-tooltip-marker"
												style="background-color: rgb(85, 198, 232); display: none;"></span>
											<div class="apexcharts-tooltip-text"
												style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
												<div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Female:
													</span><span class="apexcharts-tooltip-text-value">30</span></div>
												<div class="apexcharts-tooltip-z-group"><span
														class="apexcharts-tooltip-text-z-label"></span><span
														class="apexcharts-tooltip-text-z-value"></span></div>
											</div>
										</div>
										<div class="apexcharts-tooltip-series-group"
											style="order: 2; display: none; background-color: rgb(85, 198, 232);"><span
												class="apexcharts-tooltip-marker"
												style="background-color: rgb(85, 198, 232); display: none;"></span>
											<div class="apexcharts-tooltip-text"
												style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
												<div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Female:
													</span><span class="apexcharts-tooltip-text-value">30</span></div>
												<div class="apexcharts-tooltip-z-group"><span
														class="apexcharts-tooltip-text-z-label"></span><span
														class="apexcharts-tooltip-text-z-value"></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="resize-triggers">
								<div class="expand-trigger">
									<div style="width: 246px; height: 231px;"></div>
								</div>
								<div class="contract-trigger"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


@endsection