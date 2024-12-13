<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Tracker</title>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="dash.css"></link>
    
</head>
<body>
    <div class="main-wrapper">
        <div class="left-container">
            <h2>Financial Summary</h2>
            <div class="card income">
                <h3>Total Income</h3>
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

        <div class="right-container">
            <h2>Transaction Entry</h2>
            <form>
                <label for="transaction-name">Transaction Name:</label>
                <input type="text" id="transaction-name" name="transaction-name" placeholder="Enter transaction name">

                <label for="category">Transaction Category:</label>
                <select id="category" name="category">
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                    <option value="savings">Savings</option>
                </select>

                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Enter details"></textarea>

                <label for="amount">Amount:</label>
                <input type="text" id="amount" name="amount" placeholder="Enter amount">

                <input type="submit" value="Submit">
            </form>
        </div>

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
                        <td>$120.00</td>
                    </tr>
                    <tr>
                        <td>2024-12-02</td>
                        <td>Travel Expenses</td>
                        <td>$300.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
