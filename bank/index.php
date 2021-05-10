<?php require_once("./header.php"); ?>




            <section class="bg-white py-10">
                <!--Start-->
                <div class="container">

                    <h1 class=" text-center text-white font-weight-900 bg-dark rounded-pill p-3 " >Welcome to Sparks Bank</h1>
                        <br/>
                        <br>
                    <hr />
                    <div class="row">
                        <div class="col-md-6 col-xl-4 mb-5">
                            <a class="card post-preview lift " href="./users.php">
                                <img class="card-img-top" src="./img/users.jfif" alt="photo" />
                                <button class="btn btn-success">VEIW ALL USERS</button>
                            </a>

                        </div>
                        <div class="col-md-6 col-xl-4 mb-5">
                            <a class="card post-preview lift " href="./transaction.php">
                                <img class="card-img-top" src="./img/transaction.jfif" alt="photo" />
                                <button class="btn btn-success">TRANSFER MONEY</button>
                            </a>
                        </div>
                        <div class="col-md-6 col-xl-4 mb-5">
                            <a class="card post-preview lift " href="./transaction-history.php">
                                <img class="card-img-top" src="./img/hostory.jfif" alt="photo" />
                                <button class="btn btn-success">TRANSFER HISTORY</button>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <?php require_once("./footer.php"); ?>