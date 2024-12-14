<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Tracker</title>
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
                <form>
                    <label for="transaction-name">Transaction Name:</label>
                    <input type="text" class="input-box" id="transaction-name" name="transaction-name" placeholder="Enter transaction name">

                    <label for="category">Transaction Category:</label>
                    <select id="category" class="input-box" name="category">
                        <option value="income">Income</option>
                        <option value="expense">Expense</option>
                        <option value="savings">Savings</option>
                    </select>

                    <label for="amount">Amount:</label>
                    <input type="text" class="input-box" id="amount" name="amount" placeholder="Enter amount">

                    <label for="description">Description:</label>
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
                            <h3>Total<br>Income</h3>
                            <p>P5,000</p>
                        </div>
                        <div class="card expenses">
                            <h3>Total Expenses</h3>
                            <p>P3,200</p>
                        </div>
                        <div class="card balance">
                            <h3>Total Balance</h3>
                            <p>P1,800</p>
                        </div>
                    </div>

                    <!-- Transaction History -->
                    <div class="right-container">
                        <h2>Transaction History</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2024-12-01</td>
                                    <td>Office Supplies</td>
                                    <td>P120.00</td>
                                </tr>
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
