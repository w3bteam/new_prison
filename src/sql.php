	<?php
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "root", "1234","testdb");

if ($link == false){
    printf("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
   // printf("Соединение установлено успешно.\n");
}
?>