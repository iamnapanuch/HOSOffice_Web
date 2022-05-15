<?php include 'connection.php';
include 'check_user.php';
?>
<?PHP include 'menu.php' ?>
<?PHP include 'head.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="1800;url=logout.php" />
    <br>

    <style>
        @import 'https://fonts.googleapis.com/css?family=Kanit|Noto Serif Thai|Pridi|Taviraj|Maitree|Noto Serif Thai';

        .dataTables_filter {
            float: right !important;
            font-family: 'Kanit', sans-serif;
        }

        div.n {
            color: #229954;

        }

        div.f {
            color: #D6B22A;

        }

        div.s {
            color: #F95508;

        }

        div.sf {
            color: #F41A10;

        }

        .dataTables_filter {
            float: right !important;

        }

        .dataTables_wrapper .dataTables_length {
            float: left !important;
            margin-left: 20px;
            font-family: 'Kanit', sans-serif;
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
        }

        #dataTables_filter tr:hover {
            background-color: #ddd;
        }

        #dataTables_filter th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: right;
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

        .table-responsive {
            width: auto;
            text-align: center;
            font-family: 'Kanit', sans-serif;
        }
    </style>
    <br>
    <left>
        <div class="A"> <a href="home.php">      Home </a> | ระบบงานสารบรรณ </div>
        <div class="mb-4">
        </div>
    </left>
</head>

<body>
    <?php

    $sql = "SELECT b_in.*,b_urg.URGENT_NAME,b_t.BOOK_TYPE_NAME,b_yr.BOOK_YEAR_NAME
FROM book_index AS b_in
INNER JOIN book_type AS b_t ON b_t.BOOK_TYPE_ID = b_in.BOOK_TYPE_ID
INNER JOIN book_urgent AS b_urg ON b_urg.URGENT_ID = b_in.BOOK_URGENT_ID
INNER JOIN book_year AS b_yr ON b_yr.BOOK_YEAR_ID = b_in.BOOK_YEAR_ID
WHERE b_in.BOOK_YEAR_ID>='2564' "; // >= 2564 คือ ดูตั้งแต่ปี 64 จนถึงปีปัจจุบัน ถ้าอยากดูปีที่เก่ากว่า ใช้ <= เช่น  WHERE b_in.BOOK_YEAR_ID<='2558'
    $result = mysqli_query($con, $sql);

    ?>



    <div class="table-responsive">
        <table id="dataTables_filter" class="table">
            <thead class="thead-light">
                <tr>
                    <th>ลำดับ</th>
                    <th style='width:11%'>เลขหนังสือ</th>
                    <th>วันที่หนังสือ</th>
                    <th>ความเร่งด่วน</th>
                    <th style='width:11%'>ประเภทหนังสือ</th>
                    <th style='width:11%'>ชื่อหนังสือ</th>
                    <!-- <th style='width:11%'>รายละเอียด</th> -->
                    <th style='width:11%'>ปีหนังสือ</th>
                    <th>ปุ่ม</th>
                </tr>
            </thead>
            <tbody>


                <?php

                while ($row = mysqli_fetch_array($result)) {
                    if ($row['URGENT_NAME'] == 'ปกติ') {

                ?>
                        <tr class="cusrow">
                            <td><?= $row['ID']; ?></td>
                            <td><?= $row['BOOK_NUMBER']; ?></td>
                            <td><?= $row['BOOK_DATE']; ?></td>
                            <td>
                                <div class='n'><?= $row['URGENT_NAME']; ?>
                            </td>
                            <td><?= $row['BOOK_TYPE_NAME']; ?></td>
                            <td><?= $row['BOOK_NAME']; ?></td>
                            <td><?= $row['BOOK_YEAR_NAME']; ?></td>
                            <td><a class="btn btn-primary " href="/h/documents/bookin/<?php echo $row['ID']; ?>.pdf" target="_blank">กดอ่าน</a>
                                <!-- <td><a class="btn btn-primary " href="http://192.168.2.13/hosoffice/documents/bookin/<?php echo $row['ID']; ?>.pdf" target="_blank">กดอ่าน</a>  -->
                            </td>

                        </tr>
                    <?php
                    }




                    if ($row['URGENT_NAME'] == 'ด่วน') {
                    ?>
                        <tr class="cusrow">
                            <td><?= $row['ID']; ?></td>
                            <td><?= $row['BOOK_NUMBER']; ?></td>
                            <td><?= $row['BOOK_DATE']; ?></td>
                            <td>
                                <div class='f'><?= $row['URGENT_NAME']; ?>
                            </td>
                            <td><?= $row['BOOK_TYPE_NAME']; ?></td>
                            <td><?= $row['BOOK_NAME']; ?></td>
                            <td><?= $row['BOOK_YEAR_NAME']; ?></td>
                            <td><a class="btn btn-primary " href="http://192.168.2.13/hosoffice/documents/bookin/<?php echo $row['ID']; ?>.pdf" target="_blank">กดอ่าน</a>
                                <!-- <td><a href="ftp:\\192.168.2.13\documents\bookin\<//?php echo $row['ID'];?>" target="_blank" class="btn btn-info btn-sm"> เปิดดู </a></td>  -->
                            </td>

                        </tr>
                    <?php
                    }





                    if ($row['URGENT_NAME'] == 'ด่วนมาก') {
                    ?>
                        <tr class="cusrow">
                            <td><?= $row['ID']; ?></td>
                            <td><?= $row['BOOK_NUMBER']; ?></td>
                            <td><?= $row['BOOK_DATE']; ?></td>
                            <td>
                                <div class='s'><?= $row['URGENT_NAME']; ?>
                            </td>
                            <td><?= $row['BOOK_TYPE_NAME']; ?></td>
                            <td><?= $row['BOOK_NAME']; ?></td>
                            <td><?= $row['BOOK_YEAR_NAME']; ?></td>
                            <td><a class="btn btn-primary " href="http://192.168.2.13/hosoffice/documents/bookin/<?php echo $row['ID']; ?>.pdf" target="_blank">กดอ่าน</a>
                                <!-- <td><a href="ftp:\\192.168.2.13\documents\bookin\<//?php echo $row['ID'];?>" target="_blank" class="btn btn-info btn-sm"> เปิดดู </a></td>  -->
                            </td>

                        </tr>
                    <?php
                    }





                    if ($row['URGENT_NAME'] == 'ด่วนที่สุด') {
                    ?>
                        <tr class="cusrow">
                            <td><?= $row['ID']; ?></td>
                            <td><?= $row['BOOK_NUMBER']; ?></td>
                            <td><?= $row['BOOK_DATE']; ?></td>
                            <td>
                                <div class='sf'><?= $row['URGENT_NAME']; ?>
                            </td>
                            <td><?= $row['BOOK_TYPE_NAME']; ?></td>
                            <td><?= $row['BOOK_NAME']; ?></td>
                            <td><?= $row['BOOK_YEAR_NAME']; ?></td>
                            <td><a class="btn btn-primary " href="http://192.168.2.13/hosoffice/documents/bookin/<?php echo $row['ID']; ?>.pdf" target="_blank">กดอ่าน</a>
                                <!-- <td><a href="ftp:\\192.168.2.13\documents\bookin\<//?php echo $row['ID'];?>" target="_blank" class="btn btn-info btn-sm"> เปิดดู </a></td>  -->
                            </td>

                        </tr>
                    <?php
                    }


                    ?>
                <?php
                } ?>
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
                    "sColumnDefs": "วัน เดือน ปี,ชั่วโมง:นาที:วินาที",
                    "oPaginate": {
                        "sFirst": "หน้าแรก",
                        "sPrevious": "ก่อนหน้า",
                        "sNext": "ถัดไป",
                        "sLast": "หน้าสุดท้าย"
                    },
                },

                columnDefs: [{
                    targets: 2,
                    render: function(data) {
                        return moment(data).format('DD/MM/YYYY h:mm:ss');
                    }
                }],
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,

                "order": [
                    [0, 'desc']
                ],
                pageLength: 10,
                lengthMenu:

                    [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'ทั้งหมด        '],

                    ],
            });
        });
    </script>




</body>


</html>