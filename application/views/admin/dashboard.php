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


<div class="container mt-5">
    <h2>Loan Applications</h2>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Loan Amount</th>
                <th>Tenure (Months)</th>
                <th>Purpose</th>
                <th>Status</th>
                <th>Applied On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($loans)) : ?>
                <?php foreach ($loans as $loan) : ?>
                    <tr>
                        <td><?php echo $loan['user_id']; ?></td>
                        <td><?php echo number_format($loan['amount'], 2); ?></td>
                        <td><?php echo $loan['tenure']; ?></td>
                        <td><?php echo htmlspecialchars($loan['purpose']); ?></td>
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
                            <?php if ($loan['status'] == 'pending') { ?>
                                <a href="<?php echo base_url('admin/approve/' . $loan['id']); ?>" class="btn btn-success btn-sm">Approve</a>
                                <a href="<?php echo base_url('admin/reject/' . $loan['id']); ?>" class="btn btn-danger btn-sm">Reject</a>
                            <?php } else { ?>
                                <span class="text-muted">No Action</span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">No loan applications found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
