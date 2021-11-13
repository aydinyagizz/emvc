<div style="display: none" id="insertForm" class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Sayfa Ekle</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="box">

            <!-- /.box-header -->
            <div class="box-body no-padding">

                <form action="/nedmin/abouts/insert/aboutsInsertOp" method="post" enctype="multipart/form-data">


                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="abouts_title" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="abouts_slug">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sayfa İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea name="abouts_content" id="editor1"></textarea>
                            </div>
                        </div>
                    </div>

                    <script>
                        CKEDITOR.replace('editor1');
                    </script>

                    <div align="right" class="box-footer">
                        <button type="submit" class="btn btn-success" name="abouts_insert">Ekle</button>
                    </div>

                </form>

            </div>
            <!-- /.box-body -->
        </div>


    </div>
    <!-- /.box-body -->

</div>




<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Blog</h3>
        <div align="right">
            <button id="insertFormShow" class="btn btn-success">Sayfa Ekle</button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="box">

            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th>Sayfa Başlığı</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody id="sortable">
                        <?php
                        foreach ($data['abouts'] as $abouts) :
                            ?>

                            <tr id="item-<?= $abouts['abouts_id'] ?>">
                                <td class="sortable"><i style="margin-right: 7px;" class="fa fa-exchange"></i><?=$abouts['abouts_title']; ?></td>
                                <td width="10"><a href="/nedmin/abouts/update/<?= $abouts['abouts_id']; ?>"
                                                  title="düzenle"><i
                                                class="fa fa-pencil-square-o"></i></a></td>
                                <td width="10"><a href="/nedmin/abouts/delete/<?= $abouts['abouts_id']; ?>" title="sil" onclick="return confirm('<?= $abouts['abouts_title']; ?>'+' \'i silmek istiyor musunuz?');"><i class="fa fa-trash-o"></i></a></td>

                            </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>


    </div>
    <!-- /.box-body -->

</div>


<script type="text/javascript">
    $(function () {
        $('#sortable').sortable({
            revert: true,
            handle: ".sortable",
            stop: function (event, ui) {
                //tüm form verilerini serialize diyerek ajax ile gönderiyoruz.
                var data = $(this).sortable('serialize');
                $.ajax({
                    type: "POST",
                    data: data,
                    url: "/nedmin/abouts",
                    success: function (msg) {
                        if (msg) {
                            alertify.success("İşlem Başarılı.");
                        } else {
                            alertify.error("İşlem Tamamlanamadı.");
                        }
                    }
                });
            }
        });
        //işlemi sonlandırma
        $('#sortable').disableSelection();
    });

</script>


