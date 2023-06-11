<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <?php require_once "./views/error.php"; ?>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Użytkownicy</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Strona główna</a></li>
                        <li class="breadcrumb-item active">Użytkownicy</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card">
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                               aria-describedby="example1_info">
                            <thead>
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Imię
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Nazwisko
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Email
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once "../scripts/connect.php";
                            $result = $conn->query("SELECT id, first_name, last_name, email  FROM customers WHERE is_user = 1 ORDER BY last_name, first_name");

                            while ($user = $result->fetch_assoc()) {
                                echo <<< USERROW
                                <tr>
                                    <td class="dtr-control sorting_1" tabindex="0">$user[first_name]</td>
                                    <td>$user[last_name]</td>
                                    <td>$user[email]</td>
                                    <td>
                                        <form method="POST" action="./scripts/delete_users.php">
                                            <input type="hidden" name="id" value="$user[id]"/>
                                            <button class="btn btn-danger btn-xs" type="submit">usuń</button>
                                        </form>
                                        <a href="./users.php?edit=$user[id]">
                                            <button class="btn btn-primary btn-xs">edytuj</button>
                                        </a>
                                    </td>
                                </tr>
                            USERROW;
                            }
                            ?>
                            </tbody>
                        
                        </table>
                    </div>
                </div>
               
                <div class="card card-primary mt-3">
                    <?php
                    if (isset($_GET["edit"])) {
                        require_once "../scripts/connect.php";
                        $stmt = $conn->prepare("SELECT * FROM customers WHERE id = ?");
                        $stmt->bind_param("i", $_GET["edit"]);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $user = $result->fetch_assoc();

                        /*
                        $cardTitle = "Edytuj uzytkownika";
                        $actionPath = "./scripts/update_users.php";
                        $submitBtn = "Edytuj";
                        */
                        $id = $user["id"];
                        $first_name = $user["first_name"];
                        $last_name = $user["last_name"];
                        $email = $user["email"];
                        
                        $cardTitle = "Edytuj użytkownika";
                    } else {
                        $cardTitle = "Edytuj użytkownika";

                        $id = "";
                        $first_name = "";
                        $last_name = "";
                        $email = "";

                    }
                    ?>

                    <div class="card-header">
                        <h3 class="card-title"><?php echo $cardTitle; ?></h3>
                    </div>


                    <form method="POST" action="./scripts/update_users.php">
                        <div class="card-body">
                            

                            <div class="form-group">
                                <label for="exampleInputPassword1">Imie</label>
                                <input value="<?php echo $first_name; ?>" type="text" name="first_name" class="form-control" id="exampleInputPassword1" placeholder="Imie">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nazwisko</label>
                                <input value="<?php echo $last_name; ?>" type="text" name="last_name" class="form-control" id="exampleInputPassword1" placeholder="Nazwisko">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input value="<?php echo $email; ?>" type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            
                    <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Edytuj</button>
                    </div>
            </div>
        </div>

    </div>
</div>