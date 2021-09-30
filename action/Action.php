<?php

/**
 * Action class to handle all database queries
 */
class Action
{
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $dbname = "ldb";
  private $connected = false;
  
  function __construct()
  {
    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    
    //if start sessions if not started
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    // Check connection
    if ($this->conn) {
      $this->connected = True;
    }
  }

  function escape($value='')
  {
    return $this->conn->real_escape_string($value);
  }

  function registerCustomer(){
    if (isset($_POST["reg_btn"])) {
      if (!$this->connected){
        echo $this->conn->connect_error;
        return false;
      }
      $fname = $this->escape($_POST['c_firstName']);
      $mname = $this->escape($_POST['c_middleName']);
      $lname = $this->escape($_POST['c_lastName']);
      $contacts = $this->escape($_POST["c_contactNumber"]);
      $postal = $this->escape($_POST["c_postalAddress"]);
      $email = $this->escape($_POST["c_emailAddress"]);
      $tax_id = $this->escape($_POST["c_taxId"]);
      $pass = $this->escape($_POST["c_newPassword"]);

      //Test if Email have alraedy been used
      $sql = "SELECT * FROM `customer` WHERE cst_email = '$email';";
      $email_result = $this->conn->query($sql);
      if(!$email_result){
        echo $this->conn->error;
        return false;
      }
      if ($email_result->num_rows > 0) {
        echo '<div class="w-full rounded mt-2 p-3 border-2 bg-red-700 text-white">Email already used!</div>';
        return false;
      }

      //Test if contacts have alraedy been used
      $sql = "SELECT * FROM `customer` WHERE cst_contact = '$contacts';";
      $contact_result = $this->conn->query($sql);
      if(!$contact_result){
        echo $this->conn->error;
        return false;
      }
      if ($contact_result->num_rows > 0) {
        echo '<div class="w-full rounded mt-2 p-3 border-2 bg-red-700 text-white">Contact Number already used!</div>';
        return false;
      }

      $sql = "INSERT INTO `customer` (`cst_firstname`, `cst_middlename`, `cst_lastname`, `cst_contact`, `cst_post_address`, `cst_email`, `cst_tax_id`, `cst_password`) VALUES ('$fname', '$mname', '$lname', '$contacts', '$postal', '$email', '$tax_id', '$pass')";
      if($this->conn->query($sql)){
        echo '<div class="w-full rounded p-3 border-2 bg-green-700 text-white">Customer added to database successfully!</div>';
        $_SESSION["logged_user"]= array(
                                        'cst_firstname'=>$fname,
                                        'cst_middlename'=>$mname,
                                        'cst_lastname'=>$lname,
                                        'cst_email'=>$email, 
                                        'cst_contact'=>$contact,
                                        'cst_tax_id'=>$tax
                                      );
        header("location: ../customer/dashboard.php");
      }
      else{
        echo $this->conn->error;
        return false;
      }
      
      return true;

    }
  }

  function addAdmin(){
    if (isset($_POST["add_admin_btn"])) {
      if (!$this->connected){
        echo $this->conn->connect_error;
        return false;
      }
      $fname = $this->escape($_POST['adm_firstname']);
      $lname = $this->escape($_POST['adm_lastname']);
      $email = $this->escape($_POST["adm_email"]);
      // $level = $this->escape($_POST["adm_level"]);
      $level = '1';
      $pass = $this->escape($_POST["adm_password"]);

      //Test if Email have alraedy been used
      $sql = "SELECT * FROM `admin` WHERE admin_email = '$email';";
      $email_result = $this->conn->query($sql);
      if(!$email_result){
        echo $this->conn->error;
        return false;
      }
      if ($email_result->num_rows > 0) {
        echo '<div class="w-full rounded p-3 border-2 bg-red-700 text-white">Email already used!</div>';
        return false;
      }

      $sql = "INSERT INTO `admin` (`admin_id`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_level`, `admin_password`) VALUES (NULL, '$fname', '$lname', '$email', '$level', '$pass');";
      if($this->conn->query($sql)){
        echo '<div class="w-full rounded p-3 border-2 bg-green-700 text-white">Customer added to database successfully!</div>';
        $_SESSION["logged_user"]= array(
                                        'admin_firstname'=>$fname,
                                        'admin_lastname'=>$lname,
                                        'admin_email'=>$email, 
                                        'admin_level'=>$level,
                                      );
        header("location: ../admin/dashboard.php");
      }
      else{
        echo $this->conn->error;
        return false;
      }
      
      return true;

    }
  }

  function loginCustomer(){
    if (isset($_POST["login_btn"])) {
      if (!$this->connected){
        echo $this->conn->connect_error;
        return false;
      }
      $email = $this->escape($_POST["c_emailAddress"]);
      $pass = $this->escape($_POST["c_password"]);

      //Test if Email have alraedy been used
      $sql = "SELECT * FROM `customer` WHERE cst_email = '$email';";
      $email_result = $this->conn->query($sql);
      if(!$email_result){
        echo $this->conn->error;
        return false;
      }
      if ($email_result->num_rows > 0) {
        $sql = "SELECT * FROM `customer` WHERE cst_email = '$email' AND cst_password = '$pass'";
        $total_result = $this->conn->query($sql);
        if($total_result->num_rows > 0){
          $_SESSION["logged_user"] = $total_result->fetch_assoc();
          // echo '<div class="w-full rounded mt-2 p-3 border-2 bg-red-700 text-white"><pre>';
          // print_r($total_result->fetch_assoc());
          // echo "</pre></div>";
          header("location: ../customer/dashboard.php");
          return true;
        }else{
          echo '<div class="w-full rounded mt-2 p-3 border-2 bg-red-700 text-white">Email and password does not match!</div>';
          return false;
        }
        
      }else{
        echo '<div class="w-full rounded mt-2 p-3 border-2 bg-red-700 text-white">Email not registered here!</div>';
          return false;
      }

    
    }
  }


  function loginAdmin(){
    if (isset($_POST["admin_login_btn"])) {
      if (!$this->connected){
        echo $this->conn->connect_error;
        return false;
      }
      $email = $this->escape($_POST["adminEmail"]);
      $pass = $this->escape($_POST["adminPassword"]);

      //Test if Email have alraedy been used
      $sql = "SELECT * FROM `admin` WHERE admin_email = '$email';";
      $email_result = $this->conn->query($sql);
      if(!$email_result){
        echo $this->conn->error;
        return false;
      }
      if ($email_result->num_rows > 0) {
        $sql = "SELECT * FROM `admin` WHERE admin_email = '$email' AND admin_password = '$pass'";
        $total_result = $this->conn->query($sql);
        if($total_result->num_rows > 0){
          echo "<div class='text-white px-2 py-1 font-normal mt-1 rounded bg-green-700'>Login successfully!</div>";
          $_SESSION["logged_user"] = $total_result->fetch_assoc();
          header("location: ../admin/dashboard.php");
          return true;
        }else{
          echo "<div class='text-white px-2 py-1 font-normal mt-1 rounded bg-red-700'>Wrong password!</div>";
          return false;
        }
        
      }else{
          echo "<div class='text-white px-2 py-1 font-normal mt-1 rounded bg-red-700'>Admin email not registered!</div>";
          return false;
      }

    
    }
  }

  function requestLoan(){
    if (isset($_POST["request_btn"])) {
      if (!$this->connected){
        echo $this->conn->connect_error;
        return false;
      }

      $type = $this->escape($_POST["loan_type"]);
      $plan_id = $this->escape($_POST["loan_plan"]);
      $amount = $this->escape($_POST["loan_amount"]);

      $planArr = $this->getPlan($plan_id)->fetch_assoc();

      $plan_name = $planArr["plan_name"];

      $rate = $planArr["plan_interest_rate"];

      $d=strtotime($planArr["plan_period"]);
      $due_date = date("Y-m-d", $d);

      $returned_amount = ((100+$rate)/100)*$amount;
      $ref_code = strtoupper("REQ".uniqid().date("His"));

      if (!isset($_SESSION["logged_user"]["cst_email"])) {
        $cst_email = $_POST["customer_email"];
      }else{
        $cst_email = $_SESSION["logged_user"]["cst_email"];

        if($this->getActiveLoans($cst_email)->num_rows > 0){
          echo '<div class="w-full rounded p-3 border-2 bg-red-700 text-white">Sorry! You have active loan to pay in order to request another. Please pay first!</div>';
          return false;
        }

        if($this->getActiveAndRequested($cst_email)->num_rows > 0){
          echo '<div class="w-full rounded p-3 border-2 bg-red-700 text-white">Your recent loan request is being proccessed! Please wait for it to be approved!</div>';
          return false;
        }
      }

      $sql = "INSERT INTO `loan` (`cst_email`, `amount`, `type`, `plan`, `rate`, `returned_amount`,`loan_reference`,`due_date`,`loan_status`) VALUES ('$cst_email', '$amount', '$type', '$plan_name', '$rate', '$returned_amount','$ref_code','$due_date','Requested');";

      if ($this->conn->query($sql)) {
        echo '<div class="w-full rounded p-3 border-2 bg-green-700 text-white">Loan request sent successfully!</div>';
        return true;
      }
    }
  }

  function getLoans($email="", $status=""){
    if (!$this->connected){
      echo $this->conn->connect_error;
      return false;
    }
    $sql = "SELECT * FROM `loan` WHERE `cst_email` = '$email'";
    if($email == "all"){
      $sql = "SELECT * FROM `loan`";
    }

    if($email = "all" && $status != ""){
      $sql .=" WHERE `loan_status` = '$status'";
    }
    if($email != "all" && $status != ""){
      // $sql .=" AND `loan_status` = '$status'";
      $sql = "SELECT * FROM `loan` WHERE `cst_email`='123@gmail.com' AND `loan_status` = 'active'";
    }
    return $this->conn->query($sql);
  }

  function getLoansPlusUsers($type=""){
    if (!$this->connected){
      echo $this->conn->connect_error;
      return false;
    }
    $loans = array();
    $sql = "SELECT * FROM `loan` JOIN `customer` ON customer.cst_email = loan.cst_email";
    if($type != ""){
      $sql .=" WHERE `loan_status` = '$type'";
    }
    return $this->conn->query($sql);
  }

  function getCustomer($email=""){
    $this->checkDbConnection();
    $sql = "SELECT * FROM `customer` WHERE `cst_email` = '$email'";
    if ($email=="all") {
      $sql = "SELECT * FROM `customer`";
    }
    return $this->conn->query($sql);
  }

  function getAdmin($email=""){
    $this->checkDbConnection();
    $sql = "SELECT * FROM `admin` WHERE `admin_email` = '$email'";
    if ($email=="all") {
      $sql = "SELECT * FROM `admin`";
    }
    return $this->conn->query($sql);
  }

  function getCustomerPlusLoan($email=""){
    $this->checkDbConnection();
    $sql = "SELECT * FROM `customer` JOIN `loan` ON customer.cst_email = loan.cst_email";
    if ($email != "all") {
       $sql .= "WHERE `cst_email` = '$email'";
    }
    return $this->conn->query($sql);
  }

  function updateLoanStatus($id="", $value=""){
    $this->checkDbConnection();
    $sql = "UPDATE `loan` SET `loan_status` = '$value' WHERE `loan`.`ln_id` = '$id'";
    if($this->conn->query($sql)){
      echo "<div class='w-full rounded mt-2 p-3 border-2 bg-green-700 text-white'>
              Loan set to $value successfully!
            </div>";
      return true; 
    }
    echo $this->conn->connect_error;
    return false;
  }

  function updateActiveToPaidLoan($email){
    $this->checkDbConnection();
    $sql = "UPDATE `loan` SET `loan_status` = 'Paid' WHERE `loan`.`cst_email` = '$email'";
    if($this->conn->query($sql)){
      echo "<div class='w-full rounded mt-2 p-3 border-2 bg-green-700 text-white'>
              Loan set to paid successfully!
            </div>";
      return true; 
    }
    echo $this->conn->connect_error;
    return false;
  }

  function checkDbConnection(){
    if (!$this->connected){
      echo $this->conn->connect_error;
      return false;
    }
    return true;
  }

 
  function validateCreditCard(){
   //validate card details here using ATM OWNER'S Bank/Company API
    //If validate, return true
    $check = true;
    if($check){
      return true;
    }
   return false; 
  }

  function addPayment(){
    $this->checkDbConnection();
    if (isset($_POST["add_payment_btn"])) {
      // code...
      if (isset($_SESSION['logged_user']["cst_email"])) {
        $cst_email = $_SESSION['logged_user']["cst_email"];
      }else{
        $cst_email = $this->escape($_POST["customer_email"]);
      }

      if (isset($_POST["atm_card_number"])){
        $this->validateCreditCard();
      }

      $owed_amount = $this->getOwedAmount($cst_email);

      $amount = $this->escape($_POST["payment_amount"]);
      $ref_code = strtoupper("PAY".uniqid().date("His"));

      $sql = "INSERT INTO `payments` (`cst_email`,`payment_reference`,`amount`) VALUES ('$cst_email','$ref_code','$amount');";
      if ($this->conn->query($sql)) {

        if ($owed_amount <= $amount) {
          $this->updateActiveToPaidLoan($cst_email);
        }

        echo '<div class="w-full rounded m-2 p-3 border-2 bg-green-700 text-white">Payment added successfully!</div>';
        return true;
      }
      return false;
    }
  }

  function addLoanType(){
    $this->checkDbConnection();
    if (isset($_POST["add_loan_type_btn"])) {
      // code...
      $type = $this->escape($_POST["loan_type"]);
      $sql = "INSERT INTO `loan_type` (`type_name`) VALUES ('$type');";
      if ($this->conn->query($sql)) {
        echo '<div class="w-full rounded m-2 p-3 border-2 bg-green-700 text-white">New type of loan created successfully!</div>';
        return true;
      }
      return false;
    }
  }

  function addPlan(){
    $this->checkDbConnection();
    if (isset($_POST["add_plan_btn"])) {
      // code...
      $plan_name = $this->escape($_POST["plan_name"]);
      $period = $this->escape($_POST["repayment_period"]);
      $rate = $this->escape($_POST["rate"]);

      $sql = "INSERT INTO `plan` (`plan_name`, `plan_period`, `plan_interest_rate`) VALUES ('$plan_name', '$period', '$rate');";
      if ($this->conn->query($sql)) {
        echo '<div class="w-full rounded m-2 p-3 border-2 bg-green-700 text-white">New Plan created successfully!</div>';
        return true;
      }
      return false;
    }
  }

  function getPlan($pid=""){
    $this->checkDbConnection();
    $sql = "SELECT * FROM `plan`";
    if ($pid != "all") {
       $sql .=" WHERE plan_id = '$pid'";
    }
    return $this->conn->query($sql);
  }

  function getLoanType($tyid=""){
    $this->checkDbConnection();
    $sql = "SELECT * FROM `loan_type`";
    if ($tyid != "all") {
       $sql .=" WHERE type_id = '$tyid'";
    }
    return $this->conn->query($sql);
  }

  function getPayments($email = ""){
    $this->checkDbConnection();
    if($email = "all"){
      $sql = "SELECT * FROM `payments` JOIN `customer` ON payments.cst_email=customer.cst_email";
    }else{
      $sql = "SELECT * FROM `payments` JOIN `customer` ON payments.cst_email=customer.cst_email  WHERE `cst_email`='$email'";
    }
    return $this->conn->query($sql);
  }

  function removePlan(){
    $this->checkDbConnection();
    if(isset($_POST["removePlan"])){
      $plan_id = $this->escape($_POST["plan_id"]);
      $sql = "DELETE FROM `plan` WHERE `plan`.`plan_id` = '$plan_id'";
      if($this->conn->query($sql)){
        echo '<div class="w-full rounded font-normal p-3 border-2 bg-green-700 text-white">Plan removed successfully!</div>';
        return true;
      }
    }
    return false;
  }

  function removeLoanType(){
    $this->checkDbConnection();
    if(isset($_POST["removeLoanType"])){
      $type_id = $this->escape($_POST["type_id"]);
      $sql = "DELETE FROM `loan_type` WHERE `loan_type`.`type_id` = '$type_id'";
      if($this->conn->query($sql)){
        echo '<div class="w-full rounded font-normal p-3 border-2 bg-green-700 text-white">Loan Type removed successfully!</div>';
        return true;
      }
    }
    return false;
  }

  // Gets all active loans of certain customer
  function getActiveLoans($email){
    $this->checkDbConnection();
    $sql = "SELECT * FROM `loan` WHERE `cst_email`='$email' AND `loan_status` = 'active'";
    if($email == "all"){
      $sql = "SELECT * FROM `loan` WHERE `loan_status` = 'active'";
    }
    
    return $this->conn->query($sql);
  }

  // Gets all active+paid loans of certain customer
  function getActiveAndPaidLoans($email){
    $this->checkDbConnection();
    $sql = "SELECT * FROM `loan` WHERE `cst_email`='$email' AND (`loan_status` = 'Active' OR `loan_status` = 'Paid')";
    if($email == "all"){
      $sql = "SELECT * FROM `loan` WHERE `loan_status` = 'active'";
    }
    
    return $this->conn->query($sql);
  }


  // Gets all active loans of certain customer
  function getActiveAndRequested($email){
    $this->checkDbConnection();
    $sql = "SELECT * FROM `loan` WHERE `cst_email`='$email' AND (`loan_status` = 'active' OR `loan_status` = 'requested')";
    if($email == "all"){
      $sql = "SELECT * FROM `loan` WHERE `loan_status` = 'active' OR `loan_status` = 'requested'";
    }
    
    return $this->conn->query($sql);
  }


  function getOwedAmount($email){
        $active_loans = $this->getActiveAndPaidLoans($email);
        $payments = $this->getPayments($email);

        $owed_amount = 0;

        $loan_total_amounts = 0;
        $payment_total_amounts = 0;

        if ($active_loans->num_rows > 0){
          while($row = $active_loans->fetch_assoc()){
            $loan_total_amounts += $row["returned_amount"];
          } 
        }

        $owed_amount = $loan_total_amounts;
        if($payments->num_rows > 0){
          while($row = $payments->fetch_assoc()){
            $payment_total_amounts += $row["amount"];
          }
        }
      
        $owed_amount = $loan_total_amounts - $payment_total_amounts;
        return $owed_amount;
  }

  function insertResetCode()
  {
    $this->checkDbConnection();
    if(isset($_POST["get_code_btn"])){
      $email = $_POST["c_emailAddress"];
      $code = random_int(1000, 9999);
      $sql = "INSERT INTO `password_reset_token` (`psr_token`, `email`) VALUES ('$code', '$email');";
      if($this->getCustomer($email)->num_rows > 0){

        if ($this->conn->query($sql)) {
            $this->sendResetCode($email, $code);
            return true;
          }

      }else{
        if($this->getAdmin($email)->num_rows > 0){
          if ($this->conn->query($sql)) {
              //$this->sendResetCode($email, $code);
              return true;
            }   
        }else{
          echo "<div class='p-2 rounded text-red-700 font-normal'>That email is not registered! <a href='' class='pl-3 decoration-none font-normal text-blue-800'>Use another email?</a></div>";
        }
        
      }
    }
    return false;
  }

  //this sends Reset Code to User Email
  function sendResetCode($email, $code){
    $header = "From:admin@loanWebsite.com";
    return mail($email,"PASSWORD RESET",$code, $header);     
  }

  function retrieveResetCode()
  {
    $this->checkDbConnection();
    if(isset($_POST["validate_code_btn"])){
      $email = $this->escape($_POST["c_emailAddress"]);
      $code = $this->escape($_POST["reset_code"]);
      $sql = "SELECT * FROM `password_reset_token` WHERE `email`='$email' AND `psr_token`='$code'";
      
      if($this->getCustomer($email)->num_rows > 0){
        if($this->conn->query($sql)->num_rows > 0) {
          return true;
        }else{
          echo "<div class='p-2 rounded text-red-700 font-normal'>Wrong Reset Code! <a href='' class='pl-3 decoration-none font-normal text-blue-800'>Use another</a></div>";
        }
      }
      elseif ($this->getAdmin($email)->num_rows > 0) {
        if($this->conn->query($sql)->num_rows > 0) {
          return true;
        }else{
          echo "<div class='p-2 rounded text-red-700 font-normal'>Wrong Reset Code! <a href='' class='pl-3 decoration-none font-normal text-blue-800'>Use another</a></div>";
          return false;
        }
      }
      else{
        echo "<div class='p-2 rounded text-red-700 font-normal'>That email is not registered! <a href='' class='pl-3 decoration-none font-normal text-blue-800'>Use another email?</a></div>";
        return false;
      }   
    }
    return false;
  }

  function changePassword()
  {
    $this->checkDbConnection();
    if(isset($_POST["change_password_btn"])){
      $email = $this->escape($_POST["c_emailAddress"]);
      $password = $this->escape($_POST["c_password"]);
      $password_confirm = $this->escape($_POST["c_password_confirm"]);

      if ($password != $password_confirm) {
        echo "<div class='bg-red-700 text-white'>Your passwords are not the same!</div>";
        return false;
      }

      $customer = $this->getCustomer($email);
      if($this->customer->num_rows > 0){
        $sql = "UPDATE `customer` SET `cst_password` = '$password' WHERE `customer`.`cst_email` = '$email';";
        if ($this->conn->query($sql)) {
          $_SESSION['logged_user'] = $this->getCustomer($email)->fetch_assoc();
          return header("location: ../customer/dashboard.php");        
        }
      }else{
        $admin = $this->getAdmin($email);
        if($admin->num_rows > 0){
          $sql = "UPDATE `admin` SET `admin_password` = '$password' WHERE `admin`.`admin_email` = '$email';";
                if ($this->conn->query($sql)) {
                  $_SESSION['logged_user'] = $this->getAdmin($email)->fetch_assoc();
                    return header("location: ../admin/dashboard.php");        
                  }
        }else{
          echo "<div class='p-2 bg-red-700 text-white rounded'>You are not registered here!<div>";
          return false;
        }
      }
    
    }
  }

  function updateLoggedUser(){
    $this->checkDbConnection();
    if(isset($_POST["update_logged_user_btn"])){
      $firstname = $this->escape($_POST["first_name"]);
      $lastname = $this->escape($_POST["last_name"]);
      $password = $this->escape($_POST["new_password"]);
      if(isset($_SESSION["logged_user"]["cst_email"])){
        //customer
        $email = $_SESSION["logged_user"]["cst_email"];
        $middlename = $this->escape($_POST["middle_name"]);
        $contacts = $this->escape($_POST["c_contactNumber"]);
        $post_address = $this->escape($_POST["c_postalAddress"]);
        $tax_id = $this->escape($_POST["c_taxId"]);

        $sql = "UPDATE `customer` SET `cst_firstname`='$firstname', `cst_middlename`='$middlename',`cst_lastname`='$lastname', `cst_contact`='$contacts', `cst_post_address`='$post_address', `cst_tax_id`='$tax_id', `cst_password`='$password' WHERE `cst_email`='$email'";
          if($this->conn->query($sql)){
            echo "<div class='bg-green-700 text-white p-3'>Customer Account Details Updated Successfuly!</div>";
            $_SESSION["logged_user"] = $this->getCustomer($email)->fetch_assoc();
          }else{
            echo "<div class='bg-red-700 text-white p-3'>{$this->conn->error}</div>";
          }
      }else{
        //admin
        $email = $_SESSION["logged_user"]["admin_email"];
        $sql = "UPDATE `admin` SET `admin_firstname`='$firstname', `admin_lastname`='$lastname',`admin_password`='$password' WHERE `admin_email`='$email'";
        if($this->conn->query($sql)){
          echo "<div class='bg-green-700 text-white p-3'>Admin Account Details Updated Successfuly!</div>";
          $_SESSION["logged_user"] = $this->getAdmin($email)->fetch_assoc();
        }else{
          echo "<div class='bg-red-700 text-white p-3'>{$this->conn->error}</div>";
        }
      }
    }
  }

  function logUserOut()
  {
    session_start();
    session_destroy();
    header("Location: ../ui/");
  }

  function __destruct(){
    $this->conn->close();
  }
}
