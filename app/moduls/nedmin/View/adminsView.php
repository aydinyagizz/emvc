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

                    <tbody>
                    <?php
                    foreach ($data['admins'] as $admins) :
                        ?>
                        <tr>
                            <td><?= $admins['admins_namesurname']; ?></td>
                            <td><?= $admins['admins_username']; ?></td>
                            <td width="10"><a href="/nedmin/settings/update/<?= $adminSettings['settings_id']; ?>"
                                              title="düzenle"><i
                                            class="fa fa-pencil-square-o"></i></a></td>
                            <td width="10"><a href="#" title="sil"><i class="fa fa-trash-o"></i></a></td>
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


