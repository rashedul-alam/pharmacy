<html>
	<head>
		<title>Welcome Email</title>
	</head>
	<body>
		<table>
			<tr><td>Dear <?php echo e($name); ?>!</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Your account has been successfully activated.</td></tr>
			<tr><td>&nbsp;</td></tr>	
			<tr><td>Your account information is as below:</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Email: <?php echo e($email); ?></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Password: ***** (as chosen by you)</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Thanks & Regards,</td></tr>
			<tr><td>E-com website</td></tr>
	</body>
</html><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/emails/welcome.blade.php ENDPATH**/ ?>