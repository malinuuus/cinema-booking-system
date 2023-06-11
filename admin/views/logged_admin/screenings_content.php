<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <?php
            require_once "./views/error.php";
            ?>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Seanse</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./logged.php">Strona główna</a></li>
                        <li class="breadcrumb-item active">Seanse</li>
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
                                    aria-label="Rendering engine: activate to sort column descending">Tytuł
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Data
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Godzina
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Cena
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Napisy
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Numer sali
                                </th>
                                <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Zdjęcie
                                </th> -->
                               
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once "../scripts/connect.php";
                            $result = $conn->query("SELECT s.id, m.title, s.date, TIME_FORMAT(time, '%H:%i') AS time, s.price, s.is_subtitles, s.hall_number FROM screenings s LEFT JOIN movies m ON s.movie_id = m.id ORDER BY s.date, s.time");

                            while ($scr = $result->fetch_assoc()) {
                                $subtitles = $scr["is_subtitles"] ? "napisy" : "bez napisów";
                                echo <<< USERROW
                                <tr>
                                    <td class="dtr-control sorting_1" tabindex="0">$scr[title]</td>
                                    <td>$scr[date]</td>
                                    <td>$scr[time]</td>
                                    <td>$scr[price] zł</td>
                                    <td>$subtitles</td>
                                    <td>$scr[hall_number]</td>
                                    <td>
                                        <form method="POST" action="./scripts/delete_screening.php">
                                            <input type="hidden" name="screening_id" value="$scr[id]" />
                                            <button class="btn btn-light btn-xs" type="submit">usuń</button>
                                        </form>
                                        <a href="./screenings.php?edit=$scr[id]">
                                            <button class="btn btn-light btn-xs">edytuj</button>
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
                <div class="card card-primary">
                    <?php
                    if (isset($_GET["edit"])) {
                        require_once "../scripts/connect.php";
                        $stmt = $conn->prepare("SELECT * FROM screenings WHERE id = ?");
                        $stmt->bind_param("i", $_GET["edit"]);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $screening = $result->fetch_assoc();

                        $cardTitle = "Edytuj seans";
                        $actionPath = "./scripts/update_screenings.php";
                        $submitBtn = "Edytuj";
                        $movie_id = $screening["movie_id"];
                        $date = $screening["date"];
                        $time = $screening["time"];
                        $price = $screening["price"];
                        $hallNumber = $screening["hall_number"];
                        $subtitles = $screening["is_subtitles"] ? "checked" : "";
                    } else {
                        $cardTitle = "Dodaj seans";
                        $actionPath = "./scripts/add_screenings.php";
                        $submitBtn = "Dodaj";
                        $movie_id = "";
                        $date = "";
                        $time = "";
                        $price = "";
                        $hallNumber = "";
                        $subtitles = "";
                    }
                    ?>

                    <div class="card-header">
                        <h3 class="card-title"><?php echo $cardTitle; ?></h3>
                    </div>


                    <form method="POST" action="<?php echo $actionPath; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Film</label>
                                <select class="form-control select2 select2-hidden-accessible" name="movie_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <?php
                                
                                $result = $conn->query("SELECT id, title FROM movies");

                                while ($movie = $result->fetch_assoc()) {
                                    if ($movie["id"] == $screening["movie_id"]) {
                                        echo "<option selected value='$movie[id]'>$movie[title]</option>";
                                    } else {
                                        echo "<option value='$movie[id]'>$movie[title]</option>";
                                    }
                                }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Data</label>
                                <input value="<?php echo $date; ?>" type="date" name="date" class="form-control" id="exampleInputPassword1" placeholder="Data">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Godzina</label>
                                <input value="<?php echo $time; ?>" type="time" name="time" class="form-control" id="exampleInputPassword1" placeholder="Godzina">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Cena</label>
                                <input value="<?php echo $price; ?>" type="number" name="price" step="0.01" min="0" class="form-control" id="exampleInputPassword1" placeholder="Podaj cenę">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Sala</label>
                                <select class="form-control select2 select2-hidden-accessible" name="hall_number" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <?php
                                    if ($hallNumber == 1) {
                                        echo <<< OPTIONS
                                        <option selected value="1">1</option>
                                        <option value="2">2</option>
                                        OPTIONS;
                                    } else {
                                        echo <<< OPTIONS
                                        <option value="1">1</option>
                                        <option selected value="2">2</option>
                                        OPTIONS;
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-check">
                                <input <?php echo $subtitles; ?> value="1" type="checkbox" name="is_subtitles" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Napisy</label>
                            </div>
                            <?php
                            if (isset($_GET["edit"])) {
                                echo "<input type='hidden' name='screening_id' value=$screening[id] />";
                            }
                            ?>
                        </div>
                      

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><?php echo $submitBtn; ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>