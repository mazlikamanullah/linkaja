<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?= form_error('sub_case', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-default">Add Job</button>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?> List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Task</th>
                                    <th>Case</th>
                                    <th>Sub Case</th>
                                    <th style="width: 115px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($job as $scs) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $scs['task_id']; ?></td>
                                        <td><?= $scs['case_id']; ?></td>
                                        <td><?= $scs['sub_case_id']; ?></td>
                                        <td class="text-center">
                                            <a type="button" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('admin/job/delete/' . $scs['id']); ?>" type="button" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Jobs</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/job') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Task</label>
                        <select name="task" class="form-control select2bs4" style="width: 100%;">
                            <option selected disabled>Select Task..</option>
                            <?php foreach ($task as $t) : ?>
                                <option value="<?= $t['id_task']; ?>"><?= $t['task_name']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <label for="name">Case</label>
                        <select name="case" class="form-control select2bs4" style="width: 100%;">
                            <option selected disabled>Select Case..</option>
                            <?php foreach ($case as $case) : ?>
                                <option value="<?= $case['id']; ?>"><?= $case['name']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <label for="name">Sub Case</label>
                        <select name="sub_case" class="form-control select2bs4" style="width: 100%;">
                            <option selected disabled>Select Sub Case..</option>
                            <?php foreach ($sub_case as $sc) : ?>
                                <option value="<?= $sc['id']; ?>"><?= $sc['name']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>