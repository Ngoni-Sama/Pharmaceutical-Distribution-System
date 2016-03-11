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

<script>

function mpesaf($i){
	var e=document.getElementById("transaction");
	
	if ($i==='MPesa'){
		document.getElementById("mpesadiv").style.display = "block";
		document.getElementById("cashdiv").style.display='none';
		document.getElementById("cashdiv").style.display='none';
	}
	else{
		document.getElementById("mpesadiv").style.display='none';
		document.getElementById("cashdiv").style.display='block';
	}
	}
	function validatecheckout(){

  var cashElem = document.getElementById("country");
  var cName = cashElem.value;
  if (cName === "") {
   alert("Cashier's name can't be blank");
   return false;
	}
	var total = document.getElementById("amount").value;
	var cash = document.getElementById("cash").value;
	if (cash<total){
		alert("The amount of money provided is not enough");
		return false;
	}
	

	}
</script>
<form action="savesales.php" method="post" onsubmit="return validatecheckout()">
<div id="ac">
<center><h4><i class="icon icon-money icon-large"></i> Cash</h4></center><hr>
<input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<input type="hidden" id="amount" name="amount" value="<?php echo $_GET['total']; ?>" />
<input type="hidden" name="ptype" value="<?php echo $_GET['pt']; ?>" />
<input type="hidden" name="cashier" value="<?php echo $_GET['cashier']; ?>" />
<input type="hidden" name="profit" value="<?php echo $_GET['totalprof']; ?>" />
<center>
<span id='error'></span>
<input type="text" size="25" value="" name="cname" id="country" onKeyUp="suggest(this.value);" onBlur="fill();" class="" autocomplete="off" placeholder="Enter Customer Name" style="width: 268px; height:30px;" />
     
      <div class="suggestionsBox" id="suggestions" style="display: none;">
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div><br>



<b>Select a payment option</b>
<br><br>

<select onChange="mpesaf(value)" id='transaction' style="width: 268px; height:30px;  margin-bottom: 15px;">
	<option value="Cash">Cash</option>
	<option value="MPesa">Mpesa</option>
</select>
<div id='mpesadiv' style="display: none;">
<b>Mpesa Transaction ID</b><br>

<input type='text' name='transID' placeholder='transaction ID' style="width: 268px; height:30px;  margin-bottom: 15px;"/><br><br>
</div>	
<div id="cashdiv" style="display: block">
<b>Cash Transaction</b><br>
</div>

<input id="cash" type="number" name="cash" placeholder="Cash" style="width: 268px; height:30px;  margin-bottom: 15px;" /><br>


<input type='submit' value="Save"class="btn btn-success btn-block btn-large" style="width:267px;">
</center>
</div>
</form>
</body>
</html>