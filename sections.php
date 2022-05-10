<?php
    session_start();
    include "connection.php";

    if(isset($_POST['btn_add'])){
        $title = $_POST['title'];
            createSection($title);
        }

    function createSection($title){
        $conn = connection();
        $sql = "INSERT INTO sections(title) VALUE ('$title') ";

        if($conn->query($sql)){
            header("refresh: 0");
        } else {
            die("Error adding new product section " . $conn->error);
        }
    }
    function getSections(){
        $conn = connection();

        $sql = "SELECT * FROM sections";

        if($result = $conn->query($sql)){
            return $result;
        } else {
            die("Error retrieving all sections: " . $conn->error);
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sections</title>
</head>
<body>
    <main class="py-5">
        <div class="card w-25 mx-auto mb-5">
            <div class="card-header bg-info text-white">
                <div class="card-title h4 mb-0">Add New Section</div>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <label for="title" class="small">Title</label>
                    <input type="text" name="title" id="title" class="form-control mb-4" required autofocus>
                    <a href="products.php" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" class="btn btn-info px-5" name="btn_add">Add</button>
                </form>
            </div>
        </div>
        <div class="w-25 mx-auto">
            <h2 class="h3 text-muted">Section Lists</h2>

            <table class="table table-hover mt-4">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>TITLE</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        $sections_result = getSections();
                        while($sections_row = $sections_result->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?= $sections_row['id'] ?></td>
                            <td><?= $sections_row['title'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
            </table>
        </div>
    </main>
</body>
</html>