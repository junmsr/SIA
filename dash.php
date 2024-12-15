<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['transaction-name'])) {
    $transactionName = $_POST['transaction-name'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    // Validate required fields
    if (!empty($transactionName) && !empty($category) && !empty($amount)) {
        $file = 'transactions.txt';
        $entry = "$transactionName,$category,$amount,$description\n";

        // Save entry to file
        file_put_contents($file, $entry, FILE_APPEND);
        echo "<script>alert('Transaction saved successfully!');</script>";
    } else {
        echo "<script>alert('Please fill in all required fields.');</script>";
    }
}

// File to store transactions
$file = 'transactions.txt';

// Initialize summary variables
$totalIncome = 0;
$totalExpense = 0;
$totalSavings = 0;
$transactionHistory = [];

// Read and process transactions if the file exists
if (file_exists($file)) {
    $transactions = file($file, FILE_IGNORE_NEW_LINES);
    foreach ($transactions as $transaction) {
        list($name, $category, $amount, $description) = explode(',', $transaction);

        // Calculate totals based on category
        $amount = floatval($amount);
        if ($category === 'income') {
            $totalIncome += $amount;
        } elseif ($category === 'expense') {
            $totalExpense += $amount;
        } elseif ($category === 'savings') {
            $totalSavings += $amount;
        }

        // Add to transaction history
        $transactionHistory[] = [
            'name' => $name,
            'category' => ucfirst($category),
            'amount' => number_format($amount, 2),
            'description' => $description,
        ];
    }
}

// Calculate balance
$totalBalance = $totalIncome - $totalExpense;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dash.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar Navigation -->
        <nav class="navbar">
            <ul>
                <li><a href="#transaction-entry" onclick="showPanel('transaction-entry')">Transaction Entry</a></li>
                <li><a href="#summary-history" onclick="showPanel('summary-history')">Summary & History</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-wrapper">
            <!-- Transaction Entry Panel -->
            <div id="transaction-entry" class="panel">
                <h2>Transaction Entry</h2>
                <form method="POST">
                    <label for="transaction-name">Transaction Name:</label>
                    <input type="text" class="input-box" id="transaction-name" name="transaction-name" placeholder="Enter transaction name" required>

                    <label for="category">Transaction Category:</label>
                    <select id="category" class="input-box" name="category" required>
                        <option value="income">Income</option>
                        <option value="expense">Expense</option>
                        <option value="savings">Savings</option>
                    </select>

                    <label for="amount">Amount:</label>
                    <input type="number" step="0.01" class="input-box" id="amount" name="amount" placeholder="Enter amount" required>

                    <label for="description">Description (Optional):</label>
                    <textarea id="description" class="input-box" name="description" placeholder="Enter details"></textarea>

                    <input type="submit" value="Submit">
                </form>
            </div>

            <!-- Summary and History Panel -->
            <div id="summary-history" class="panel" style="display: none;">
                <div class="summary-history-panel">
                    <!-- Financial Summary -->
                    <div class="left-container">
                        <h2>Financial Summary</h2>
                        <div class="card income">
                            <h3>Total Income</h3>
                            <p>P<?php echo number_format($totalIncome, 2); ?></p>
                        </div>
                        <div class="card expenses">
                            <h3>Total Expenses</h3>
                            <p>P<?php echo number_format($totalExpense, 2); ?></p>
                        </div>
                        <div class="card balance">
                            <h3>Total Balance</h3>
                            <p>P<?php echo number_format($totalBalance, 2); ?></p>
                        </div>
                    </div>

                    <!-- Transaction History -->
                    <div class="right-container">
                        <h2>Transaction History</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Transaction Name</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transactionHistory as $entry): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($entry['name']); ?></td>
                                    <td><?php echo htmlspecialchars($entry['category']); ?></td>
                                    <td>P<?php echo $entry['amount']; ?></td>
                                    <td><?php echo htmlspecialchars($entry['description']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function showPanel(panelId) {
            // Hide all panels
            document.querySelectorAll('.panel').forEach(panel => {
                panel.style.display = 'none';
            });

            // Show the selected panel
            document.getElementById(panelId).style.display = 'block';
        }
    </script>
</body>
</html>
