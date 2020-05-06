<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misuri fundings</title>
    
    <!--------------css------------------------>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <!--------------Scripts------------------------>
  	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="js/main.js"></script>
</head>
<body>
	<!-------------------------------nav---------------------------------------------->
	<div class="header">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">Fundings</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
		  
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav mr-auto">
				<li class="nav-item active">
				  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Dropdown
				  </a>
				  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Something else here</a>
				  </div>
				</li>
				<li class="nav-item">
				  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</li>
			  </ul>
			  <form class="form-inline my-2 my-lg-0">
			  	<a href="vNewFunding.html" type="button" class="btn btn-info formBtn mr-2" id="newFundingButton">Nuevo funding</a>
				<button type="button" class="btn btn-info formBtn" id="logoutButton">Cerrar Sesi�n</button>
			  </form>
			</div>
		  </nav>
	</div>

	<div class="pageBody">
	<!--------------------------card grande---------------------->	
		<div class="card mainCard" >
			<div class="row no-gutters">
			  <div class="col-md-4">
				<img src="..." class="card-img" alt="...">
			  </div>
			  <div class="col-md-8">
				<div class="card-body">
				  <h5 class="card-title">Card title</h5>
				  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>				
				</div>
			  </div>
			</div>
		  </div>
		  <!-----------------------------cards medianos----------->
		  <div class="card-group">
			<div class="card secondaryCard">
			  <img src="..." class="card-img-top" alt="...">
			  <div class="card-body">
		
				<h5 class="card-title">Card title</h5>
				<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
			  </div>
			</div>
			<div class="card secondaryCard">
			  <img src="..." class="card-img-top" alt="...">
			  <div class="card-body">
				<h5 class="card-title">Card title</h5>
				<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
				<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
			  </div>
			</div>
			</div>
	</div>
</body>
</html>