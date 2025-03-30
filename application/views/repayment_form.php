<!DOCTYPE html>
<html lang="en">
<head>
    <title>Make a Repayment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Make a Loan Repayment</h2>
    <form method="post" action="<?php echo base_url('repayment/payment/' . $loan_id); ?>">
        <div class="mb-3">
            <label class="form-label">Repayment Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Make Payment</button>
    </form>
</div>
</body>
</html>
