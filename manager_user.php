<?php include 'connection.php';
include 'check_admin.php'; ?>
<?php include 'menu.php'; ?>
<?php include 'head.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--
		seconds 
		1 min = 60 sec 
		15 min = 15*60 =900 
        30 min= 30*60 = 1800
        คั้งเวลาออกจากระบบเอง
	-->
    <meta http-equiv="refresh" content="1800;url=logout.php" />
    <style>
        @import 'https://fonts.googleapis.com/css?family=Kanit|Noto Serif Thai|Pridi|Taviraj|Maitree|Noto Serif Thai';

        .dataTables_filter {
            float: right !important;
            font-family: 'Kanit', sans-serif;

        }

        .dataTables_wrapper .dataTables_length {
            float: left !important;
            margin-left: 20px;
        }


        @media screen and (max-width: 600px) {
            .dataTables_filter {
                float: left !important;
                margin-left: 20px;
                font-family: 'Kanit', sans-serif;

            }
        }

        #dataTables_filter {
            font-family: 'Kanit', sans-serif;
            border-collapse: collapse;
            width: 1250px;
        }



        @media screen and (max-width:1024px) {
            #dataTables_filter {
                font-family: 'Kanit', sans-serif;
                border-collapse: collapse;
                width: auto;


            }
        }

        #dataTables_filter td,
        #dataTables_filter th {
            border: 1px solid #ddd;
            padding: 8px;
            font-family: 'Kanit', sans-serif;
        }

        #dataTables_filter tr:nth-child(even) {
            background-color: #fff;
            font-family: 'Kanit', sans-serif;
        }

        #dataTables_filter tr:hover {
            background-color: #ddd;
            font-family: 'Kanit', sans-serif;
        }

        #dataTables_filter th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #DD5A58;
            color: white;
            text-align: center;
            font-family: 'Kanit', sans-serif;

        }

        .cusrow {
            font-size: 14px;
            text-align: center;
            font-family: 'Kanit', sans-serif;
        }

        .A {
            font-family: 'Kanit', sans-serif;
            color: black;
        }

        .js-example-tags {
            width: 465px;
        }

        .modal.fade {
            font-family: 'Kanit', sans-serif;
        }
    </style>
    <br>
    <left>
        <div class="A"> <a href="home.php">      Home </a> | จัดการข้อมูลบุคลากร </div>

        <div class="mb-4">
        </div>
    </left>


</head>

<body>
    <?php
    //$sql="SELECT * FROM hr_person";
    $sql = "SELECT person.*,prefix.HR_PREFIX_NAME,department.HR_DEPARTMENT_NAME
 FROM hr_person as person 
 INNER JOIN  hr_prefix as prefix ON prefix.HR_PREFIX_ID = person.HR_PREFIX_ID
 INNER JOIN  hr_department as department  ON department.HR_DEPARTMENT_ID = person.HR_DEPARTMENT_ID
";
    $option = mysqli_query($con, "SELECT * FROM hr_prefix
 GROUP BY HR_PREFIX_ID  
 ORDER BY  HR_PREFIX_ID asc 
");
    $option2 = mysqli_query($con, "SELECT * FROM hr_department
 GROUP BY HR_DEPARTMENT_ID  
 ORDER BY  HR_DEPARTMENT_ID asc 
");
    $result = mysqli_query($con, $sql) or die("Error: " . mysqli_error($con));

    ?>


    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" ID="editmodal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" ID="exampleModalLabel">จัดการข้อมูลบุคลากร</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode_m_user.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="ID" id="ID">


                        <div class="form-group">
                            <label> เลขบัตรประชาชน </label>
                            <input type="text" name="HR_CID" id="HR_CID" class="form-control" placeholder="Enter First Name">
                        </div>

                        <div class="form-group">
                            <label> คำนำหน้า </label>
                            <!-- <input type="text" name="HR_PREFIX_ID" id="HR_PREFIX_ID" class="form-control" 
                            placeholder="Enter First Name"> -->



                            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


                            <select name="HR_PREFIX_ID" id="HR_PREFIX_ID" class="js-example-tags" required>
                                <option value="">None</option>
                                <?php foreach ($option as $results) { ?>
                                    <option value="<?php echo $results["HR_PREFIX_ID"]; ?>">
                                        <?php echo $results["HR_PREFIX_NAME"]; ?>
                                    </option>
                                <?php } ?>
                            </select>




                            <script>
                                $(".js-example-tags").select2({
                                    tags: true
                                });
                            </script>
                        </div>

                        <div class="form-group">
                            <label> ชื่อ </label>
                            <input type="text" name="HR_FNAME" id="HR_FNAME" class="form-control" placeholder="Enter First Name">
                        </div>

                        <div class="form-group">
                            <label> นามสกุล </label>
                            <input type="text" name="HR_LNAME" id="HR_LNAME" class="form-control" placeholder="Enter Last Name">
                        </div>

                        <div class="form-group">
                            <label> ชื่อกลุ่มงาน </label>
                            <!-- <input type="text" name="HR_DEPARTMENT_ID" id="HR_DEPARTMENT_ID" class="form-control" placeholder="Enter First Name"> -->




                            <select name="HR_DEPARTMENT_ID" id="HR_DEPARTMENT_ID" class="js-example-tags" required>
                                <option value="">None</option>
                                <?php foreach ($option2 as $results) { ?>
                                    <option value="<?php echo $results["HR_DEPARTMENT_ID"]; ?>">
                                        <?php echo $results["HR_DEPARTMENT_NAME"]; ?>
                                    </option>
                                <?php } ?>
                            </select>

                            <script>
                                $(".js-example-tags").select2({
                                    tags: true
                                });
                            </script>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <a  type="submit" name="updatedata" href="manager_user.php?act=success" class="btn btn-primary"> Update Data </a> -->
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                        <?php
                        $act = (isset($_GET['act']) ? $_GET['act'] : '');
                        if ($act == 'success') {
                            echo '<script type="text/javascript">
  					swal("", "บันทึกข้อมูลเรียบร้อยแล้ว", "success");
  					</script>';
                        } elseif ($act == 'info') {
                            echo '<script type="text/javascript">
  					swal("", "เกิดข้อผิดพลาด !!", "info");
  					</script>';
                        } elseif ($act == 'warning') {
                            echo '<script type="text/javascript">
  					swal("", "เกิดข้อผิดพลาด !!", "warning");
  					</script>';
                        } elseif ($act == 'danger') {
                            echo '<script type="text/javascript">
  					swal("", "เกิดข้อผิดพลาดร้ายแรง !!!", "error");
  					</script>';
                        }
                        ?>
                    </div>
                </form>


                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

                <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="dataTables_filter" class="table table-bordered">
            <thead class="thead-light">
                <tr style="font-size:14px">
                    <th>ลำดับ</th>
                    <th>เลขบัตรประชาชน</th>
                    <th>คำนำหน้า</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>ชื่อกลุ่มงาน</th>
                    <th>EDIT</th>
                    <!-- <th>delete</th> -->

                </tr>
            </thead>
            <tbody>

                <?php


                foreach ($result as $value) {

                ?>
                    <tr class="cusrow">
                        <td><?= $value['ID']; ?></td>
                        <td><?= $value['HR_CID']; ?></td>
                        <td><?= $value['HR_PREFIX_NAME']; ?></td>
                        <td><?= $value['HR_FNAME']; ?></td>
                        <td><?= $value['HR_LNAME']; ?></td>
                        <td><?= $value['HR_DEPARTMENT_NAME']; ?></td>
                        <td><button type="button" class="btn btn-primary editbtn"> EDIT </button></td>
                        <!-- <td><button type="button" class="btn btn-danger deletebtn"> DELETE </button></td>  -->
                    </tr>
                <?php
                }
                ?>


            </tbody>
        </table>
    </div>

    </div>

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            var t = $('#dataTables_filter').DataTable({
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                    "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                    "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                    "sSearch": "ค้นหา :",
                    "sColumnDefs": "วัน เดือน ปี,ชั่วโมง:นาที:วินาที"
                },
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,

                "columnDefs": [{

                    "targets": 0
                }],

                "order": [
                    [5, 'asc']
                ],
                pageLength: -1,
                lengthMenu:

                    [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'ทั้งหมด']

                    ]
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $('.editbtn').on('click', function() {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#ID').val(data[0]);
                $('#HR_CID').val(data[1]);
                $('#HR_PREFIX_NAME').val(data[2]);
                $('#HR_FNAME').val(data[3]);
                $('#HR_LNAME').val(data[4]);
                $('#HR_DEPARTMENT_NAME').val(data[5]);
            });
        });
    </script>

    </ /?php include 'footer.php' ; ?>

</body>




</html>