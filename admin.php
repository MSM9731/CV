<?php
require_once('assets/config.php');

if (isset($_POST['change'])) {
  debug_r($_POST);
  $table = $_GET['table'];
  $id = $_GET['id'];
  
  $stmt = $conn -> prepare("update $table set ");
  foreach ($_POST as $changable_key => $changable_value) {
    
  }
}

?>

<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- <script src="assets/lib/eruda/eruda.js"></script>
          <script>
            eruda.init();
          </script> -->

  <link rel="stylesheet" href="assets/lib/bootstrap/dist/css/bootstrap.rtl.min.css" type="text/css" media="all" />

  <title>admin</title>

  <style type="text/css" media="all">
@font-face {
    font-family: 'suls';
    src: url('assets/fonts/suls.ttf');
  }

@font-face {
    font-family: 'vazir';
    src: url(assets/fonts/Vazir.ttf);
  }

    .ff-suls {
      font-family: suls !important;
    }

    .ff-vazir {
      font-family: vazir !important;
    }
  </style>
</head>
<body>
  <header class=""></header>

  <main>
    <!-- menu navbar -->
    <div dir="rtl">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="#">MSM</a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                  خانه
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  اطلاعات فردی
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  اطلاعات تماس
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  مهارت ها
                </a>
              </li>
              <!-- <li class="nav-item dropdown">
                                                                                                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                                    Dropdown
                                                                                                                  </a>
                                                                                                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                                                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                                                                    <li>
                                                                                                                      <hr class="dropdown-divider">
                                                                                                                    </li>
                                                                                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                                                                                  </ul>
                                                                                                                </li> -->
              <!-- <li class="nav-item">
                                                                                                                  <a class="nav-link disabled">Disabled</a>
                                                                                                                </li> -->
            </ul>
            <!-- <form class="d-flex">
                                                                                      <button class="btn btn-outline-success" type="submit">Search</button>
                                                                                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" required>
                                                                                    </form> -->
          </div>
        </div>
      </nav>
    </div>

    <div class="container">
      <div class="row">
        <div id="app" dir="rtl" class="border border-danger p-2">
          <!-- about me -->
          <div class="border border-danger p-2">
            <?php
            if (isset($_GET['table'])) {
              $t = $_GET['table'];
              $result = $conn -> query("select * from $t") -> fetchAll(PDO::FETCH_ASSOC);
              //debug_r($result)
              ?>
              <h3 class="text-center ff-suls p-2 my-2">
                نام جدول:
                <bdo dir="ltr">
                  <?php echo $_GET['table'] ?>
                </bdo>
                <?php if (isset($_GET['id'])) {
                  echo ': ' . $result[$_GET['id']-1]['title'];
                } ?>
              </h3>
              <?php if (!isset($_GET['id'])): ?>
              <ol class="list-group" style="list-style-position: inside;">
                <?php foreach ($result as $record): ?>
                <a href="?table=<?php echo $_GET['table'] ?>&id=<?php echo $record['id'] ?>" class="list-group-item list-group-item-action" aria-current="true">
                  <li class="">
                    <?php echo $record['title'] ?>
                  </li>
                </a>
                <?php endforeach; ?>
              </ol>
              <?php else : ?>
              <form action="" method="post" class="form">
                <?php foreach ($result[$_GET['id']-1] as $col_name => $cell): //debug_r($result[$_GET['id']-1]) ?>
                <input type="text" name="<?php echo $col_name ?>" class="form-control my-2" value="<?php echo $cell ?>" <?php if ($col_name === 'id' || $col_name === 'uping_date') echo 'disabled' ?>>
                <?php endforeach; ?>
                <button type="submit" name="change" class="btn btn-success my-3 w-100">
                  change
                </button>
              </form>
              <?php endif; ?>
              <?php
            } else {
              $result = $conn -> query("show tables") -> fetchAll(PDO::FETCH_ASSOC);
              ?>
              <h2 class="text-center ff-suls p-2 my-2">
                جداول
              </h2>
              <ol class="list-group" style="list-style-position: inside;">
                <?php foreach ($result as $tableName): ?>
                <a href="?table=<?php echo $tableName['Tables_in_CV'] ?>" class="list-group-item list-group-item-action" aria-current="true">
                  <li class="">
                    <?php echo $tableName['Tables_in_CV'] ?>
                  </li>
                </a>
                <?php endforeach; ?>
              </ol>
              <?php
            }
            //debug_r($result);
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class=""></footer>


  <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
  <!-- <script src="assets/lib/vue/dist/vue.min.js" type="text/javascript" charset="utf-8"></script> -->
  <!-- <script src="assets/lib/getSearch.js" type="text/javascript" charset="utf-8"></script> -->
  <script type="text/javascript" charset="utf-8">
    window.addEventListener('load', function() {

      //console.log(getSearch());
    });
  </script>
</body>
</html>