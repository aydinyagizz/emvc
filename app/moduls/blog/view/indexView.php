<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Blog
        <small>Bloglar Listelendi</small>
    </h1>


    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

            <?php foreach ($data['blogs'] as $blogs) : ?>

                <!-- Blog Post -->
                <div class="card mb-4">
                    <img height="400" class="card-img-top" src="/images/blogs/<?= $blogs['blogs_file']; ?>"
                         alt="<?= $blogs['blogs_title']; ?>">
                    <div class="card-body">
                        <h2 class="card-title"><?= $blogs['blogs_title']; ?></h2>
                        <p class="card-text">

                            <?php

                            if (strlen($blogs['blogs_content']) >= 280) { ?>
                                <?php echo substr($blogs['blogs_content'], 0, 280) . '...'; ?>
                            <?php } else {
                                echo ($blogs['blogs_content']);
                            } ?>
                        </p>

                        <a href="/blog/<?= $blogs['blogs_id']; ?>" class="btn btn-primary">Devamını Oku &rarr;</a>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->