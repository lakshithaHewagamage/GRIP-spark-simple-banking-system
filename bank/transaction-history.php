<?php require_once("./header.php"); ?>


<main>
    <div class="card mb-4">
        <h1 class="card-header">Transaction-History</h1>
        <div class="card-body">
            <div class="datatable table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Acc Sender</th>
                            <th>Sender</th>
                            <th>Receiver</th>
                            <th>Acc Receiver</th>
                            <th>Amount</th>
                            <th>Date & Time</th>

                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM history";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    while ($transaction_history = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                        $sen_acc=$transaction_history['sender_acc'];
                        $sen_name=$transaction_history['sender_name'];
                        $rec_name=$transaction_history['receiver_name'];
                        $rec_acc=$transaction_history['receiver_acc'];
                        $value=$transaction_history['amount'];
                        $date=$transaction_history['date'];
                        ?>

                        <tbody>
                            <tr>
                                <td><?php echo $sen_acc; ?></td>
                                <td>
                                <?php echo $sen_name; ?>
                                </td>
                                <td>
                                <?php echo $rec_name; ?>
                                </td>
                                <td>
                                <?php echo $rec_acc; ?>
                                </td>
                                <td><?php echo $value; ?></td>
                                <td><?php echo $date; ?></td>

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