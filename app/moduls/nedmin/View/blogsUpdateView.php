<!--extract fonksiyonuna gelen data değerini verirsek artık bu fonksiyon içindeki anahtar değerleri birer değişkene dönüştürür.
ve ekrana basınca da iki boyutlu dizi gibi değil de tek değişken olarak basabiliriz. -->
<?php extract($data['blogsUpdate']);
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Blog Düzenle</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="box">

            <!-- /.box-header -->
            <div class="box-body no-padding">


                <form action="/nedmin/blogs/update/blogsUpdateOp" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Yüklü Resim</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img width="200" src="/images/blogs/<?= $blogs_file; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="blogs_file">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="blogs_title" required
                                       value="<?= $blogs_title; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="blogs_slug" required
                                       value="<?= $blogs_slug; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Blog İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea name="blogs_content" id="editor1"><?= $blogs_content; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <script>
                        CKEDITOR.replace('editor1');
                    </script>


                    <input type="hidden" name="blogs_id" value="<?= $blogs_id; ?>">
                    <input type="hidden" name="delete_file" value="<?= $blogs_file; ?>">


                    <div align="right" class="box-footer">
                        <button type="submit" class="btn btn-success" name="blogs_update">Düzenle</button>
                    </div>

                </form>
            </div>

        </div>


    </div>

</div>


