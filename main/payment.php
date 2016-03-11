<html>
<head>
<title>Checkout</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script>
function suggest(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("autosuggestname.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		$('#country').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 600);
	}

</script>

<style>
#result {
	height:20px;
	font-size:16px;
	font-family:Arial, Helvetica, sans-serif;
	color:#333;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFF99;
}
#country{
	border: 1px solid #999;
	background: #EEEEEE;
	padding: 5px 10px;
	box-shadow:0 1px 2px #ddd;
    -moz-box-shadow:0 1px 2px #ddd;
    -webkit-box-shadow:0 1px 2px #ddd;
}
.suggestionsBox {
	position: absolute;
	left: 10px;
	margin: 0;
	width: 268px;
	top: 40px;
	padding:0px;
	background-color: #000;
	color: #fff;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.suggestionList ul li {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList ul li:hover {
	background-color: #FC3;
	color:#000;
}
ul {
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#FFF;
	padding:0;
	margin:0;
}

.load{
background-image:url(loader.gif);
background-position:right;
background-repeat:no-repeat;
}

#suggest {
	position:relative;
}
.combopopup{
	padding:3px;
	width:268px;
	border:1px #CCC solid;
}

</style>	
</head>
<body onLoad="document.getElementById('country').focus();">
<form action="savesales.php" method="post">
<div id="ac">
<center><h4><i class="icon icon-money icon-large"></i> Payment Options</h4></center><hr>
<center>
      <div class="suggestionsBox" id="suggestions" style="display: none;">
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div>

<b>Select a payment option</b>
<br><br>



<script>

function mpesaf($i){
	var e=document.getElementById("transaction");
	
	if ($i==='MPesa'){
		document.getElementById("mpesadiv").style.display = "block";
		document.getElementById("cashdiv").style.display='none';
	}
	else{
		document.getElementById("mpesadiv").style.display='none';
		document.getElementById("cashdiv").style.display='block';
	}
	}
</script>

<form value="checkout.php?" method="get">
<select onChange="mpesaf(value)" id='transaction'>
	<option value="Cash">Cash</option>
	<option value="MPesa">Mpesa</option>
</select>

<div id='mpesadiv' style="display: none;">
<b>Mpesa Transaction ID</b><br>

<input type='text' name='transID' placeholder='transaction ID'/><br><br>
</div>	
<div id="cashdiv" style="display: none">
<b>Cash Transaction</b><br>
<input type="number" name="cash" placeholder="Cash" style="width: 268px; height:30px;  margin-bottom: 15px;"  required/><br>
</div>
<a rel="facebox" href="payment.php?pt=<?php echo $_GET['pt']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php $_GET['total'] ?>&totalprof=<?php $_GET['totalprof'] ?>&cashier=<?php $_GET['cashier']?>"><button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i>CONTINUE</button>

</a>


</center>
</div>
</form>
<script>
	function mpesa(){
		var e=document.getElementById('transaction');
		if (e.options[e.selectedIndex].value.text==='MPesa'){
			document.getElementById("mpesa").innerHTML = "<b>Mpesa Transaction ID</b><br><input type='text' name='transID' placeholder='transaction ID'/><br><br>";
			
		}
		}
</script>

</body>
</html>