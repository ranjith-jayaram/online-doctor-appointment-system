<?php
session_start();
if($_SESSION["patient_id"]){
	echo $_SESSION["patient_id"];
}
?>
<HTML>
<HEAD>
<TITLE>
Patient
</TITLE>
</HEAD>
<body bgcolor="lavender">
<br><br>
<font size="26" color="black">SIMS HOSPITAL</FONT>
<br><br><br>
<FORM NAME="patient" METHOD="POST" ACTION="patient_signup.html">
<CENTER><INPUT TYPE="SUBMIT" VALUE="Sign up"><BR><BR></CENTER><BR><BR>
</FORM>
<FORM NAME="doctor" METHOD="POST" ACTION="patient_signin.html">
<CENTER><INPUT TYPE="SUBMIT" VALUE="Sign in"><BR><BR></CENTER><BR><BR>
</FORM>
</body>
</html>