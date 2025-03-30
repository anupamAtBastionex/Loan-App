<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Loan Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="<?php echo base_url('admin'); ?>">Admin Panel</a>
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('admin'); ?>">Loan Requests</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('admin/repayments'); ?>">Repayments</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-danger" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
				</li>
			</ul>
		</div>
    </div>
</nav>

<div class="container mt-4">
    <h2>Repayment History</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Loan ID</th>
                <th>User</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($repayments as $repayment) { ?>
                <tr>
                    <td><?php echo $repayment['loan_id']; ?></td>
                    <td><?php echo $repayment['username']; ?></td>
                    <td><?php echo $repayment['amount']; ?></td>
                    <td><?php echo $repayment['payment_date']; ?></td>
                    <td><?php echo $repayment['status']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>

