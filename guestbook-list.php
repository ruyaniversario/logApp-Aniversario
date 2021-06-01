<?php
    require('config/config.php');
    require('config/db.php');

    session_start();
    $person = mysqli_query($conn, "SELECT * FROM PERSON");

?>

<?php include('inc/header.php'); ?>
	<div class="container">
    <br/>
		<h2>Person's Log</h2>
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Log Date and Time</th>
                    </tr>
                </thead>
		
			<div class="well">
                <tbody>
                <?php foreach($person as $PERSON) : ?>
                    <tr>
                    <td><?php echo $PERSON['pid'];?></td>
                    <td><?php echo $PERSON['lastname'];?></td>
                    <td><?php echo $PERSON['firstname'];?></td>
                    <td><?php echo $PERSON['address'];?></td>
                    <td><?php echo $PERSON['logdt'];?></td>
                    </tr>
                <?php endforeach; ?>   
                </tbody>
            </div>
        </table>
        <br/>

            <button type="button" class="btn btn-dark btn-sm" onclick="document.location='guestbook-logout.php'">Logout</button>
            <button type="button" class="btn btn-dark btn-sm" onclick="document.location='index.php'">Add</button>
</div>
<?php include('inc/footer.php'); ?>