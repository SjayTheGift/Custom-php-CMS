<?php
include_once 'includes/header.php';
include_once 'includes/nav.php';
?>





                    <h2>Create new Post</h2>

                    <form method="post" id="form" action="CreatePost.php" role="form">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="title" class="cal">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Slug" class="cal">Slug</label>
                                    <select class="form-control" id="slug" name="slug">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Image" class="cal">Image</label>
                                <input type="file" name="image"/>
                            </div>
                        </div>
                        <textarea class="textarea" placeholder="Place some text here" name="body"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">

                        </textarea>
                        <div class="form-check">

                            <input type="checkbox" class="form-check-input" id="published" name="published">
                            <label for="Image" class="cal">Publish</label>
                        </div>

                        <div class="btn btn-sm btn-danger">Submit</div>
                    </form>
                </div>
<?php require 'includes/footer.php'; ?>