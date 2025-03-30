<!DOCTYPE html>
<html lang="en">
<head>
    <title>Repayment History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2>Repayment History</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Loan ID</th>
                <th>Amount Paid</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($repayments as $repayment) { ?>
                <tr>
                    <td><?php echo $repayment['id']; ?></td>
                    <td><?php echo $repayment['loan_id']; ?></td>
                    <td><?php echo $repayment['amount']; ?></td>
                    <td><?php echo $repayment['payment_date']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-primary">Back to Dashboard</a>

</body>
</html>
