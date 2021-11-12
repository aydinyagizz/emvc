<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Yöneticiler</h3>
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
                                <td class="sortable"><i class="fa fa-exchange"></i><?= " ". $admins['admins_namesurname']; ?></td>
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


