    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $title; ?> List -> [ Job : <?= $user['task_name']; ?> , Shift : <?= $user['shift'] ?> ]</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" border="1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <!-- <th class="text-center" style="width: 10px">#</th> -->
                                <th class="text-center"><?= $title; ?> Name</th>
                                <th class="text-center">Dashboard</th>
                                <?php if ($this->session->userdata('shift') == 1) : ?>
                                    <th class="text-center">06-07</th>
                                    <th class="text-center">07-08</th>
                                    <th class="text-center">08-09</th>
                                    <th class="text-center">09-10</th>
                                    <th class="text-center">10-11</th>
                                    <th class="text-center">11-12</th>
                                    <th class="text-center">12-13</th>
                                    <th class="text-center">13-14</th>
                                <?php elseif ($this->session->userdata('shift') == 2) : ?>
                                    <th class="text-center">14-15</th>
                                    <th class="text-center">15-16</th>
                                    <th class="text-center">16-17</th>
                                    <th class="text-center">17-18</th>
                                    <th class="text-center">18-19</th>
                                    <th class="text-center">19-20</th>
                                    <th class="text-center">20-21</th>
                                    <th class="text-center">21-22</th>
                                <?php else : ?>
                                    <th class="text-center">22-23</th>
                                    <th class="text-center">23-00</th>
                                    <th class="text-center">00-01</th>
                                    <th class="text-center">01-02</th>
                                    <th class="text-center">02-03</th>
                                    <th class="text-center">03-04</th>
                                    <th class="text-center">04-05</th>
                                    <th class="text-center">05-06</th>
                                <?php endif ?>

                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($job as $cell) {
                                if (isset($total[$cell['name']]['jml'])) {
                                    $total[$cell['name']]['jml']++;
                                } else {
                                    $total[$cell['name']]['jml'] = 1;
                                }
                            }

                            $n = count($job);
                            $cekinstansi = "";
                            for ($i = 0; $i < $n; $i++) {

                                $this->db->select('sub_case.name');
                                $this->db->from('sub_case');
                                $this->db->where('sub_case.id', $cell['sub_case_id']);
                                $sub_case = $this->db->get()->row_array();

                                $cell = $job[$i];
                                echo '<tr>';
                                if ($cekinstansi != $cell['name']) {
                                    echo '<td class="text-center"' . ($total[$cell['name']]['jml'] > 1 ? ' rowspan="' . ($total[$cell['name']]['jml']) . '">' : '>') . $cell['name'] . '</td>';
                                    $cekinstansi = $cell['name'];
                                }
                                echo "<td class='text-center' >$sub_case[name]</td>";
                                for ($s = 0; $s <= 7; $s++) {
                                    echo "<td class='text-center'><input type='checkbox' name='value$s' ></td>";
                                }
                                echo '<td class="text-center"><a type="button" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a></td>';
                                echo "</tr>";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <button type="button" onClick="saveAlert()" class="btn btn-info float-right"><i class="fas fa-save"></i>&nbsp; Save</button>
                        <script type="text/javascript">
                        function saveAlert() 
                        {  
                        Swal.fire(
                        'Success!',
                        'data has been saved!',
                        'success'
                        )
                        }
                        </script>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalNote"><i class="fas fa-plus"></i>&nbsp; Note</button>
                    
                    <!-- modal add note -->
                    <div class="modal fade" id="modalNote" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalNote" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalNote">Noted if any Issue, Anomaly, & Etc </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Format note: "start time-end time" "note"</label>
                                    <textarea rows="7" cols="65" name="tentang"></textarea><br/> 
                                    <label>Example note: 04:00-15:00 PDAM (gangguan)</label> 
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                            </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </section>
    </div>