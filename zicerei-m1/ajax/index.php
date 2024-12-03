<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>primer1</title>
</head>
<script>
    function serverTime() {
        var request = new XMLHttpRequest ();
        request.onreadystatechange = function (){
            if (request.readyState == 4){
                if (request.status == 200){
                    var result = document.getElementById("MyId");
                    result.firstChild.nodeValue=request.responseText;
                }else document.write("Произошла ошибка oбнови страничку");
            }
        }
        var url = "mutime.php?MyTime=2";
        request.open("GET", url, true);
        request.send(null)
    }
</script>

<?php
echo '<h1 id = "MyId">Поле для времени</h1>';
echo '<p><button onclick="serverTime ()">Узнать время</button></p>';
?>