<?
function show_categories(){
    include "bdconnect.php";
    $sql="SELECT * FROM categories";
    $result = mysqli_query($link, $sql) or die("Query failed");
    while ( $row=mysqli_fetch_array($result)){
        $array_category[$row["id_cat"]]=$row["category"];
    };
    $str="";
    foreach($array_category as $key => $value){
        $str=$str. "<option value='".$key."'>".$value."</option>";
    }
    return $str;
}
?>
<?
function show_tovars(){
    include "bdconnect.php";
    var_dump($_POST);
    $sql="SELECT id, name, category, cena, kol, srok, img FROM tovars, categories WHERE tovars.id_cat=categories.id_cat";
    
    $category=$_POST["category"];

    if(isset($_POST["filtr"])){
    if($category=="Все")
    $sql="SELECT id, name, category, cena, kol, srok, img FROM tovars, categories
    WHERE tovars.id_cat=categories.id_cat";
    else
    
    $sql="SELECT id, name, category, cena, kol, srok, img FROM tovars, categories
    WHERE tovars.id_cat=categories.id_cat 
    AND categories.id_cat=$category ORDER BY cena";
    }
    if(isset($_POST["sort"])){
        $cena=$_POST["cena"];
        if($cena=="0")
        $sql="SELECT id, name,category, cena, kol, srok FROM tovars,categories
        WHERE tovars.id_cat=categories.id_cat";
        if($cena=="min")
        $sql="SELECT id, name,category, cena, kol, srok
        FROM tovars,categories WHERE tovars.id_cat=categories.id_cat
        ORDER BY cena ";
        if($cena=="max")
        $sql="SELECT id, name,category, cena, kol, srok
        FROM tovars,categories WHERE tovars.id_cat=categories.id_cat
        ORDER BY cena DESC";
        }
        /*
        if(isset($_POST["search"])){
    
            $name=$_POST["name"];
            $sql="SELECT id, name, category, cena, kol, srok FROM tovars, categories WHERE
            tovars.id_cat=categories.id_cat AND name LIKE '%$name%'";
        }*/

    $result = mysqli_query($link, $sql) or die("Query failed");
    $str="";
    while ( $row=mysqli_fetch_array($result)){
        $str=$str. "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["name"]."</td>
        <td>".$row["category"]."</td>
        <td>".$row["cena"]."</td>
        <td>".$row["kol"]."</td>
        <td>".$row["srok"]."</td>
        <td><img src='images/".$row["img"]."'></td>
        <td><a href='tovar.php?id=" .$row["id"]."'>Подробнее</a></td>
        <td><input type='checkbox' name='id[]' value='".$row["id"]."'></td>
        </tr>";
    };
    echo $str;
}
function categories(){
    include "bdconnect.php";
    $sql="SELECT * FROM categories";
    $result = mysqli_query($link,$sql) or die("Query failed");
    while( $row=mysqli_fetch_array($result)){
    $array_category[$row["id_cat"]]=$row["category"];
    };
    $str="";
    foreach($array_category as $key => $value){
    $str=$str. "<p name='".$key."' >".$value."</p>";
    }
    return $str;
    }
    function show_orders($id){
        include "bdconnect.php";
        $sql="SELECT id_order, id_tovar, datatime, tovars.name, quantity, cost FROM orders,
        tovars WHERE orders.id_tovar=tovars.id AND orders.id=$id";
        echo $sql;
        $result = mysqli_query($link,$sql) or die("Query failed");
        $str="";
        while( $row=mysqli_fetch_array($result)){
        $str=$str."<tr>
        <td>".$row["id_order"]."</td>
        <td>".$row["datatime"]."</td>
        <td>".$row["name"]."</td>
        <td>".$row["quantity"]."</td>
        <td>".$row["cost"]."</td>
        <td>".$stoim=$row["quantity"]*$row["cost"]."</td>
        <td><a href='tovar.php?id=".$row["id_tovar"]."'>Подробнее</a></td>
        </tr>";
        };
        echo $str;
        }
?>