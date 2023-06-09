<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Filmy</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./logged.php">Strona główna</a></li>
                        <li class="breadcrumb-item active">Filmy</li>
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
                                    aria-label="Browser: activate to sort column ascending">Opis
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Data premiery
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Czas trwania
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Gatunek
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Zdjęcie
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once "../scripts/connect.php";
                            $result = $conn->query("SELECT m.id, m.title, m.description, m.premiere_date, m.duration, g.name, m.cover_path FROM movies m INNER JOIN genres g ON g.id = m.genre_id");

                            while ($movie = $result->fetch_assoc()) {
                                echo <<< USERROW
                                <tr>
                                    <td class="dtr-control sorting_1" tabindex="0">$movie[title]</td>
                                    <td>$movie[description]</td>
                                    <td>$movie[premiere_date]</td>
                                    <td>$movie[duration] m</td>
                                    <td>$movie[name]</td>
                                    <td>
                                        <img src="../$movie[cover_path]" width="100" />
                                    </td>
                                    <td>
                                        <form method="POST" action="./scripts/delete_movies.php">
                                            <input type="hidden" name="movie_id" value="$movie[id]" />
                                            <button type="submit">usuń</button>
                                        </form>
                                        <form method="POST" action="./scripts/delete_movies.php">
                                            <input type="hidden" name="movie_id" value="$movie[id]" />
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Dodaj film</h3>
                    </div>


                    <form method="POST" action="./scripts/add_screening.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tytuł</label>
                                <input type="text" name="title" class="form-control" id="exampleInputPassword1" placeholder="Podaj tytuł">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Opis</label>
                                <textarea type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Podaj opis"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Data premiery</label>
                                <input type="date" name="premiere_date"  class="form-control" id="exampleInputPassword1" placeholder="Podaj datę premiery">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Czas trwania</label>
                                <input type="number" name="duration" class="form-control" id="exampleInputPassword1" placeholder="Podaj czas trwania">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Gatunek</label>
                                <select class="form-control select2 select2-hidden-accessible" name="genre_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <?php
                                require_once "../scripts/connect.php";
                                $result = $conn->query("SELECT * FROM genres");

                                while ($genre = $result->fetch_assoc()) {
                                    echo "<option value='$genre[id]'>$genre[name]</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Dodaj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>