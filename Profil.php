<!DOCTYPE html>
	<html lang="en">
		<head>
			 <title>ECEmplois</title>
			 <meta charset="utf-8">
			 <meta name="viewport" content="width=device-width, initial-scale=1">
			 <link rel="stylesheet"
			 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			 <style type="text/css">
			      [id*="principal"] 
			      	{ 
			      		
			      		background-color: rgb(30, 30, 30) ;
			      		border-radius: 5px;
			      		font-weight:bold;
			      		height: 700px ;
			      		color: white ;
			      		padding: 20px ; 
			      	}
			      	[id*="photoProfil"] 
			      	{ 
			      		margin: 20px; 
			      	}
			      	
					
    		</style>
			 
		</head>
		<body>
			<div class="container">
				
				<!-- Onglets + barre de recherche  -->
				<div class="navbar navbar-inverse">
					<div class="container-fluid">
 					 <ul class="nav navbar-nav">
					  	<li><a href="Accueil.html">Accueil <span class="glyphicon glyphicon-home"></span></a></li>
					  	<li><a href="MonReseau.php">Mon Réseau <span class="glyphicon glyphicon-globe"></span></a></li>
					  	<li><a href="Notifications.html">Notifications <span class="glyphicon glyphicon-exclamation-sign"></span> </a></li>
					  	<li><a href="Emplois.html">Emplois <span class="glyphicon glyphicon-briefcase"></span></a></li>
					  	<li><a href="Photos.php">Photos <span class="glyphicon glyphicon-picture"></span></a></li>
					  	<li><a href="Messagerie.php">Messagerie <span class="glyphicon glyphicon-comment"></span></a></li>
				     </ul>
				     <form class="navbar-form navbar-right">
						        <input type="text" class="input-sm form-control" placeholder="Recherche">
						        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span></button>
				     </form>
					</div>
				</div>

				<div id="principal" class = "container-fluid">

					<p>Profil</p> 

					<img id="photoProfil" src="images/1.png" width="300" height="300">


				</div>

			</div>

		</body>
</html> 