<!DOCTYPE html>
    <html>
      <head>
        <title>Net Pay</title>
      </head>
      <body>
        <?php
          //create names to get the information
            $employeeName = $_POST['employeeName'];
            $payRate = $_POST['payRate'];
            $hoursWorked = $_POST['hoursWorked'];
         
            echo '<p>Net Pay:</p>';
            echo 'Employee Name: '.htmlspecialchars($employeeName).'<br>';
            echo 'Rate: ' .htmlspecialchars($payRate).'<br>';
            echo 'Hours Worked: ' .htmlspecialchars($hoursWorked).' Hours <br>'; 

            $grossIncome = ($hoursWorked * $payRate * 52);
            $socialSecurity = 0.062;  
            $medicare = 0.0145;
            $federal_Tax = 0.00;
            $state_taxes = 0.00; 

            function payrollCal() {
             
            if ($hoursWorked > 40)
            {
              $grossPay = ($hoursWorked  * 2) * $payRate;
              $overtime = ($payRate * $hoursWorked) + ($payRate * 1.5); 
            }
            else 
            {
              $grossPay = ($hoursWorked * 2) * $payRate; 
            }

            if ($grossIncome < 9525)
                {($federal_Tax = 0.10 * $grossPay)/100; }
            else if ($grossIncome > 9525 && $grossIncome < 38700)
                {($federal_Tax = 0.12 * $grossPay)/100; }
            else if ($grossIncome > 38700 && $grossIncome < 82500)
               {($federal_Tax = 0.22 * $grossPay)/100; }
            else
             { ($federal_Tax = 0.24 * $grossPay)/100 ;}


          if ($grossIncome < 10000)
               {($state_taxes = 0.03 * $grossPay)/100;}
          else if ($grossIncome > 10000 && $grossIncome < 25000)
              {($state_taxes = 0.04 * $grossPay)/100;}
          else 
              {($state_taxes = 0.05 * $grossPay)/100;}
           
          }
          $net = $grossPay - $federal_Tax - $state_taxes - $socialSecurity - $medicare; 


          echo "<p>Payroll<p>".'<br>';
          echo "Federal Taxes:" .$federal_Tax.'<br>';


        ?>
      </body>
    </html>