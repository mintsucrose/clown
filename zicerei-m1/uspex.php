<?php
$i=0;
$i=$_GET["i"];
if($i==1) $st="Данные успешно добавленны";
if($i==2) $st="Записи успешно удалены";
if($i==3) $st="Записи успешно обновлены";
?>
<style>
    body{
    
    background: linear-gradient(100deg, #DB7093, #556B2F);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      font-family: 'Roboto', sans-serif;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 100px 600px;
  }
  .input-box{
      display: block;
    font-weight: 500;
    margin-bottom: 5px;
    margin-top: 0px;
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    padding-left: 15px;
  
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
<table class="container"border=0 width=100%>
    <tr align=center>
        <td>
        <H4 class="input-box">
        <?php echo $st ?></h4>
        <a href="index.php">На главную</a>
    </td>
</tr>
</teble>
        
