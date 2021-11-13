<!--extract fonksiyonuna gelen data değerini verirsek artık bu fonksiyon içindeki anahtar değerleri birer değişkene dönüştürür.
ve ekrana basınca da iki boyutlu dizi gibi değil de tek değişken olarak basabiliriz. -->
<?php extract($data['aboutsUpdate']);
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Sayfa Düzenle</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="box">

            <!-- /.box-header -->
            <div class="box-body no-padding">


                <form action="/nedmin/abouts/update/aboutsUpdateOp" method="post" enctype="multipart/form-data">


                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="abouts_title" required
                                       value="<?= $abouts_title ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="abouts_slug"
                                       value="<?= $abouts_slug ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sayfa İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea name="abouts_content" id="editor1"><?= $abouts_content ?>"</textarea>
                            </div>
                        </div>
                    </div>

                    <script>
                        CKEDITOR.replace('editor1');
                    </script>

                    <input type="hidden" name="abouts_id" value="<?= $abouts_id; ?>">


                    <div align="right" class="box-footer">
                        <button type="submit" class="btn btn-success" name="abouts_update">Düzenle</button>
                    </div>

                </form>
            </div>

        </div>


    </div>

</div>


