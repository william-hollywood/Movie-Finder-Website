<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8"> <!-- Character type -->
		<link rel="stylesheet" type="text/css" title="main" href="assets/css/main.css"> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link rel="icon" href="media/magglass.png"> <!-- Tab bar icon -->
		<title>Movie Search Help</title> <!-- top webpage id -->
		<meta name="description" content="">
		<meta name="keywords" content="Potato">
		<meta name="author" content="William Hollywood">
		<meta name="viewport" content="width=device-width, inital-scale=1.0">
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	</head>

	<body>

		<div id="wrapper">
			<header>
			<img id="banners" class="banner" alt="Banner" src="media/banner_black.png" onmouseover="this.src='media/banner_colour.png'" onmouseout="this.src='media/banner_black.png'"/>
			</header>
			<nav>
				<a href="index.html">
					<div id="buttHome" class="button">
						Home
					</div>
				</a>
				<a href="search.php">
					<div id="buttSearch" class="button">
						Search
					</div>
				</a>
				<a href="faq.html">
					<div id="buttFAQ" class="button">
						FAQ
					</div>
				</a>
				<a href="contact.html">
					<div id="buttContact" class="button">
						Contact
					</div>
				</a>
				<a href="store.html">
					<div id="buttStore" class="button">
					Store
					</div>
				</a>
			</nav>
			<main>
				<?php
					$server = "localhost";
					$user = "root";
					$pass = "";
					$db = "hollywood_MovieFinder_SomethingUnique";

					$conn = new mysqli($server, $user, $pass, $db);

					if ($conn->connect_errno){
						printf ("Error: %s", $conn->connect_error);
					}
					$movieID = $_REQUEST['movieID'];
					$query = "SELECT * FROM movieInfo 
									INNER JOIN `movieAbout` ON `movieInfo`.`movieID`=`movieAbout`.`movieID` 
									INNER JOIN `moviePeople` ON `movieInfo`.`movieID`=`moviePeople`.`movieID`
									WHERE `movieInfo`.`movieID` = $movieID";
					$getmovieInfo = mysqli_query($conn,$query);
					
					while ($row = mysqli_fetch_array($getmovieInfo)){
						$imdbID = substr($row['movieImdbLink'], 26, -17);
						
						echo "<h1>".$row['movieName']."</h1>
						<img id='ThumbBig' alt='".$row['movieName']." Thumbnail' src='media/noposter.jpg' style='width:200px;height:300px;'>
						<p>Movie Name: ".$row['movieName']."<br/>
						Year Movie Released: ".$row['movieYear']."<br/>
						Content Rating: ".$row['movieRating']."<br/>
						Movie Language: ".$row['movieLanguage']."<br/>
						Movie made in: ".$row['movieCountry']."<br/>
						Movie Duration: ".$row['movieDuration']." Minutes<br/>
						Movie Budget: $".$row['movieBudget']."<br/>
						Movie Gross: $".$row['movieGross']."<br/>
						Movie FaceBook Likes: ".$row['movieFbLikes']." Likes<br/>
						Genres: ".($row['aboutGenre1'] == NULL ? "" : $row['aboutGenre1']).
						($row['aboutGenre2'] == NULL ? "" : ", ".$row['aboutGenre2']). 
						($row['aboutGenre3'] == NULL ? "" : ", ".$row['aboutGenre3']).
						($row['aboutGenre4'] == NULL ? "" : ", ".$row['aboutGenre4']).
						($row['aboutGenre5'] == NULL ? "" : ", ".$row['aboutGenre5']).
						($row['aboutGenre6'] == NULL ? "" : ", ".$row['aboutGenre6']).
						($row['aboutGenre7'] == NULL ? "" : ", ".$row['aboutGenre7']).
						($row['aboutGenre8'] == NULL ? "" : ", ".$row['aboutGenre8'])."<br/>
						Plot keywords: ".
						($row['aboutKeyword1'] == NULL ? "" : $row['aboutKeyword1']).
						($row['aboutKeyword2'] == NULL ? "" : ", ".$row['aboutKeyword2']). 
						($row['aboutKeyword3'] == NULL ? "" : ", ".$row['aboutKeyword3']).
						($row['aboutKeyword4'] == NULL ? "" : ", ".$row['aboutKeyword4']).
						($row['aboutKeyword5'] == NULL ? "" : ", ".$row['aboutKeyword5'])."
						<br/> Important People<br/>
						Director: ".$row['personDirector']."<br/>
						Actors: ".$row['personActor1'].
						($row['personActor2'] == NULL ? "" : ", ".$row['personActor2']).
						($row['personActor3'] == NULL ? "" : ", ".$row['personActor3'])."
						</p>
						<script>
						var settings = {
						  'async': true,
						  'crossDomain': true,
						  'url': 'https://api.themoviedb.org/3/find/".$imdbID."?external_source=imdb_id&language=en-US&api_key=0e5a89b1e1b134ee9399ee289bca7a60',
						  'method': 'GET',
						  'headers': {},
						  'data': '{}'
						}

						$.ajax(settings).done(function (response) {
						console.log(response);
						var x = document.getElementById('ThumbBig');
						var imglink = 'http://image.tmdb.org/t/p/w185' + response.movie_results[0].poster_path;
						x.src = imglink;});
						</script>";
						?>

						<table class='results' style='width: 95%;margin: auto;font-weight:normal;border-collapse:collapse;border-spacing:0;border-color: #7EB977;' border='1px'>
							<tbody>
								<tr>
									<th width='10%'>Comment Number</th>
									<th width='90%'>Comments</th>
								</tr>

						<?php
						$query2 = "SELECT * FROM movieComments WHERE movieID = '$movieID'";
						$getmovieComments = mysqli_query($conn,$query2);
						if(!$getmovieComments || $row = mysqli_fetch_array($getmovieComments)){
							while ($row = mysqli_fetch_array($getmovieComments)){
							echo "
							<tr>
								<td>".$row['commentNumber']."</td>
								<td>".$row['commentText']."<br/>
								Submitted By: ".$row['commentPerson']."</td>
							</tr>
							";
							}
						}else{
							echo "
								<tr>
									<td></td>
									<td>No Comments To Show</td>
								</tr>";
							}
						}
				?>
				</tbody>
				</table>
				<div id="searchbox" style="display: block;">
					<?php echo "<form id='addComment' action=movieinfo.php?movieID=".$movieID." method='post' style='height: auto;display: block;'>" ?>
						<label>Add A Comment:</label><br/>
						<textarea name="addCommentText" class="addComment" id="addCommentText" style="resize: none;width: 40%;height: 7em;">Your comment goes in here.</textarea><br/>
						<label>Comment by:</label>
						<input type="text" name="addCommentPerson" class="addComment" id="addCommentPerson" style="resize: none;width: 15%;height: 1em;" value="(Name)"><br/>
						<button type="submit" name="submit" style="margin-left: 0%;"> Submit </button>
					</form>
				</div>
				<?php 
					if(isset($_POST['addCommentText'])){
					$movieID = $_REQUEST['movieID'];
					$getcommentText = $_POST["addCommentText"];
					$getcommentPerson = $_POST["addCommentPerson"];
					$queryaddComment ="
						INSERT INTO `hollywood_MovieFinder_SomethingUnique`.`movieComments` (`movieID`, `commentNumber`, `commentText`, `commentPerson`)
						VALUES ('$movieID' , NULL, '$getcommentText', '$getcommentPerson')";
					$result = mysqli_query($conn,$queryaddComment);

					}
				?>
			</main>
			<footer>&copy;&copy;&copy; William Hollywood &copy;&copy;&copy;<br/>
			All Movie Posters Taken from The Movie DataBase<br/>
			<i class="fa fa-twitter"></i>
			<a href="http://facebook.com/profile.php" target="_blank"><i class="fa fa-facebook"></i></a>
			<i class="fa fa-instagram"></i>
			</footer>
		</div>
	</body>

</html>