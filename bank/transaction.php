<?php require_once("./header.php"); ?>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <?php
            if (isset($_POST['submit'])) {
                $sender_acc_no=trim($_POST['sen-acc-no']);
                $sql="SELECT * FROM users WHERE acc_no=:acc";
                $stmt=$pdo->prepare($sql);
                $stmt->execute([
                    ':acc'=>$sender_acc_no
                ]);
                $sender_names=$stmt->fetch(PDO::FETCH_ASSOC);
                $sender_name = $sender_names['user_name'];


                $name = trim($_POST['receiver-name']);
                $receiver_acc_no = trim($_POST['rec-acc-no']);
                $amount = trim($_POST['amount']);

                $sql = "SELECT * FROM users WHERE user_name=:name";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':name' => $name,
                ]);
                $count = $stmt->rowCount();
                if ($count == 0) {
                    $error = "Wrong credentials!";
                } else if ($count >= 1) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    $rec_accno = $user['acc_no'];
                    $balance = $user['balance'];

                    if($sender_acc_no==$receiver_acc_no){
                        $error_same="Same Account Number!!";
                    }
                    if ($receiver_acc_no == $rec_accno) {

                        if (0 < $amount && $amount < $balance) {
                            $success = "Transfer Success!";
                        } else {
                            $error_amount = "Amount is out of range";
                        }
                    } else {
                        $error_acc = "Wrong Account Number!";
                    }
                }
            }
            ?>

            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header justify-content-center">
                    <h3 class="font-weight-900 my-4">Transaction Form</h3>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($success)) {
                        echo "<p class='alert alert-success'>{$success}</p>";

                        $sql1="UPDATE users SET balance = balance - :amt WHERE acc_no = :sac";
                        $stmt1=$pdo->prepare($sql1);
                        $stmt1->execute([
                            'amt'=>$amount,
                            'sac'=>$sender_acc_no
                        ]);

                        $sql2="UPDATE users SET balance = balance + :amt2 WHERE acc_no = :rac";
                        $stmt2=$pdo->prepare($sql2);
                        $stmt2->execute([
                            'amt2'=>$amount,
                            'rac'=>$receiver_acc_no
                        ]);

                        date_default_timezone_set("asia/Kolkata");
                        $sql="INSERT INTO history (sender_acc,sender_name,receiver_name,receiver_acc,amount,date) 
                                            VALUES (:sen_acc, :sen_name, :rec_name, :rec_acc, :amount, :idate)";
                        
                        $stmt=$pdo->prepare($sql);
                        $stmt->execute([
                            ':sen_acc'=>$sender_acc_no,
                            ':sen_name'=>$sender_name,
                            ':rec_name'=>$name,
                            ':rec_acc'=>$receiver_acc_no,
                            ':amount'=>$amount,
                            ':idate'=>date("M d, Y") . ' at ' . date("h:i A")
                        ]);
                        

                    }
                    if (isset($error)) {
                        echo "<p class='alert alert-danger'>{$error}</p>";
                    } else if (isset($error_acc)) {
                        echo "<p class='alert alert-danger'>{$error_acc}</p>";
                    } else if (isset($error_same)) {
                        echo "<p class='alert alert-danger'>{$error_same}</p>";
                    }else if(isset($error_amount)){
                        echo "<p class='alert alert-warning'>{$error_amount}</p>";
                    }
                    ?>
                    <form action="./transaction.php" method="POST">

  
                        <div class="form-group">
                            <label class="small mb-1" for="inputAccountNo">Sender Account No :</label>
                            <input name="sen-acc-no" class="form-control py-4" id="inputAcoountNo" type="text" placeholder="Enter Account No" required />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputReceiverName">Receiver Name :</label>
                            <input name="receiver-name" class="form-control py-4" id="inputReceiverName" type="text" placeholder="Enter Receiver name" />
                        </div>



                        <div class="form-group">
                            <label class="small mb-1" for="inputAccountNo">Receiver Account No :</label>
                            <input name="rec-acc-no" class="form-control py-4" id="inputAcoountNo" type="text" placeholder="Enter Account No" required />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputAmount">Amount</label>
                            <input name="amount" class="form-control py-4" id="inputAmount" type="text" placeholder="Enter Amount" required />
                        </div>


                        <div class="form-group mt-4 mb-0">
                            <button name="submit" class="btn btn-success btn-block" type="submit">Transfer</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</main>
</div>

<?php require_once("./footer.php"); ?>