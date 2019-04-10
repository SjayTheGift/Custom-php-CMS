<?php

require 'libs/userLib.php';

require 'includes/header.php';
require 'includes/nav.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users Tables</h3>
                    <?php
                    if (isset($success)) {
                        echo '<div class="alert-success">' . $success . '</div><br/>';
                    }
                    ?>
                    <form class="form-inline md-form mr-auto mb-4" method="Get">
                        <input class="form-control mr-sm-2" type="text" aria-label="Search" name="search" id="search" placeholder="Search" />
                        <button class="btn btn-elegant btn-rounded btn-sm my-0" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </form>
                    <BR/>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table id="memListTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr class="header">
                                <th>ID</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="show_up">

                            <?php
                            if (isset($_GET['search'])) {
                                $persons = $pdo->searchData('admin_users', $_GET['search']);
                            }
                            ?>


                            <?php foreach ($persons as $person) : ?>
                                <tr>
                                    <td><?= $person->UserID; ?></td>
                                    <td><?= $person->FirstName; ?></td>
                                    <td><?= $person->LastName; ?></td>
                                    <td><?= $person->Username; ?></td>
                                    <td><?= $person->Email; ?></td>
                                    <td><?= $person->CreatedAt; ?></td>
                                    <td><?= $person->UpdatedAt; ?></td>
                                    <td>
                                        <!-- <a type='button' class="btn btn-warning" href="edit-person.view.php">Edit</a>-->
                                        <a type='button' class="btn btn-warning" href="edit-user.view.php?UserID=<?= $person->UserID; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a id="delete"  href="user.view.php?delete=<?php echo $person->UserID; ?>" type='button' class='btn btn-danger'><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                    
                    
                    <nav aria-label="Page navigation">
                        <ul class="pagination">

                            <li><a href='user.view.php?page=<?php echo $page-1; ?>' aria-label="Previous"><span aria-hidden="true">&laquo; Previous</span></a></li>
                            
                            <?php for ($i = 1; $i <= $pages; $i++): ?>
                                   <?php if ($i == 1): ?>
                            <li id="<?php echo $i; ?>"><a href='user.view.php?page=<?php echo $i; ?>'><?php echo $i; ?></a></li> 
                                    <?php else: ?>
                            <li id="<?php echo $i; ?>"><a href='user.view.php?page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
                                    <?php endif; ?>		
                            <?php endfor; ?> 
                            
                            <li><a href='user.view.php?page=<?php echo $page+1; ?>' aria-label="Next"><span aria-hidden="true">Next &raquo;</span></a></li>
                        </ul>
                    </nav>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div><!-- /.row -->
</div><!-- /.container-fluid -->



</div>

<?php require 'includes/footer2.php';?>