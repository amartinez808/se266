<?php
    abstract class Account {
        protected $accountId, $balance, $startDate;
        
        public function __construct ($id, $b, $sd) {
            $this -> accountId = $id;
            $this -> balance = $b;
            $this -> startDate = $sd;

           // automatically triggered on instantiation //
        }

        public function deposit ($amount) {
            
            $this->balance = $this->balance + $amount;
            
        }

        abstract public function withdrawal($amount);
        // this is an abstract method. This method must be defined in all classes
        // that inherit from this class
        public function getStartDate() {
            return $this ->sd;
            // write code here
        }

        public function getBalance() {
            return $this ->b;
            // write code here
        }

        public function getAccountId() {
            return $this -> id;
            // write code here
        }

        protected function getAccountDetails() {
            $str = "";
            $str .= $this->getAccountId();
            $str .= $this->getBalance();
            $str .= $this->getStartDate();
            // populate $str with the account details
            
            return $str;
        }
    }

//----------------------checking--------------


    class CheckingAccount extends Account {
        const OVERDRAW_LIMIT = -200;

        public function deposit ($amount) {
            // write code here
            if($amount == '')
            {
                echo "<p>Cant deposite an empty value in your checking account.</p>";
            }
        }

        public function withdrawal($amount) {
            if($amount == '')
            {
                echo "<p>Cant withdrawal an empty value from your checking account.</p>";
            }
            else if (($this->balance - $amount) >= self::OVERDRAW_LIMIT){
                
                $this->balance = $this->balance - $amount;

            }
            else{

                echo "<p style='color:red;'>[CHECKING ACCOUNT]</p>
                <p style='color:red;'>Error: Exceeded withdrawl amount.</p>";
             
            }
            // write code here. Return true if withdrawal goes through; false otherwise
        }

        //freebie. I am giving you this code. (thank you!)
        public function getAccountDetails() {
            $str = "<h2>Checking Account</h2>";
            $str .= parent::getAccountDetails();
            
            return $str;
        }
    }


//------------------------Savings------------------------------
    class SavingsAccount extends Account {
        public function deposit ($amount) {
            // write code here
            if($amount == '')
            {
                echo "<p>You can not deposite an empty value in your savings account.</p>";
            }
        }

        public function withdrawal($amount) {
            // write code here. Return true if withdrawal goes through; false otherwise
            if($amount == '')
            {
                echo "<p>You can not withdrawal an empty value from your savings account.</p>";
            }
                else if (($this->balance - $amount) >= 0){
                    
                    $this->balance = $this->balance - $amount;
    
                }
            else{
    
                    echo "<h1>Error: Exceeded withdrawl amount limit.</h1>";
                 
                }
            }
        

        public function getAccountDetails() {
           // look at how it's defined in other class. You should be able to figure this out ...
           $str = "<h2>Savings Account</h2>";
           $str .= parent::getAccountDetails();

           
           return $str;
            
        }

    }

    /*test stuff
    $checking = new CheckingAccount ('C123', 1000, '12-20-2019');
    $checking->withdrawal(200);
    $checking->deposit(500);

    $savings = new SavingsAccount('S123', 5000, '03-20-2020');
    
    echo $checking->getAccountDetails();
    echo $savings->getAccountDetails();
    echo $checking->getStartDate();
    */
    
?>
