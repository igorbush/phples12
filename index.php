<?php 
require_once 'getdb.php';
if (!empty($_GET['isbn']) OR !empty($_GET['name']) OR !empty($_GET['author']) OR !empty($_GET['year'])) {
	$sql = "SELECT * FROM books WHERE (isbn LIKE :isbn) AND (year LIKE :year) AND (name LIKE :name) AND (author LIKE :author)";
	$res = $dbh->prepare($sql);
	$res->bindParam(':isbn', $isbn);
	$res->bindParam(':year', $year);
	$res->bindParam(':name', $name);
	$res->bindParam(':author', $author);
	$isbn = "%" . strip_tags($_GET['isbn']) . "%";
	$year = "%" . strip_tags($_GET['year']) . "%";
	$name = "%" . strip_tags($_GET['name']) . "%";
	$author = "%" . strip_tags($_GET['author']) . "%";
	$res->execute();
	$data = $res->fetchAll(PDO::FETCH_ASSOC);
} else {
	$sql = "SELECT * FROM books";
	$data = $dbh->query($sql);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<form action="index.php" method="GET" class="form-inline">
			
				<input type="text" name="isbn" placeholder="ISBN" value="<?php if (!empty($_GET['isbn'])) {echo $_GET['isbn'];} ?>" class="form-control mb-2">
				<input type="text" name="name" placeholder="Название книги" value="<?php if (!empty($_GET['name'])) {echo $_GET['name'];} ?>" class="form-control mb-2">
				<input type="text" name="author" placeholder="Автор" value="<?php if (!empty($_GET['author'])) {echo $_GET['author'];} ?>" class="form-control mb-2">
				<input type="text" name="year" placeholder="Год" value="<?php if (!empty($_GET['year'])) {echo $_GET['year'];} ?>" class="form-control mb-2">
				<input type="submit" class="btn btn-primary mb-2">
	
			</form>
			<table class="table table-bordered table-sm">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Название</th>
						<th scope="col">Автор</th>
						<th scope="col">Год выпуска</th>
						<th scope="col">Жанр</th>
						<th scope="col">ISBN</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $row): ?>
					<tr>
						<td><?= $row['name'] ?></td>
						<td><?= $row['author'] ?></td>
						<td><?= $row['year'] ?></td>
						<td><?= $row['genre'] ?></td>
						<td><?= $row['isbn'] ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>