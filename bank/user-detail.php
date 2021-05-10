<?php require_once("./header.php"); ?>
<?php if (!isset($_GET['acc_no']))
    header("Location:./users.php")
?>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">



            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header justify-content-center">
                    <h3 class="font-weight-900 my-4">User Information Form</h3>
                </div>
                <div class="card-body">

                    <?php

                    $acc_number = $_GET['acc_no'];
                    $sql = "SELECT * FROM users WHERE acc_no=:acc";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':acc' => $acc_number
                    ]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    $user_name = $user['user_name'];
                    $user_email = $user['user_email'];
                    $amount = $user['balance'];

                    ?>

                    <form>


                        <div class="form-row">
                            <label class="small mb-1 font-weight-bold " for="inputAccountNo"> Account No :</label>
                            <label  class="form-control   text-center font-weight-600"  ><?php echo $acc_number; ?></label>
                        </div>

                        <div class="form-row">
                            <label class="small mb-1 font-weight-bold  " for="inputAccountNo">User Name :</label>
                            <label  class="form-control   text-center font-weight-600"  ><?php echo $user_name; ?></label>
                        </div>

                        <div class="form-row">
                            <label class="small mb-1 font-weight-bold  " for="inputAccountNo">User Email :</label>
                            <label  class="form-control   text-center font-weight-600"  ><?php echo $user_email; ?></label>
                        </div>

                        <div class="form-row">
                            <label class="small mb-1 font-weight-bold  " for="inputAccountNo">Account Balance :</label>
                            <label  class="form-control   text-center font-weight-600"  ><?php echo $amount; ?></label>
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