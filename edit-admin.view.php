<?php
require 'includes/header2.php';
require 'includes/nav.php';

require 'libs/edit_admin.php';
?>
<h2>Edit Admin</h2>
<?php
if (isset($success)) {
    echo '<div class="alert-success">' . $success . '</div><br/>';
}
?>

<form method="POST" action="edit-admin.view.php?id=<?php echo $_GET['id']; ?>" onsubmit="return validateRegisterForm()">

    <?php foreach ($persons as $person) : ?>
        <div class="form-group">
            <label for="email">Email:
                <?php
                if (isset($emailError)) {
                    echo $emailError;
                }
                ?>

            </label>
            <span id="userEmail-info" class="info"></span><br />
            <input type="text" class="form-control" id="user_email" value="<?= $person->email; ?>" onBlur="checkemailAvailability()" name="user_email">
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <span id="role-info" class="info"></span><br />
            <input type="text" class="form-control" id="role" value="<?= $person->role; ?>" name="role">
        </div>
        <div class="form-group">
            <label for="Date">New Password:
                <?php
                if (isset($error)) {
                    echo $error;
                }
                ?>
            </label>
            <span id="password-info" class="info"></span><br />
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="Date">Password Again:</label>
            <span id="repassword-info" class="info"></span><br />
            <input type="password" class="form-control" id="repassword" name="repassword">
        </div>
    <?php endforeach; ?>

    <button type="submit" name="edit_values" class="btn btn-open-box" id="sub">Submit</button>
    <a href="admin.view.php" type='button' name="cancel_" class="btn btn-warning">Cancel</a>
</form>



</div>

