<?php
require 'includes/header2.php';
require 'includes/nav.php';

require 'libs/edit_user.php';
?>
<h2>Edit User</h2>
<?php
if (isset($success)) {
    echo '<div class="alert-success">' . $success . '</div><br/>';
}
?>

<form method="POST" action="edit-user.view.php?UserID=<?php echo $_GET['UserID']; ?>" onsubmit="return validateRegisterForm()">

    <?php foreach ($persons as $person) : ?>

        <div class="form-group">
            <label for="firstName">FirstName:</label>
            <span id="firstname-info" class="info"></span><br />
            <input type="text" class="form-control" id="firstname" value="<?= $person->FirstName; ?>" name="FirstName">
        </div>
    
        <div class="form-group">
            <label for="lastName">LastName:</label>
            <span id="lastname-info" class="info"></span><br />
            <input type="text" class="form-control" id="lastname" value="<?= $person->LastName; ?>" name="LastName">
        </div>
    
        <div class="form-group">
            <label for="username">Username:</label>
            <span id="username-info" class="info"></span><br />
            <input type="text" class="form-control" id="username" value="<?= $person->Username; ?>" name="Username">
        </div>
        <div class="form-group">
            <label for="email">Email:
                <?php
                if (isset($error)) {
                    echo $error;
                }
                ?>

            </label>
            <span id="userEmail-info" class="info"></span><br />
            <input type="text" class="form-control" id="user_email" value="<?= $person->Email; ?>" onBlur="checkUserEmail()" name="user_email">
        </div>
    <?php endforeach; ?>

    <button type="submit" name="edit_values" class="btn btn-open-box" id="sub">Submit</button>
    <a href="user.view.php" type='button' name="cancel_" class="btn btn-warning">Cancel</a>
</form>



</div>

<?php require 'includes/footer.php'; ?>
