<?php

$sql = 'SELECT id, genre FROM genres';
$result = $pdo->query('SELECT * FROM genres'); // метод query; так как не передаются переменные, используется метод query, а результат помещен в переменную $result
//$result = $pdo->query('SELECT * FROM movies');
/*$result = $pdo->query($sql); - оригинальный код запроса, не работает*/

while($row = $result->fetch(PDO::FETCH_OBJ) ): //циклом while генерируем разметку
    ?>
    <option value=<?php echo $row->id; ?>><?php echo
    $row->genre; ?></option>
<?php endwhile; ?>
