<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dynamic Dependent Select Box</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main">
		<div id="header">
			<h1>Dynamic Dependent Select Box in<br> PHP & jQuery Ajax</h1>
		</div>
		<div id="content">
			<form method="">
        <label>Country : </label>
        <select id="country">
        	<option value="">Select Country</option>
        </select>
				<br><br>
        <label>State : </label>
        <select id="state">
        	<option value=""></option>
        </select>
      </form>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		$(document).ready(function(){
			function loadData(data_Type, data_name){
				$.ajax({
					type:"POST",
					url:"load-cs.php",
					data:{type:data_Type, dataName:data_name},
					success: function(data){
						if (data_Type == "stateData") {
							$('#state').html(data);
						}else{
						$('#country').append(data)
					}
				}
				})
			};
			loadData();

			$('#country').on('change', function(){
				var selectCountry = $('#country').val();
				if (selectCountry != "") {
					loadData('stateData',selectCountry)
				}else{
				$('#state').html()
				}
			})
		})
	</script>
	</html> 
</body>