<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VISUALIZAÇÂO DE GARÇONS | GERENTE</title>
  <link rel="stylesheet" href="../../../../assets/css/visualizar.css">
  <script src="https://kit.fontawesome.com/45923b0080.js" crossorigin="anonymous"></script>

  <?php
    require "../../../../conexao.php";

    $sql = "SELECT * FROM garcom";
    $result = mysqli_query($con, $sql);
  ?>
</head>
<body>
  <header>
    <a href="../opcoes.html" class="sair"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="logo"></div>
  </header>
  <main>
    <div class="section">
      <h1>Visualização de garçons</h1>
      <form action="busca.php" method="post" class="busca">
        <div class="input">
          <input type="text" name="busca" placeholder="Nome do garçom">
          <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
      </form>
      <table border="1px" class='table'>
        <thead>
          <th>ID</th>
          <th>NOME</th>
          <th>DATA DE NASCIMENTO</th>
          <th>EMAIL</th>
          <th>SEXO</th>
          <th>SENHA</th>
        </thead>
        <tbody>
          <?php
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                <td>{$row['id_garcom']}</td>
                <td>{$row['nome_garcom']}</td>
                <td>{$row['dataNascimento_garcom']}</td>
                <td>{$row['email_garcom']}</td>
                <td>{$row['sexo_garcom']}</td>
                <td>{$row['senha_garcom']}</td>
              </tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>