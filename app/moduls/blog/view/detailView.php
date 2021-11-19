<?php extract($data['blogsDetails']); ?>
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Blog Detayı
    </h1>


    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">
        <h1><?= $blogs_title; ?></h1>
            <hr>
            <p><?= $blogs_content; ?></p>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->