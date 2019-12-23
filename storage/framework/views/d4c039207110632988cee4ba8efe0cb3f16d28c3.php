<html>
	<head>
		<title>Register Email</title>
	</head>
	<body>
		<table>
			<tr><td>Dear <?php echo e($name); ?>!</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Please click on below link to activate your account:</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td><a href="<?php echo e(url('confirm/'.$code)); ?>">Confirm Account</a></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Thanks & Regards,</td></tr>
			<tr><td>E-com website</td></tr>
	</body>
</html><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/emails/confirmation.blade.php ENDPATH**/ ?>