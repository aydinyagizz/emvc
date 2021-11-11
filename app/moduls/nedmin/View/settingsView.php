<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ayarlar</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="box">

            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th>Açıklama</th>
                        <th>İçerik</th>
                        <th>Anahtar Değer</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    foreach ($data['adminSettings'] as $adminSettings) :
                        ?>
                        <tr>
                            <td><?= $adminSettings['settings_description']; ?></td>

                            <td><?php
                                if ($adminSettings['settings_type'] == "file") { ?>
                                    <img src="/images/settings/<?= $adminSettings['settings_value']; ?>"
                                         style="width: 200px;">
                                <?php } else {
                                    echo $adminSettings['settings_value'];
                                } ?> </td>

                            <td><?= $adminSettings['settings_key']; ?></td>
                            <td><a href="/nedmin/settings/update/<?= $adminSettings['settings_id']; ?>" title="düzenle"><i
                                            class="fa fa-pencil-square-o"></i></a></td>
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


