<? include "func.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>склад товаров -> добавление товаров</title>
    <style type="text/css">
        body{
    
  background: linear-gradient(100deg, #DB7093, #556B2F);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    font-family: 'Roboto', sans-serif;
    align-items: center;
    justify-content: center;
    text-align: center;
}
.input-box{
    display: block;
  font-weight: 500;
  margin-bottom: 5px;
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;

}
.container {
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px ;
  border-radius: 20px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
}
        </style>
</head>
<body>
    <form action="insert_tovars.php" method="post" name="form1" enctype="multipart/form-data" class="container">
    
        Название товара<input class="input-box" type="text" name="name"/> <br>

        Категория товара 
        <select name="category" class="input-box">
            <? echo show_categories();
            ?>
            </select><br>

        Цена товара <input  class="input-box" type="text" name="cena"/><br>

        Колличество <input class="input-box" type="number" name="kol"/><br>

    
        Срок годности <input class="input-box" type="date" name="srok"/><br>

    
        Изображение <input class="input-box" type="file" name="filename"/><br>

    
        <input type="submit" name="insert" value="Добавить" class="input-box"></td></tr>

</form> 
</body>
</html>