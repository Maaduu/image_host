<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- css boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <header>
        <h2>Photoshoot</h2>
    </header>

    <?php // If the image has received
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $error = 1;
        // size
        if ($_FILES['image']['size'] <= 3000000) {
            // Extensions
            $imgInfo = pathinfo($_FILES['image']['name']);
            $extensionImg = $imgInfo['extension'];
            $extensionArray = array('jpg', 'jpeg', 'png', 'gif');

            if (in_array($extensionImg, $extensionArray)) {

                $addres = 'uploads/' . time() . rand() . rand() . '.' . $extensionImg;
                move_uploaded_file($_FILES['image']['tmp_name'], $addres);

                $error = 0;
            }
        }
    }

    ?>

    <div class="container">
        <article>
            <h1>host an image</h1>
            <?php
            if (isset($error) && $error == 0) {
                echo '<img class="img", src="' . $addres . '">';
            } else if (isset($error) && $error == 1) {
                echo 'Verifier l\'extension de l\'image (la taille maximum 3mo)';
            }

            ?>
            <div class="custom-file">
                <form action="index.php" method="POST" enctype="multipart/form-data">

                    <input type="file" name="image" class="custom-file-input img_file" id="customFile"> <label class="custom-file-label" for="customFile">Choose file</label><br />
                    <button type="submit" class="btn btn-primary" name="btn" style="text-align: center">shelter</button>
                </form>
            </div>
        </article>

    </div>
</body>

</html>