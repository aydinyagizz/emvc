<div style="display: none" id="insertForm" class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Yönetici Ekle</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="box">

            <!-- /.box-header -->
            <div class="box-body no-padding">

                <form action="/nedmin/admins/insert/adminsInsertOp" method="post" enctype="multipart/form-data">


                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" required type="file" name="admins_file">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="admins_namesurname" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kullanıcı Adı</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="admins_username" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kullanıcı Şifre</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="admins_pass">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kullanıcı Durum</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select class="form-control" name="admins_status">
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div align="right" class="box-footer">
                        <button type="submit" class="btn btn-success" name="admins_insert">Ekle</button>
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
        <h3 class="box-title">Yöneticiler</h3>
        <div align="right">
            <button id="insertFormShow" class="btn btn-success">Yönetici Ekle</button>
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
                        <th>Ad Soyad</th>
                        <th>Kullanıcı Adı</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody id="sortable">
                        <?php
                        foreach ($data['admins'] as $admins) :
                            ?>

                            <tr id="item-<?= $admins['admins_id'] ?>">
                                <td class="sortable"><i style="margin-right: 7px;" class="fa fa-exchange"></i><?=$admins['admins_namesurname']; ?></td>
                                <td><?= $admins['admins_username']; ?></td>
                                <td width="10"><a href="/nedmin/admins/update/<?= $admins['admins_id']; ?>"
                                                  title="düzenle"><i
                                                class="fa fa-pencil-square-o"></i></a></td>
                                <td width="10"><a href="/nedmin/admins/delete/<?= $admins['admins_id']; ?>" title="sil" onclick="return confirm('<?= $admins['admins_namesurname']; ?>'+' kişisini silmek istiyor musunuz?');"><i class="fa fa-trash-o"></i></a></td>

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
                    url: "/nedmin/admins",
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


