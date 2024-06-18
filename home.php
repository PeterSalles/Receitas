<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Receitas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .navbar, .btn-primary {
            background-color: #007bff;
        }
        .btn-primary {
            border-color: #007bff;
        }
        .card {
            background-color: #444;
            border: none;
        }
        .card-title {
            color: #fff;
        }
        .card-text {
            color: #bbb;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "sistemareceitas";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "SELECT titulo, descricao FROM receitas";
    $result = $conn->query($sql);
    ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="home.php">Site de Receitas</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastro.php">Cadastrar Receita</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container mt-5">
        <h1>Receitas</h1>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row['titulo']) . '</h5>';
                    echo '<p class="card-text">' . nl2br(htmlspecialchars($row['descricao'])) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Nenhuma receita cadastrada ainda.</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
