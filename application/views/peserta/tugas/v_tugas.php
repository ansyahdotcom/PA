
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $tittle; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $tittle; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

<?php 
$id_tugas=$tugas['ID_TG'];
$detail = $this->db->get_where('detil_tugas', ['ID_TG' => $id_tugas])->row_array();?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center"><?=$tugas['NM_TG']?></h4>
                </div>
                <div class="card-body px-5">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <p class="text-justify">
                            <?=$tugas['DETAIL_TG']?>
                            </p>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <?php if($detail == null){?>
                                        <td class="text-right">Status pengumpulan :</td>
                                        <td><span class="badge badge-pill badge-primary">Belum mengumpulkan</span></td>
                                        <?php }else{ ?>
                                        <td class="text-right">Status pengumpulan :</td>
                                        <td><span class="badge badge-pill badge-success"><?=$detail['STATUS']?></span></td>
                                        <?php }?>
                                    </tr>
                                    <tr>
                                    <?php if($detail == null){?>
                                        <td class="text-right">Waktu Pengumpulan :</td>
                                        <td>--</td>
                                        <?php }else{ ?>
                                        <td class="text-right">Waktu Pengumpulan :</td>
                                        <td><?=$detail['TIME_DT_TG']?></td>
                                        <?php }?>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Deadline Tugas :</td>
                                        <td><?=$tugas['DEADLINE']?></td>
                                    </tr>
                                    <tr>
                                    <?php if($detail == null){?>
                                        <td class="text-right">File Tugas :</td>
                                        <td><a href="#">--</a></td>
                                        <?php }else{ ?>
                                        <td class="text-right">File Tugas :</td>
                                        <td><a href="<?=base_url()?>peserta/tugas/file/<?=$detail['FILE_DT_TG']?>">Link Tugas</a></td>
                                        <?php }?>
                                    </tr>

                                </tbody>
                            </table>
                            <?php if($detail == null){?>
                            <div class="text-center">
                                <a class="btn btn-info" href="<?=base_url()?>peserta/tugas/submit/<?=$tugas['ID_TG']?>" role="button">Submit Tugas</a>
                            </div>
                            <?php }else{ ?>
                            <div class="text-center">
                                <a class="btn btn-info" href="<?=base_url()?>peserta/tugas/edit/<?=$tugas['ID_TG']?>" role="button">Edit Tugas</a>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>