<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VISUALIZAÇÂO DE CONTAS | GARÇOM</title>
  <link rel="stylesheet" href="../../../../assets/css/visualizar.css">
  <script src="https://kit.fontawesome.com/45923b0080.js" crossorigin="anonymous"></script>

  <?php
    require "../../../../conexao.php";

    $nome = $_POST['busca'];

    $sql = "SELECT * FROM conta WHERE num_mesa_conta like '$nome'";
    $result = mysqli_query($con, $sql);
  ?>
</head>
<body>
  <header>
    <a href="../inicio.php" class="sair"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="logo"></div>
  </header>
  <main>
    <div class="section">
      <h1>Visualização de contas</h1>
      <form action="busca.php" method="post" class="busca">
        <div class="input">
          <input type="text" name="busca" placeholder="Nome do produto">
          <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
      </form>
      <table border="1px" class='table'>
        <thead>
          <th>NÚMERO DA MESA</th>
          <th>PRODUTOS</th>
          <th>ESTADO</th>
        </thead>
        <tbody>
          <?php
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                  <td>{$row['num_mesa_conta']}</td>
                  <td>";
                
                $sql = "SELECT * FROM mesa WHERE num_mesa = {$row['num_mesa_conta']}";
                $result1 = mysqli_query($con,$sql);
  
                while ($row1=mysqli_fetch_assoc($result1)) {
                  $sql = "SELECT * FROM produto WHERE id_produto = {$row1['id_produto_mesa']}";
                  $result2 = mysqli_query($con,$sql);
  
                  while ($row=mysqli_fetch_assoc($result2)) {
                    echo "{$row1['quantidade_produto_mesa']}x - {$row['nome_produto']}<br>";
                  }
                }
                
                echo "</td><td>ABERTA</td></tr>";
              }
            } else {
              echo "<script>alert('Número da mesa não encontado, tente outro!'); location.href = 'visualizar.php'</script>";
            }
          ?>
        </tbody>
      </table>

      <button onclick="voltar()" style='margin-top: 1rem; padding: 10px; cursor: pointer;'>Mostrar todos</button>
    </div>
  </main>
  <script defer>
    function voltar() {
      location.href = 'visualizar.php';
    }
  </script>
</body>
</html>