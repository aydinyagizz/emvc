<?php extract($data['aboutsDetails']); ?>
<!-- Page Content -->
<div class="container">



    <!-- Content Row -->
    <div class="row mt-5">

        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
            <h2><?= $abouts_title; ?></h2>
            <p><?= $abouts_content; ?></p>
        </div>

        <!-- Sidebar Column -->
        <div class="col-lg-3 mb-4">
            <div class="list-group">

                <?php foreach ($data['aboutsList'] as $abouts_list) : ?>
                <a href="/page/<?= $abouts_list['abouts_slug']; ?>" class="list-group-item"><?= $abouts_list['abouts_title']; ?></a>
                <?php endforeach; ?>

            </div>
        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
