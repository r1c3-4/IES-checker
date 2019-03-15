<?php
include'../header.php';
?>
</header><title>CCN Checker - IES Tools</title>
<div class="rightside">
<div class="page-head">
<h1><i class="fa fa-flag"></i> CCN Checker</h1>
</div>
<div class="content">
<div class="row">
<div class="col-xs-12">
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<b>Note: </b>Support Visa, Amex and Master Card. Random Charge. [Stripe] - Use Your Private API KEY.</div>
<div class="box">
<div class="box-title">
<h3><i class="fa fa-credit-card"></i>
CCN Checker</h3>
</div>
<div class="box-body box-body-nopadding">
<div class="row">
<div class="col-xs-7">
<div class="form-group">
</ul>
</div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/check.js"></script>
	<script type="text/javascript">
		function selectText(containerid) {
		if (document.selection) {
			var range = document.body.createTextRange();
			range.moveToElementText(document.getElementById(containerid));
			range.select();
			} else if (window.getSelection()) {
				var range = document.createRange();
				range.selectNode(document.getElementById(containerid));
				window.getSelection().removeAllRanges();
				window.getSelection().addRange(range);
			}
		}
	</script>
</div>
</div>

<div class="panel-heading">
<i class="icon-list-ul"></i>
<div class="panel-body">
<form action="" method="post" class='form-vertical'>
<div class="col-lg-6">
<label for="mailpass" class="control-label">Resource:</label>
<textarea name="mailpass" id="mailpass" class="form-control" rows="7" placeholder="530127xxxxx|07|14|382"></textarea>
</div>
<div class="col-lg-4">
<label>Status Check:</label>
<p><font color=green><b>Live</b></font> : This Card Is Live or Approve In My Merchant.</p>
<p><font color=red><b>Die</b></font> : This Card Is Die or Declined In My Merchant. But CVV Is Correct.<p>
<p><font color=purple><b>Unknown</b></font> : This Card Is Unknown[Wrong Format] or Declined Because CVV Is Incorrect.</p>
<p><input name="apikey" id="apikey" style="text-align: center;display:inline;width: 300px;margin-right: 8px;padding: 4px;" placeholder="Paste apikey in here!!" type="text" class="form-control"></p>
<p><input name="apikey" id="apikey" style="text-align: center;display: none;width: 300px;margin-right: 8px;padding: 4px;" placeholder="Paste apikey in here!!" type="text" class="form-control"></p>
<button type="button" class="btn btn-success" id="submit">Submit</button>
<button type="button" class="btn btn-danger" id="stop">Stop</button> &nbsp; <span id="checkStatus"> </span>
</form>
</div>
</div>
</div>
<div id="result">
<div class="panel panel-default"><div class="panel-heading">
<i class="icon-list-ul"></i>
<span>LIVE </span><span class="label label-success" id="acc_live_count">0</span>
</div><div class="panel-body" id="acc_live"></div></div>
<div class="panel panel-default"><div class="panel-heading">
<i class="icon-list-ul"></i>
<span>DIE</span><span class="label label-danger" id="acc_die_count">0</span></div><div class="panel-body" id="acc_die"></div></div>
<div class="panel panel-default"><div class="panel-heading">
<i class="icon-list-ul"></i>
<span>Wrong Format</span><span class="label label-default" id="wrong_count">0</span></div><div class="panel-body" id="wrong"></div></div>
</div>
</div>
</div>
<script type='text/javascript'>
$(window).on('beforeunload', function(e){
		return "Please save your data before leaving.";
	});
</script>
<?php include'../bawah.php'; ?>
