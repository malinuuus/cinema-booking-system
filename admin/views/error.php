<?php
if (isset($_SESSION["error"])) {
  echo <<< ERROR
      <div class="alert alert-danger alert-dismissible m-3">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <h5>Błąd!</h5>
          <p>$_SESSION[error]</p>
      </div>
  ERROR;
  unset($_SESSION["error"]);
}
if (isset($_SESSION["success"])) {
    echo <<< ERROR
        <div class="alert alert-success alert-dismissible m-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5>Informacja</h5>
            <p>$_SESSION[success]</p>
        </div>
    ERROR;
    unset($_SESSION["success"]);
  }