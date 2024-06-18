<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Receitas</title>
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
        .form-control {
            background-color: #444;
            border: none;
            color: #fff;
        }
        .form-control:focus {
            background-color: #555;
            color: #fff;
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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];

        $sql = "INSERT INTO receitas (titulo, descricao) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $titulo, $descricao);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success mt-4' role='alert'>";
            echo "Receita cadastrada com sucesso!<br>";
            echo "<strong>Título:</strong> " . htmlspecialchars($titulo) . "<br>";
            echo "<strong>Descrição:</strong> " . nl2br(htmlspecialchars($descricao));
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger mt-4' role='alert'>";
            echo "Erro ao cadastrar a receita: " . $stmt->error;
            echo "</div>";
        }

        $stmt->close();
    }

    $conn->close();
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
        <h1>Cadastrar Receita</h1>
        <form action="cadastro.php" method="POST">
            <div class="form-group">
                <label for="titulo">Título da Receita</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>
