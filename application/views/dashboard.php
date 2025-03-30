<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>">Loan Management</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('loan/apply_form'); ?>">Apply for Loan</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2>Welcome, <?php echo $this->session->userdata('name'); ?>!</h2>
    <p>Below is the list of your applied loans.</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Loan Amount</th>
                <th>Tenure (Months)</th>
                <th>Purpose</th>
                <th>Status</th>
                <th>Applied On</th>
                <th>Repayment</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($loans)) : ?>
                <?php foreach ($loans as $loan) : ?>
						<tr>
							<td><?php echo $loan['id']; ?></td>
							<td><?php echo $loan['amount']; ?></td>
							<td><?php echo $loan['tenure']; ?> months</td>
							<td>
								<?php if ($loan['status'] == 'pending') { ?>
									<span class="badge bg-warning">Pending</span>
								<?php } elseif ($loan['status'] == 'approved') { ?>
									<span class="badge bg-success">Approved</span>
								<?php } else { ?>
									<span class="badge bg-danger">Rejected</span>
								<?php } ?>
							</td>
							<td><?php echo date('d M Y', strtotime($loan['created_at'])); ?></td>
							<td>
								<?php if ($loan['status'] == 'approved') { ?>
									<a href="<?php echo base_url('repayment/make_payment/' . $loan['id']); ?>" class="btn btn-success">Repay Loan</a>
									<a href="<?php echo base_url('repayment/repayment_history/' . $loan['id']); ?>" class="btn btn-info">View Repayments</a>
								<?php } ?>
							</td>
						</tr>

                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">No loan applications found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="<?php echo base_url('loan/apply_form'); ?>" class="btn btn-primary">Apply for Loan</a>
</div>

</body>
</html>
