<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Loan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>">Loan Management</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Apply for Loan</h2>

            <!-- Flash Messages -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
            <?php endif; ?>

            <form method="post" action="<?php echo base_url('loan/apply'); ?>">
                <div class="mb-3">
                    <label for="amount" class="form-label">Loan Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Loan Amount" required>
                </div>
                <div class="mb-3">
                    <label for="tenure" class="form-label">Tenure (Months)</label>
                    <input type="number" class="form-control" id="tenure" name="tenure" placeholder="Enter Tenure in Months" required>
                </div>
                <div class="mb-3">
                    <label for="purpose" class="form-label">Purpose</label>
                    <input type="text" class="form-control" id="purpose" name="purpose" placeholder="Enter Loan Purpose" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Apply for Loan</button>
            </form>

            <p class="mt-3 text-center"><a href="<?php echo base_url('dashboard'); ?>">Back to Dashboard</a></p>
        </div>
    </div>
</div>

</body>
</html>
