<?php require_once("./header.php"); ?>

<main>
    <div class="card mb-4">
        <div class="card-header">All Users</div>
        <div class="card-body">
            <div class="datatable table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Account NO</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Photo</th>
                            <th>Balance</th>
                            <th>Registered on</th>

                        </tr>
                    </thead>

                    <?php
                    $i=0;
                    $sql = "SELECT * FROM users";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $i++;
                        $user_accNo = $user['acc_no'];
                        $user_name = $user['user_name'];
                        $user_email = $user['user_email'];
                        $photo = $user['photo'];
                        $balance = $user['balance'];
                        $registered_on = $user['registered_on'];
                    ?>
                        <tbody>
                            <tr>
                                <td width=30><?php echo $i; ?></td>
                                <td><?php echo $user_accNo; ?></td>
                                <td>
                                    <a href="./user-detail.php?acc_no=<?php echo $user_accNo; ?>" 
                                    class="btn btn-success text-white btn-block">
                                    <?php echo $user_name;?></a>
                                </td>
                                <td>
                                    <?php echo $user_email; ?>
                                </td>
                                <td><img src="./img/<?php echo $photo; ?>" alt="user-photo" height="30" width="30"></td>
                                <th><?php echo $balance; ?></th>
                                <td><?php echo $registered_on; ?></td>

                            </tr>

                        </tbody>

                    <?php }
                    ?>


                </table>
            </div>
        </div>
    </div>
    </div>
    <!--End Table-->
</main>

<?php require_once("./footer.php"); ?>