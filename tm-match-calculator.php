<html>

<head>

<style>

<!-- Insert your custom inline CSS code here -->

table.redTable {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #EEE7DB;
  text-align: center;
  border-collapse: collapse;
}
table.redTable td, table.redTable th {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 15px;
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.redTable tbody td {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 13px;
}
table.redTable tr:nth-child(even) {
  background: #F5C8BF;
}
table.redTable thead {
  background: #A40808;
}
table.redTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  text-align: center;
  border-left: 2px solid #A40808;
}
table.redTable thead th:first-child {
  border-left: none;
}

table.redTable tfoot {
  font-size: 13px;
  font-weight: bold;
  color: #FFFFFF;
  background: #A40808;
}
table.redTable tfoot td {
  font-size: 13px;
}
table.redTable tfoot .links {
  text-align: right;
}
table.redTable tfoot .links a{
  display: inline-block;
  background: #FFFFFF;
  color: #A40808;
  padding: 2px 8px;
  border-radius: 5px;
}

</style>

</head>

 <body>

<!-- Javascript for setting/resetting rate scheme & word counts -->

<script type="text/javascript">

function defaultFieldsMoneyCharge() {
    document.getElementById("cm").value="0"
    document.getElementById("rep").value="25"
	document.getElementById("cf_rep").value="25"
	document.getElementById("100_match").value="25"
	document.getElementById("95_match").value="50"
	document.getElementById("85_match").value="50"
	document.getElementById("75_match").value="50"
	document.getElementById("50_match").value="100"
	document.getElementById("no_match").value="100"
}

function clearFieldsMoneyCharge() {
    document.getElementById("cm").value=""
    document.getElementById("rep").value=""
	document.getElementById("cf_rep").value=""
	document.getElementById("100_match").value=""
	document.getElementById("95_match").value=""
	document.getElementById("85_match").value=""
	document.getElementById("75_match").value=""
	document.getElementById("50_match").value=""
	document.getElementById("no_match").value=""
}

function clearFieldsWC() {
    document.getElementById("wc_cm").value=""
    document.getElementById("wc_rep").value=""
	document.getElementById("wc_cf_rep").value=""
	document.getElementById("wc_100_match").value=""
	document.getElementById("wc_95_match").value=""
	document.getElementById("wc_85_match").value=""
	document.getElementById("wc_75_match").value=""
	document.getElementById("wc_50_match").value=""
	document.getElementById("wc_no_match").value=""
}

</script>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

<!-- Define php variables -->

<?php

 $wwc_cm = 0;
 $wwc_rep = 0;
 $wwc_cf_rep = 0;
 $wwc_100_match = 0;
 $wwc_95_match = 0;
 $wwc_85_match = 0;
 $wwc_75_match = 0;
 $wwc_50_match = 0;
 $wwc_no_match = 0;

 $pay_cm = 0;
 $pay_rep = 0;
 $pay_cf_rep = 0;
 $pay_100_match = 0;
 $pay_95_match = 0;
 $pay_85_match = 0;
 $pay_75_match = 0;
 $pay_50_match = 0;
 $pay_no_match= 0;

?>

<!-- Set up a table with 16 rows x 5 columns -->

<!-- Set your CSS class here -->

 <table class="redTable">

 <tr>
 <td colspan="2">Word Rate & Currency:</td>
 <td><input type="number" step="0.001" name="word_rate" value="<?php echo isset($_POST['word_rate']) ? $_POST['word_rate'] : '0' ?>"></td>
 <td><input type="text" name="currency" value="<?php echo isset($_POST['currency']) ? $_POST['currency'] : 'USD' ?>"></td>
 </tr>

 <tr>
 <td colspan="5">&nbsp;</td>
 </tr>

 <tr>
 <th>Match Category</th>
 <th>Rate Scheme (%)</br><input type="button" onclick="clearFieldsMoneyCharge()" value="Clear">&nbsp;&nbsp;<input type="button" onclick="defaultFieldsMoneyCharge()" value="Default"></th>
 <th>Word Count</br><input type="button" onclick="clearFieldsWC()" value="Clear"></th>
 <th>Weighted Word Count</th>
 <th>Payment <?php echo '(', isset($_POST['currency']) ? $_POST['currency'] : 'USD', ')'; ?></th>
 </tr>

 <tr>
 <td>Context (CM)</td>
 <td><input type="number" id="cm" name="cm" value="<?php echo isset($_POST['cm']) ? $_POST['cm'] : '0' ?>"></td>
 <td><input type="number" id="wc_cm" name="wc_cm" value="<?php echo isset($_POST['wc_cm']) ? $_POST['wc_cm'] : '' ?>"></td>
 <td><b><?php if(isset($_POST['cm']) && isset($_POST['wc_cm'])) { $wwc_cm = ((($_POST['cm']) / 100) * ($_POST['wc_cm'])); echo number_format($wwc_cm, 2); } ?></b></td>
 <td><b><?php if(isset($_POST['cm']) && isset($_POST['word_rate'])) { $pay_cm = ((($_POST['cm']) / 100) * ($_POST['word_rate']) * ($_POST['wc_cm'])); echo number_format($pay_cm, 2); } ?></b></td>
 </tr>

 <tr>
 <td>Repetitions</td>
 <td><input type="number" id="rep" name="rep" value="<?php echo isset($_POST['rep']) ? $_POST['rep'] : '25' ?>"></td>
 <td><input type="number" id="wc_rep" name="wc_rep" value="<?php echo isset($_POST['wc_rep']) ? $_POST['wc_rep'] : '' ?>"></td>
 <td><b><?php if(isset($_POST['rep']) && isset($_POST['wc_rep'])) { $wwc_rep = ((($_POST['rep']) / 100) * ($_POST['wc_rep'])); echo number_format($wwc_rep, 2); } ?></b></td>
 <td><b><?php if(isset($_POST['rep']) && isset($_POST['word_rate'])) { $pay_rep = ((($_POST['rep']) / 100) * ($_POST['word_rate']) * ($_POST['wc_rep'])); echo number_format($pay_rep, 2); } ?></b></td>
 </tr>

 <tr>
 <td>Cross&nbsp;File&nbsp;Reps</td>
 <td><input type="number" id="cf_rep" name="cf_rep" value="<?php echo isset($_POST['cf_rep']) ? $_POST['cf_rep'] : '25' ?>"></td>
 <td><input type="number" id="wc_cf_rep" name="wc_cf_rep" value="<?php echo isset($_POST['wc_cf_rep']) ? $_POST['wc_cf_rep'] : '' ?>"></td>
 <td><b><?php if(isset($_POST['cf_rep']) && isset($_POST['wc_cf_rep'])) { $wwc_cf_rep = ((($_POST['cf_rep']) / 100) * ($_POST['wc_cf_rep'])); echo number_format($wwc_cf_rep, 2); } ?></b></td>
 <td><b><?php if(isset($_POST['cf_rep']) && isset($_POST['word_rate'])) { $pay_cf_rep = ((($_POST['cf_rep']) / 100) * ($_POST['word_rate']) * ($_POST['wc_cf_rep'])); echo number_format($pay_cf_rep, 2); } ?></b></td>
 </tr>

 <tr>
 <td>100%</td>
 <td><input type="number" id="100_match" name="100_match" value="<?php echo isset($_POST['100_match']) ? $_POST['100_match'] : '25' ?>"></td>
 <td><input type="number" id="wc_100_match" name="wc_100_match" value="<?php echo isset($_POST['wc_100_match']) ? $_POST['wc_100_match'] : '' ?>"></td>
 <td><b><?php if(isset($_POST['100_match']) && isset($_POST['wc_100_match'])) { $wwc_100_match = ((($_POST['100_match']) / 100) * ($_POST['wc_100_match'])); echo number_format($wwc_100_match, 2); } ?></b></td>
 <td><b><?php if(isset($_POST['100_match']) && isset($_POST['word_rate'])) { $pay_100_match = ((($_POST['100_match']) / 100) * ($_POST['word_rate']) * ($_POST['wc_100_match'])); echo number_format($pay_100_match, 2); } ?></b></td>
 </tr>

 <tr>
 <td>95% - 99%</td>
 <td><input type="number" id="95_match" name="95_match" value="<?php echo isset($_POST['95_match']) ? $_POST['95_match'] : '50' ?>"></td>
 <td><input type="number" id="wc_95_match" name="wc_95_match" value="<?php echo isset($_POST['wc_95_match']) ? $_POST['wc_95_match'] : '' ?>"></td>
 <td><b><?php if(isset($_POST['95_match']) && isset($_POST['wc_95_match'])) { $wwc_95_match = ((($_POST['95_match']) / 100) * ($_POST['wc_95_match'])); echo number_format($wwc_95_match, 2); } ?></b></td>
 <td><b><?php if(isset($_POST['95_match']) && isset($_POST['word_rate'])) { $pay_95_match = ((($_POST['95_match']) / 100) * ($_POST['word_rate']) * ($_POST['wc_95_match'])); echo number_format($pay_95_match, 2); } ?></b></td>
 </tr>

 <tr>
 <td>85% - 94%</td>
 <td><input type="number" id="85_match" name="85_match" value="<?php echo isset($_POST['85_match']) ? $_POST['85_match'] : '50' ?>"></td>
 <td><input type="number" id="wc_85_match" name="wc_85_match" value="<?php echo isset($_POST['wc_85_match']) ? $_POST['wc_85_match'] : '' ?>"></td>
 <td><b><?php if(isset($_POST['85_match']) && isset($_POST['wc_85_match'])) { $wwc_85_match = ((($_POST['85_match']) / 100) * ($_POST['wc_85_match'])); echo number_format($wwc_85_match, 2); } ?></b></td>
 <td><b><?php if(isset($_POST['85_match']) && isset($_POST['word_rate'])) { $pay_85_match = ((($_POST['85_match']) / 100) * ($_POST['word_rate']) * ($_POST['wc_85_match'])); echo number_format($pay_85_match, 2); } ?></b></td>
 </tr>

 <tr>
 <td>75% - 84%</td>
 <td><input type="number" id="75_match" name="75_match" value="<?php echo isset($_POST['75_match']) ? $_POST['75_match'] : '50' ?>"></td>
 <td><input type="number" id="wc_75_match" name="wc_75_match" value="<?php echo isset($_POST['wc_75_match']) ? $_POST['wc_75_match'] : '' ?>"></td>
 <td><b><?php if(isset($_POST['75_match']) && isset($_POST['wc_75_match'])) { $wwc_75_match = ((($_POST['75_match']) / 100) * ($_POST['wc_75_match'])); echo number_format($wwc_75_match, 2); } ?></b></td>
 <td><b><?php if(isset($_POST['75_match']) && isset($_POST['word_rate'])) { $pay_75_match = ((($_POST['75_match']) / 100) * ($_POST['word_rate']) * ($_POST['wc_75_match'])); echo number_format($pay_75_match, 2); } ?></b></td>
 </tr>

 <tr>
 <td>50% - 74%</td>
 <td><input type="number" id="50_match" name="50_match" value="<?php echo isset($_POST['50_match']) ? $_POST['50_match'] : '100' ?>"></td>
 <td><input type="number" id="wc_50_match" name="wc_50_match" value="<?php echo isset($_POST['wc_50_match']) ? $_POST['wc_50_match'] : '' ?>"></td>
 <td><b><?php if(isset($_POST['50_match']) && isset($_POST['wc_50_match'])) { $wwc_50_match = ((($_POST['50_match']) / 100) * ($_POST['wc_50_match'])); echo number_format($wwc_50_match, 2); } ?></b></td>
 <td><b><?php if(isset($_POST['50_match']) && isset($_POST['word_rate']))  { $pay_50_match = ((($_POST['50_match']) / 100) * ($_POST['word_rate']) * ($_POST['wc_50_match'])); echo number_format($pay_50_match, 2); } ?></b></td>
 </tr>

 <tr>
 <td>New</td>
 <td><input type="number" id="no_match" name="no_match" value="<?php echo isset($_POST['no_match']) ? $_POST['no_match'] : '100' ?>"></td>
 <td><input type="number" id="wc_no_match" name="wc_no_match" id="wc_no_match" value="<?php echo isset($_POST['wc_no_match']) ? $_POST['wc_no_match'] : '' ?>"></td>
 <td><b><?php if(isset($_POST['no_match']) && isset($_POST['wc_no_match'])) { $wwc_no_match = ((($_POST['no_match']) / 100) * ($_POST['wc_no_match'])); echo number_format($wwc_no_match, 2); } ?></b></td>
 <td><b><?php if(isset($_POST['no_match']) && isset($_POST['word_rate'])) { $pay_no_match = ((($_POST['no_match']) / 100) * ($_POST['word_rate']) * ($_POST['wc_no_match'])); echo number_format($pay_no_match, 2); } ?></b></td>
 </tr>

 <tr>
 <td colspan="6">&nbsp;</td>
 </tr>


 <tr>
 <td><b>Totals</b></td>
 <td>&nbsp;</td>
 <td><b><?php if(isset($_POST['wc_cm']) && isset($_POST['wc_rep']) && isset($_POST['wc_cf_rep']) && isset($_POST['wc_100_match']) && isset($_POST['wc_95_match']) && isset($_POST['wc_85_match']) && isset($_POST['wc_75_match']) && isset($_POST['wc_50_match']) && isset($_POST['wc_no_match'])) { $wc_total = $_POST['wc_cm'] + $_POST['wc_rep'] + $_POST['wc_cf_rep'] + $_POST['wc_100_match'] + $_POST['wc_95_match'] + $_POST['wc_85_match'] + $_POST['wc_75_match'] + $_POST['wc_50_match'] + $_POST['wc_no_match']; echo number_format($wc_total, 0); } ?></b></td>
 <td><b><?php $wwc_total = $wwc_cm + $wwc_rep + $wwc_cf_rep + $wwc_100_match + $wwc_95_match + $wwc_85_match + $wwc_75_match + $wwc_50_match + $wwc_no_match; echo number_format($wwc_total, 2); ?></b></td>
 <td><b><?php $pay_total = $pay_cm + $pay_rep + $pay_cf_rep + $pay_100_match + $pay_95_match + $pay_85_match + $pay_75_match + $pay_50_match + $pay_no_match; echo number_format($pay_total, 2); ?></b></td>
 </tr>

 <tr>
 <td colspan="6">&nbsp;</td>
 </tr>

 <!-- Submit -->
 <tr>
 <td colspan="6" align="center"><input type="submit" name="calculate" value="Calculate"></td>
 </tr>

 </form>

  </table>

 </body>
 </html>
