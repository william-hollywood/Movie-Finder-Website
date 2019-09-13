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
				<h1>Search</h1>
				<img src="media/magglass.png" alt="magglass" style="width:20%;height:auto;">
				<div id="searchbox" style="display: block;">
					<form id ="search" action="search.php" method="post" style="height: auto;display: block;">
						<div id="basicSearch" style="width: 64%;">
							<label>Genre 1:</label>
							<select name="Genre1" class="searchInput" id="genre1">
								<option value="*">Any</option>
								<?php

									//get db connection

									$server = "localhost";
									$user = "root";
									$pass = "";
									$db = "hollywood_MovieFinder_SomethingUnique";

									$conn = new mysqli($server, $user, $pass, $db);

									if ($conn->connect_errno){
										printf ("Error: %s", $conn->connect_error);
									}

									//query for getting values from db to populate dropdowns

									$gen1 = mysqli_query($conn,"SELECT aboutGenre1 FROM movieAbout UNION SELECT aboutGenre2 FROM movieAbout UNION SELECT aboutGenre3 FROM movieAbout UNION SELECT aboutGenre4 FROM movieAbout UNION SELECT aboutGenre5 FROM movieAbout UNION SELECT aboutGenre6 FROM movieAbout UNION SELECT aboutGenre7 FROM movieAbout UNION SELECT aboutGenre8 FROM movieAbout ORDER BY aboutGenre1 ASC");
									while ($row = mysqli_fetch_array($gen1)){
										if($row['aboutGenre1'] == NULL){}else{
											echo "<option value='".$row['aboutGenre1']."'>" . $row['aboutGenre1'] . "</option>";
										}
									}
								?>
	          				</select>
	          				<br/>
	          				<label>Genre 2:</label>
							<select name="Genre2" class="searchInput" id="genre2">
								<option value="*">Any</option>
				            	<?php
									if ($conn->connect_errno){
										printf ("Error: %s", $conn->connect_error);
									}
									$gen2 = mysqli_query($conn,"SELECT aboutGenre1 FROM movieAbout UNION SELECT aboutGenre2 FROM movieAbout UNION SELECT aboutGenre3 FROM movieAbout UNION SELECT aboutGenre4 FROM movieAbout UNION SELECT aboutGenre5 FROM movieAbout UNION SELECT aboutGenre6 FROM movieAbout UNION SELECT aboutGenre7 FROM movieAbout UNION SELECT aboutGenre8 FROM movieAbout ORDER BY aboutGenre1 ASC");
									while ($row = mysqli_fetch_array($gen2)){
										if($row['aboutGenre1'] == NULL){}else{
											echo "<option value='".$row['aboutGenre1']."'>" . $row['aboutGenre1'] . "</option>";
										}
									}
								?>
	          				</select>
	          				<br/>
	      					<label>Language</label>
							<select name="Language" class="searchInput" id="language">
								<option value="*">Any</option>
					        	<?php
									if ($conn->connect_errno){
										printf ("Error: %s", $conn->connect_error);
									}
									$lang = mysqli_query($conn,"SELECT DISTINCT movieLanguage FROM movieInfo ORDER BY movieLanguage ASC");
									while ($row = mysqli_fetch_array($lang)){
										if($row['movieLanguage'] == NULL){
										}else{
											echo "<option value='".$row['movieLanguage']."'>" . $row['movieLanguage'] . "</option>";
										}
									}
								?>
					        </select>
					        <br/>
							<label>Director:</label>
							<select name="Director" class="searchInput" id="director">
								<option value="*">Any</option>
				            	<?php
									if ($conn->connect_errno){
										printf ("Error: %s", $conn->connect_error);
									}
									$dir = mysqli_query($conn,"SELECT DISTINCT personDirector FROM moviePeople ORDER BY personDirector ASC");
									while ($row = mysqli_fetch_array($dir)){
										if($row['personDirector'] == NULL){}else{
											echo "<option value='".$row['personDirector']."'>" . $row['personDirector'] . "</option>";
										}
									}
								?>
	          				</select>
	          				<br/>
	          				<label>Actor 1:</label>
							<select name="Actor1" class="searchInput" id="actor1">
								<option value="*">Any</option>
				            	<?php
									if ($conn->connect_errno){
										printf ("Error: %s", $conn->connect_error);
									}
									$act1 = mysqli_query($conn,"SELECT personActor1 FROM moviePeople UNION SELECT personActor2 FROM moviePeople UNION SELECT personActor3 FROM moviePeople ORDER BY personActor1 ASC");
									while ($row = mysqli_fetch_array($act1)){
										if($row['personActor1'] == NULL){}else{
											echo "<option value='".$row['personActor1']."'>" . $row['personActor1'] . "</option>";
										}
									}
								?>
	          				</select>
	          				<br/>
	          				<label>Actor 2:</label>
							<select name="Actor2" class="searchInput" id="actor2">
								<option value="*">Any</option>
				            	<?php
									if ($conn->connect_errno){
										printf ("Error: %s", $conn->connect_error);
									}
									$act2 = mysqli_query($conn,"SELECT personActor1 FROM moviePeople UNION SELECT personActor2 FROM moviePeople UNION SELECT personActor3 FROM moviePeople ORDER BY personActor1 ASC");
									while ($row = mysqli_fetch_array($act2)){
										if($row['personActor1'] == NULL){}else{
											echo "<option value='".$row['personActor1']."'>" . $row['personActor1'] . "</option>";
										}
									}
								?>
	          				</select>
	          				<br/>
	      					<label>Colour:</label>
							<select name="Colour" class="searchInput" id="colour">
								<option value="*">Any</option>
								<?php
									if ($conn->connect_errno){
										printf ("Error: %s", $conn->connect_error);
									}
									$colour = mysqli_query($conn,"SELECT DISTINCT movieColour FROM movieInfo ORDER BY movieColour ASC");
									while ($row = mysqli_fetch_array($colour)){
										if($row['movieColour'] == NULL){}else{
											echo "<option value='".$row['movieColour']."'>" . $row['movieColour'] . "</option>";
										}
									}
								?>
					        </select>
				        </div>

						<div id="advancedSearch" style="display: none;">
							<label for="year">Year:</label>
		          				<input type="number" name="year" id="year" min="1916" max="2016"><br/>
		          			<label for="after">After</label>
		          				<input type="radio" name="yeartime" id="after" value="<" checked><br/>
		          			<label for="during">During</label>
		          				<input type="radio" name="yeartime" id="during" value="="><br/>
		          			<label for="before">Before</label>
		          					<input type="radio" name="yeartime" id="before" value=">"><br/>
	          				<label for="length">Length:</label>
	          					<input type="number" name="length" id="length" min="1" max="999"><br/>
		          			<label for="longerThan">Longer than</label>
		          				<input type="radio" name="lengthtime" id="longerThan" value=">" checked><br/>
		          			<label for="shorterThan">Shorter than</label>
		          				<input type="radio" name="lengthtime" id="shorterThan" value="<"><br/>

		          			<label>Content Rating:</label>
							<select name="ContentRating" class="searchInput" id="ContentRating">
								<option value="*">Any</option>
								<?php
									if ($conn->connect_errno){
										printf ("Error: %s", $conn->connect_error);
									}
									$colour = mysqli_query($conn,"SELECT DISTINCT movieRating FROM movieInfo ORDER BY movieRating ASC");
									while ($row = mysqli_fetch_array($colour)){
										if($row['movieRating'] == NULL){}else{
											echo "<option value='".$row['movieRating']."'>" . $row['movieRating'] . "</option>";
										}
									}
								?>
					        </select>
						</div>
						<div class="sortstuff" style="width: 30%;margin-left: 40%;">
						Sort by: 
							<select name="sorttype" id="sorttypenamrat" style="float: center;">
								<option value="movieName">Movie Name</option>
								<option value="movieImdbScore">Imdb Rating</option>
							</select>
							<select name="sort" id="sortlowhigh" style="float: center;">
								<option value="ASC">A-Z/Low-High</option>
								<option value="DESC">Z-A/High-Low</option>
							</select>
							<br/>
						<label for="resultNum">No. of Results:</label>
		          		<input type="number" name="resultNum" id="resultNum" min="1" max="40"  required value="20">
						</div>
					
						
						<button type="submit" name="submit" style="margin-left: 45%;"> Submit </button>
					</form>
				</div>

				<button type="button" onclick="hideShow()" style="float: center;">Toggle Advanced Search</button>
				
				<script type="text/javascript">
				function hideShow() {
				    var x = document.getElementById('advancedSearch');
				    var y = document.getElementById('basicSearch');
				    if (x.style.display === 'none') {
				        x.style.display = 'block';
				    } else {
				        x.style.display = 'none';
				    }
				}
				function toggleSort() {
					var z = document.getElementById('sort');
				    if(z.value === 'ASC'){
				    	z.value = 'DESC';
				    	z.innerText = 'Sort By: Z-A';
				    } else{
				    	z.value = 'ASC';
				    	z.innerText = 'Sort By: A-Z';
				    }
				}
				</script>

				<table class="results" style="width: 95%;margin: auto;font-weight:normal;border-collapse:collapse;border-spacing:0;border-color: #7EB977;"" border="1px" >
					<tbody>
						<?php
						//var_dump($_POST);
							
							if(isset($_POST['Genre1'])){

								echo "<tr>
										<th width='35%'>Movie Name</th>
										<th width='55%'>About</th>
									</tr>";
								$getGen1 = $_POST["Genre1"];
								$getGen2 = $_POST["Genre2"];
								$getLang = $_POST["Language"];
								$getDir = $_POST["Director"];
								$getAct1 = $_POST["Actor1"];
								$getAct2 = $_POST["Actor2"];
								$getCol = $_POST["Colour"];
								$getYear = $_POST["year"];
								$getYearTime = $_POST["yeartime"];
								$getLength = $_POST["length"];
								$getLengthTime = $_POST["lengthtime"];
								$contentRating = $_POST["ContentRating"];
								$sorttype = $_POST["sorttype"];
								$sort = $_POST["sort"];
								$x = $_POST["resultNum"];

								$querystart = "SELECT * FROM movieAbout 
									INNER JOIN `movieInfo` ON `movieAbout`.`movieID`=`movieInfo`.`movieID` 
									INNER JOIN `moviePeople` ON `movieAbout`.`movieID`=`moviePeople`.`movieID` 
									WHERE ";


								//parts of querys which can all be put into one concatenated query

								$querygenre1 = "(aboutGenre1 = '$getGen1' OR aboutGenre2 = '$getGen1' OR aboutGenre3 = '$getGen1' OR aboutGenre4 = '$getGen1' OR aboutGenre5 = '$getGen1' OR aboutGenre6 = '$getGen1' OR aboutGenre7 = '$getGen1' OR aboutGenre8 = '$getGen1') AND ";
								$querygenre2="(aboutGenre1 = '$getGen2' OR aboutGenre2 = '$getGen2' OR aboutGenre3 = '$getGen2' OR aboutGenre4 = '$getGen2' OR aboutGenre5 = '$getGen2' OR aboutGenre6 = '$getGen2' OR aboutGenre7 = '$getGen2' OR aboutGenre8 = '$getGen2') AND ";
								$querylanguage="(movieLanguage = '$getLang') AND ";
								$querydirector="(personDirector = '$getDir') AND ";
								$queryactor1="(personActor1 = '$getAct1' OR personActor2 = '$getAct1' OR personActor3 = '$getAct1') AND ";
								$queryactor2="(personActor1 = '$getAct2' OR personActor2 = '$getAct2' OR personActor3 = '$getAct2') AND ";
								$querycolour="(movieColour = '$getCol') AND ";
								$queryyear="(movieYear $getYearTime '$getYear') AND ";
								$querylength="(movieDuration $getLengthTime '$getLength') AND ";
								$querycontent="(movieRating = '$contentRating') AND ";
								$querytrue="TRUE ";
								$querysort="ORDER BY $sorttype $sort";

								$querypages = " LIMIT ".$x;

								//ternary operator (short hand if/else statements) to check if the input is  * (any) and deciedes whether to put them in or not.

								$fullquery = $querystart.
								($getGen1 == "*" ? "" : $querygenre1).
								($getGen2 == "*" ? "" : $querygenre2).
								($getLang == "*" ? "" : $querylanguage).
								($getDir == "*" ? "" : $querydirector).
								($getAct1 == "*" ? "" : $queryactor1).
								($getAct2 == "*" ? "" : $queryactor2).
								($getCol == "*" ? "" : $querycolour).
								($getYear == "" ? "" : $queryyear).
								($getLength == "" ? "" : $querylength).
								($contentRating == "*" ? "" : $querycontent).
								$querytrue.$querysort.$querypages;
								
								$getmovies = mysqli_query($conn,$fullquery);
								if(!$getmovies || mysqli_num_rows($getmovies) == 0){
									echo "
									<tr>
										<td>No Matching Results</td>
										<td>Please Try Again With A Wider Serch Field</td>
									</tr>";
								}else{
								while ($row = mysqli_fetch_array($getmovies)){
									if($row['movieID'] == NULL){}else{
									$imdbID = substr($row['movieImdbLink'], 26, -17);
									echo "
										<tr>
											<td><a href='movieinfo.php?movieID=".$row['movieID']."'>".$row['movieName']."<br/><img id='ThumbSmall".$imdbID."' alt='".$row['movieName']." Thumbnail' src='media/noposter.jpg' style='width:100px;height:150px;'></a></td>
											<td> Genres: ".
											($row['aboutGenre1'] == NULL ? "" : $row['aboutGenre1']).
											($row['aboutGenre2'] == NULL ? "" : ", ".$row['aboutGenre2']). 
											($row['aboutGenre3'] == NULL ? "" : ", ".$row['aboutGenre3']).
											($row['aboutGenre4'] == NULL ? "" : ", ".$row['aboutGenre4']).
											($row['aboutGenre5'] == NULL ? "" : ", ".$row['aboutGenre5']).
											($row['aboutGenre6'] == NULL ? "" : ", ".$row['aboutGenre6']).
											($row['aboutGenre7'] == NULL ? "" : ", ".$row['aboutGenre7']).
											($row['aboutGenre8'] == NULL ? "" : ", ".$row['aboutGenre8']).
											"<br/>Length: ".$row['movieDuration']." Minutes".
											"<br/>IMDB Rating: ".$row['movieImdbScore'].
											"<br/>Content Rating: ".$row['movieRating'].
											"</td>
										</tr>
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
											var x = document.getElementById('ThumbSmall".$imdbID."');
											var imglink = 'http://image.tmdb.org/t/p/w185' + response.movie_results[0].poster_path;
											x.src = imglink;});
										</script>";
									}
								}
							}
						}
						?>
					</tbody>
				</table>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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