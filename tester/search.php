<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Language" content="en-us">

	<script src="search.js"></script>
</head>

<body>
	<div class="content">

		<form>
			<h3>Search</h3>

			
			</datalist>

			
			<input type="text" id="ajax" list="json-datalist" onkeyup="myFunction(this.value,event)" onblur="getQuestions(this.value)" placeholder="e.g. datalist">
			<datalist id="json-datalist"></datalist>

            <input id="ipQuestion" list="ipQuestion" onkeyup="kjall12(this.value,event)">
			<datalist id="dlQuestion">
                
            </datalist>
            <table id=tQusetion>
            </table>

		</form>
	</div>
</body>
<script>

</script>
</html>