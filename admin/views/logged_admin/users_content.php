<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Użytkownicy</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./logged.php">Strona główna</a></li>
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
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once "../scripts/connect.php";
                            $result = $conn->query("SELECT id, first_name, last_name, email  FROM customers");

                            while ($user = $result->fetch_assoc()) {
                                echo <<< USERROW
                                <tr>
                                    <td class="dtr-control sorting_1" tabindex="0">$user[first_name]</td>
                                    <td>$user[last_name]</td>
                                    <td>$user[email]</td>
                                    <td>
                                        <form method="POST" action="./scripts/delete_users.php">
                                            <input type="hidden" name="id" value="$user[id]"/>
                                            <button type="submit">usuń</button>
                                        </form>
                                    </td>
                                    <td>
                                    <form method="POST"  action="./scripts/update_users.php">>
                                        <button type="submit">edytuj</button>
                                    </form>
                                </td>
                                </tr>
                            USERROW;
                            }
                            ?>
                            </tbody>
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>