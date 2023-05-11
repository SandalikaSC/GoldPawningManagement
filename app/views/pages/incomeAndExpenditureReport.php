<!DOCTYPE html>
<html lang="en">
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/Img/logo.png">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/incomeAndExpenditureReport.css">

</head>

<body>

    <div class="page">
        <div class="right">
            <div class="right-heading">
                <div class="right-side">
                    <div class="bars" id="bars">
                        <a href="<?php if (substr($_SESSION['user_id'], 0, 2) === 'OW') {
                                        echo URLROOT . '/ownerDashboard';
                                    } else if (substr($_SESSION['user_id'], 0, 2) === 'MG') {
                                        echo URLROOT . '/mgDashboard';
                                    } ?>" class="backbtn"><img src="<?php echo URLROOT ?>/img/backbutton.png" alt="back"></a>
                    </div>
                    <h1>Income And Expenditure Report <?php echo $data ?>
                    </h1>

                </div>

                <button id="generate-pdf">Download PDF</button>

                <img class="vogue" src="<?php echo URLROOT ?>/img/FULLlogo.png" alt="logo">

            </div>
            <div class="inside-page">
                <div id="element-to-print">
                    <h1 id="report-topic">Income And Expenditure Report <?php echo $data ?></h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Income</th>
                                <th>Expenditure</th>
                                <th>Profit</th>
                                <th>Loss</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Total</td>
                                <td id="total-income"></td>
                                <td id="total-expenditure"></td>
                                <td id="total-profit"></td>
                                <td id="total-loss"></td>
                            </tr>
                        </tfoot>
                    </table>

                </div>


            </div>
        </div>

    </div>


    <script>
        const income = JSON.parse(localStorage.getItem('amountsIncome'));
        const expenditure = JSON.parse(localStorage.getItem('amountsExpen'));

        // Calculate profit and loss for each month
        const profitLoss = income.map((val, i) => {
            const diff = val - expenditure[i];
            if (diff < 0) {
                return {
                    profit: 0,
                    loss: -diff
                };
            } else {
                return {
                    profit: diff,
                    loss: 0
                };
            }
        });

        // console.log(diff);

        // Get the table body and footer elements
        const tbody = document.getElementById('table-body');
        const totalIncomeCell = document.getElementById('total-income');
        const totalExpenditureCell = document.getElementById('total-expenditure');
        const totalProfitCell = document.getElementById('total-profit');
        const totalLossCell = document.getElementById('total-loss');

        // Loop through the data and generate table rows
        for (let i = 0; i < income.length; i++) {
            const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "Octomber", "November", "December"][i];
            const incomeCell = `<td>Rs.${income[i].toFixed(2)}</td>`;
            const expenditureCell = `<td>Rs.${expenditure[i].toFixed(2)}</td>`;
            const profitCell = `<td>Rs.${profitLoss[i].profit.toFixed(2)}</td>`;
            const lossCell = `<td>Rs.${profitLoss[i].loss.toFixed(2)}</td>`;

            // Calculate total values
            const totalIncome = income.reduce((a, b) => a + b, 0);
            const totalExpenditure = expenditure.reduce((a, b) => a + b, 0);
            const totalProfit = profitLoss.reduce((a, b) => a + b.profit, 0);
            const totalLoss = profitLoss.reduce((a, b) => a + b.loss, 0);

            // Create table row and append it to the table body
            const row = document.createElement('tr');
            row.innerHTML = `<td>${month}</td>${incomeCell}${expenditureCell}${profitCell}${lossCell}`;
            tbody.appendChild(row);

            // Update total values in the table footer
            totalIncomeCell.innerText = `Rs.${totalIncome.toFixed(2)}`;
            totalExpenditureCell.innerText = `Rs.${totalExpenditure.toFixed(2)}`;
            totalProfitCell.innerText = `Rs.${totalProfit.toFixed(2)}`;
            totalLossCell.innerText = `Rs.${totalLoss.toFixed(2)}`;
        }
    </script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var element = document.getElementById('element-to-print');
        var opt = {
            margin: 1,
            filename: 'IncomeAndExpenditure.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        };


        const generatePdfButton = document.getElementById('generate-pdf');
        generatePdfButton.addEventListener('click', () => {

            document.getElementById('report-topic').style.display = "block";
            // New Promise-based usage:
            html2pdf().set(opt).from(element).save();

            // Old monolithic-style usage:
            html2pdf(element, opt);

        });
    </script>
</body>

</html>