<?php
include '../lib/MySearchPosition/MySearchPosition.php'
?>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="./bootstrap/darkly/bootstrap.css" media="screen">
		<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="./bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="page-header">
				<div class="row">
					<div class="col-lg-8 col-md-7 col-sm-6">
						<h1>MySearchPosition</h1>
						<p class="lead"><a href="https://github.com/fillipebs/MySearchPosition">https://github.com/fillipebs/MySearchPosition</a></p>
					</div>
				</div>
			</div>
			
			<div class="page-content">
				<div class="row">
					<div class="col-md-12">
					
						<h2>Annotation</h2>
						<p class="text-muted">mySearchPosition($myUrl, $myKeyExpression, $searchEngine = "google", $limitPages = 10)</p>
					
						<h2>Usage</h2>
						<table class="table table-striped table-hover ">
							<thead>
								<tr>
									<th>$myUrl</th>
									<th>$myKeyExpression</th>
									<th>$searchEngine</th>
									<th>$limitPages</th>
									<th>$result['page']</th>
									<th>$result['position']</th>
									<th>$result['error']</th>
								<tr>
							</thead>
							<tbody>
								<tr>
									<?php 
										$search_1 = new MySearchPosition();
										$search_1->mySearchPosition("github.com", "git")
									?>
									<td>github.com</td>
									<td>git</td>
									<td>default</td>
									<td>default</td>
									<td><?php echo isset($search_1->result["page"]) ? $search_1->result["page"] : "" ?></td>
									<td><?php echo isset($search_1->result["position"]) ? $search_1->result["position"] : "" ?></td>
									<td><?php echo isset($search_1->result["error"]) ? $search_1->result["error"] : "" ?></td>
								<tr>
								<tr>
									<?php 
										$search_2 = new MySearchPosition();
										$search_2->mySearchPosition("stackoverflow.com", "community of programmers", "bing")
									?>
									<td>stackoverflow.com</td>
									<td>community of programmers</td>
									<td>bing</td>
									<td>default</td>
									<td><?php echo isset($search_2->result["page"]) ? $search_2->result["page"] : "" ?></td>
									<td><?php echo isset($search_2->result["position"]) ? $search_2->result["position"] : "" ?></td>
									<td><?php echo isset($search_2->result["error"]) ? $search_2->result["error"] : "" ?></td>
								<tr>
								<tr>
									<?php 
										$search_3 = new MySearchPosition();
										$search_3->mySearchPosition("twitter.com", "social network", "yahoo", 5)
									?>
									<td>twitter.com</td>
									<td>social network</td>
									<td>yahoo</td>
									<td>5</td>
									<td><?php echo isset($search_3->result["page"]) ? $search_3->result["page"] : "" ?></td>
									<td><?php echo isset($search_3->result["position"]) ? $search_3->result["position"] : "" ?></td>
									<td><?php echo isset($search_3->result["error"]) ? $search_3->result["error"] : "" ?></td>
								<tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>