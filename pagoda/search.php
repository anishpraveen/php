<!DOCTYPE html>
<html lang="en">

<head>
<link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    
	<meta http-equiv="Content-Language" content="en-us">

	<script src="search.js"></script>
</head>

<body>
<?php 
include("pagepermission.php");
include("header.php");
?>
	<div id="divContent">
		<li style="float:left; text-align:left; "><a href="qaHome.php">Return Home</a></li><br><br>
		<form>
			<h3>Search</h3>

			
			</datalist>

			
			<input type="text" id="ajax" list="json-datalist" onkeyup="myFunction(this.value,event)" onblur="getQuestions(this.value)" placeholder="Category Search">
			
			<datalist id="json-datalist"></datalist>
			</br>
            <input id="ipQuestion" list="ipQuestion" placeholder="Q&A" onkeyup="kjall12(this.value,event)">
			<datalist id="dlQuestion">
                
            </datalist>
			 <style>
                    
                   table{
                       margin-top:10px;
                       margin-left:35%;
                       text-align: left;
					   border-width:0px;
                   }
				   </style>
            <table id=tQusetion>
            </table>

		</form>
	</div>
	<?php 
include("footer.php");
?>
</body>
<script>

</script>
</html>