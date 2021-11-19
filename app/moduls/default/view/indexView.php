<?php mainController::callView("inc", "slider", $data);
?>

<div class="container">

    <h1 class="my-4">Blog</h1>

    <div class="row">


        <?php foreach ($data['blogs'] as $blogs): ?>

            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="/images/blogs/<?= $blogs['blogs_file']; ?>"
                                     alt="<?= $blogs['blogs_title']; ?>"></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#"><?= $blogs['blogs_title']; ?></a>
                        </h4>
                        <p class="card-text">
                            <?php
                            if (strlen($blogs['blogs_content']) >= 100) { ?>
                                <?php echo substr($blogs['blogs_content'], 0, 100) . '...'; ?>
                            <?php } else {
                                echo($blogs['blogs_content']);
                            } ?>

                        </p>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
    <!-- /.row -->

    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-6">
            <?= $data['home_01_content'] ?>

        </div>
        <div class="col-lg-6">
            <img class="img-fluid rounded" src="/images/settings/<?= $data['home_01_file']; ?>" alt="">
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
        <div class="col-md-8">
            <p><?= $data['slogan']; ?></p>
        </div>
        <div class="col-md-4">
            <a class="btn btn-lg btn-secondary btn-block" href="<?= $data['slogan_url']; ?>">İncele</a>
        </div>
    </div>
</div>


<!-- /.container -->
