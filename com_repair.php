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
        @import 'https://fonts.googleapis.com/css?family=Kanit|Itim|Pridi|Taviraj|Maitree|itim|Noto Serif Thai|Noto Serif Thai';

        div.color_repair {
            color: white;
            background-color: #35A72F;
            /* color : green; */
        }

        div.color_repair_out {
            color: white;
            background-color: #0E12B7;
            /* color : blue ; */
        }

        div.color_wait {
            color: white;
            background-color: #EC3838;
            /* color: red; */
        }

        div.color_request {
            color: white;
            background-color: #444444;
            /* color: black; */
        }

        div.color_pending {
            color: white;
            background-color: coral;
            /* color: coral; */
        }

        div.color_cancel {
            color: white;
            background-color: #B80000;
            /* color: #B80000; */
        }

        div.color_receive {
            color: white;
            background-color: #E3A306;
            /* color: #E3A306; */
        }

        .dataTables_filter {
            float: right !important;

        }

        /* .table{
        display: inline-block;
        width:1880px;
    } */



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
            width: 1880px;


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
    </style>
    <br>
    <left>
        <div class="A"> <a href="home.php">      Home </a> | แจ้งซ่อมคอมพิวเตอร์ </div>
        <div class="mb-4">
        </div>
    </left>
</head>

<body>
    <?php

    $sql = "SELECT c_repair.REPAIR_ID,c_repair.COM_NAME,c_repair.REPAIR_DETAIL_BEGIN,re_priority.PRIORITY_NAME,c_index.ARTICLE_NAME,c_index.ARTICLE_NUM,
com_loca.LOCATION_NAME,c_repair.RECEIVE_BY_NAME,c_repair.REPAIR_STATUS,
CONCAT(c_repair.DATE_WANT_USES,' ',c_repair.TIME_WANT_USES) AS DT_WANT,
CONCAT(hr_p.HR_FNAME,' ',hr_p.HR_LNAME) AS USER_SENDER
FROM com_repair as c_repair
LEFT JOIN  repair_priority AS re_priority ON re_priority.PRIORITY_ID = c_repair.PRIORITY_ID
LEFT JOIN hr_person as hr_p ON hr_p.ID  = c_repair.REPAIR_BY_ID 
LEFT JOIN com_location as com_loca  ON com_loca.LOCATION_ID = c_repair.LOCATION_ID
LEFT JOIN com_index as c_index  ON c_index.COM_ID = c_repair.COM_ID
LEFT JOIN com_type AS c_type ON c_type.COM_TYPE_ID = c_index.COM_ID
UNION ALL
SELECT c_repair.REPAIR_ID,c_repair.COM_NAME,c_repair.REPAIR_DETAIL_BEGIN,re_priority.PRIORITY_NAME,c_index.ARTICLE_NAME,c_index.ARTICLE_NUM,
com_loca.LOCATION_NAME,c_repair.RECEIVE_BY_NAME,c_repair.REPAIR_STATUS,
CONCAT(c_repair.DATE_WANT_USES,' ',c_repair.TIME_WANT_USES) AS DT_WANT,
CONCAT(hr_p.HR_FNAME,' ',hr_p.HR_LNAME) AS USER_SENDER
FROM com_repair as c_repair
RIGHT JOIN  repair_priority AS re_priority ON re_priority.PRIORITY_ID = c_repair.PRIORITY_ID
RIGHT JOIN hr_person as hr_p ON hr_p.ID  = c_repair.REPAIR_BY_ID 
RIGHT JOIN com_location as com_loca  ON com_loca.LOCATION_ID = c_repair.LOCATION_ID
RIGHT JOIN com_index as c_index  ON c_index.COM_ID = c_repair.COM_ID
RIGHT JOIN com_type AS c_type ON c_type.COM_TYPE_ID = c_index.COM_ID";
    $result = mysqli_query($con, $sql);
    ?>




    <div class="table-responsive">
        <table id="dataTables_filter" class="table">
            <thead class="thead-light" style="text-align:center;">
                <tr>
                    <th>เลขที่แจ้งซ่อม</th>
                    <th>สถานะ</th>
                    <th style='width:11%'>วันที่แจ้ง</th>
                    <th>ชื่อเครื่อง</th>
                    <th>อาการ</th>
                    <th style='width:11%'>เลขครุภัณฑ์</th>
                    <th style='width:11%'>ประเภท</th>
                    <th style='width:11%'>ต้องการใช้งาน</th>
                    <th style='width:11%'>ผู้แจ้งซ่อม</th>
                    <th>สถานที่ตั้ง</th>
                    <th style='width:11%'>ช่างรับเรื่อง</th>
                    <th>ปุ่ม</th>
                </tr>
            </thead>
            <tbody>


                <?php

                while ($row = mysqli_fetch_array($result)) {

                    if ($row['REPAIR_STATUS'] == 'REPAIR') {
                ?>
                        <tr class="cusrow">
                            <td><?= $row['REPAIR_ID']; ?></td>
                            <td>
                                <div class='color_repair'><?= $row['REPAIR_STATUS']; ?></div>
                            </td>
                            <td><?= $row['DT_WANT']; ?></td>
                            <td><?= $row['COM_NAME']; ?></td>
                            <td><?= $row['REPAIR_DETAIL_BEGIN']; ?></td>
                            <td><?= $row['ARTICLE_NUM']; ?></td>
                            <td><?= $row['ARTICLE_NAME']; ?></td>
                            <td><?= $row['PRIORITY_NAME']; ?></td>
                            <td><?= $row['USER_SENDER']; ?></td>
                            <td><?= $row['LOCATION_NAME']; ?></td>
                            <td><?= $row['RECEIVE_BY_NAME']; ?></td>
                            <!-- <td>
                               
                                <a class="btn btn-primary " href="http://192.168.2.13/hosoffice/documents/notifyrepair/<?php echo $row['REPAIR_ID']; ?>.pdf" target="_blank">ใบแจ้งซ่อม</a>
                            </td> -->
                            <td>
                               
                                <a class="btn btn-primary " href="/h/documents/bookin/<?php echo $row['REPAIR_ID']; ?>.pdf" target="_blank">ใบแจ้งซ่อม</a>
                            </td>

                        </tr>
                    <?php
                    }


                    if ($row['REPAIR_STATUS'] == 'REQUEST') {
                    ?>
                        <tr class="cusrow">
                            <td><?= $row['REPAIR_ID']; ?></td>
                            <td>
                                <div class='color_request'><?= $row['REPAIR_STATUS']; ?></div>
                            </td>
                            <td><?= $row['DT_WANT']; ?></td>
                            <td><?= $row['COM_NAME']; ?></td>
                            <td><?= $row['REPAIR_DETAIL_BEGIN']; ?></td>
                            <td><?= $row['ARTICLE_NUM']; ?></td>
                            <td><?= $row['ARTICLE_NAME']; ?></td>
                            <td><?= $row['PRIORITY_NAME']; ?></td>
                            <td><?= $row['USER_SENDER']; ?></td>
                            <td><?= $row['LOCATION_NAME']; ?></td>
                            <td><?= $row['RECEIVE_BY_NAME']; ?></td>
                            <td>
                                <!-- <a class="btn btn-primary " href="#" target="_blank">ใบแจ้งซ่อม</a> -->
                                <!-- <a class="btn btn-primary " href="http://192.168.2.13/hosoffice/documents/notifyrepair/<?php echo $row['REPAIR_ID']; ?>.pdf" target="_blank">ใบแจ้งซ่อม</a>  -->
                            </td>

                        </tr>
                    <?php
                    }


                    if ($row['REPAIR_STATUS'] == 'RECEIVE') {
                    ?>
                        <tr class="cusrow">
                            <td><?= $row['REPAIR_ID']; ?></td>
                            <td>
                                <div class='color_receive'><?= $row['REPAIR_STATUS']; ?></div>
                            </td>
                            <td><?= $row['DT_WANT']; ?></td>
                            <td><?= $row['COM_NAME']; ?></td>
                            <td><?= $row['REPAIR_DETAIL_BEGIN']; ?></td>
                            <td><?= $row['ARTICLE_NUM']; ?></td>
                            <td><?= $row['ARTICLE_NAME']; ?></td>
                            <td><?= $row['PRIORITY_NAME']; ?></td>
                            <td><?= $row['USER_SENDER']; ?></td>
                            <td><?= $row['LOCATION_NAME']; ?></td>
                            <td><?= $row['RECEIVE_BY_NAME']; ?></td>
                            <td>
                                <!-- <a class="btn btn-primary " href="#" target="_blank">ใบแจ้งซ่อม</a>  -->
                                <!-- <a class="btn btn-primary " href="http://192.168.2.13/hosoffice/documents/notifyrepair/<?php echo $row['REPAIR_ID']; ?>.pdf" target="_blank">ใบแจ้งซ่อม</a> -->
                            </td>

                        </tr>
                    <?php
                    }


                    if ($row['REPAIR_STATUS'] == 'WAIT') {
                    ?>
                        <tr class="cusrow">
                            <td><?= $row['REPAIR_ID']; ?></td>
                            <td>
                                <div class='color_wait'><?= $row['REPAIR_STATUS']; ?></div>
                            </td>
                            <td><?= $row['DT_WANT']; ?></td>
                            <td><?= $row['COM_NAME']; ?></td>
                            <td><?= $row['REPAIR_DETAIL_BEGIN']; ?></td>
                            <td><?= $row['ARTICLE_NUM']; ?></td>
                            <td><?= $row['ARTICLE_NAME']; ?></td>
                            <td><?= $row['PRIORITY_NAME']; ?></td>
                            <td><?= $row['USER_SENDER']; ?></td>
                            <td><?= $row['LOCATION_NAME']; ?></td>
                            <td><?= $row['RECEIVE_BY_NAME']; ?></td>
                            <td>
                                <!-- <a class="btn btn-primary " href="#" target="_blank">ใบแจ้งซ่อม</a>  -->
                                <!-- <a class="btn btn-primary " href="http://192.168.2.13/hosoffice/documents/notifyrepair/<?php echo $row['REPAIR_ID']; ?>.pdf" target="_blank">ใบแจ้งซ่อม</a> -->
                            </td>

                        </tr>
                    <?php
                    }

                    if ($row['REPAIR_STATUS'] == 'CANCEL') {
                    ?>
                        <tr class="cusrow">
                            <td><?= $row['REPAIR_ID']; ?></td>
                            <td>
                                <div class='color_cancel'><?= $row['REPAIR_STATUS']; ?></div>
                            </td>
                            <td><?= $row['DT_WANT']; ?></td>
                            <td><?= $row['COM_NAME']; ?></td>
                            <td><?= $row['REPAIR_DETAIL_BEGIN']; ?></td>
                            <td><?= $row['ARTICLE_NUM']; ?></td>
                            <td><?= $row['ARTICLE_NAME']; ?></td>
                            <td><?= $row['PRIORITY_NAME']; ?></td>
                            <td><?= $row['USER_SENDER']; ?></td>
                            <td><?= $row['LOCATION_NAME']; ?></td>
                            <td><?= $row['RECEIVE_BY_NAME']; ?></td>
                            <td>
                                <!-- <a class="btn btn-primary " href="#" target="_blank">ใบแจ้งซ่อม</a> -->
                                <!-- <a class="btn btn-primary " href="http://192.168.2.13/hosoffice/documents/notifyrepair/<?php echo $row['REPAIR_ID']; ?>.pdf" target="_blank">ใบแจ้งซ่อม</a> -->
                            </td>

                        </tr>
                    <?php
                    }

                    if ($row['REPAIR_STATUS'] == 'PENDING') {
                    ?>
                        <tr class="cusrow">
                            <td><?= $row['REPAIR_ID']; ?></td>
                            <td>
                                <div class='color_pending'><?= $row['REPAIR_STATUS']; ?></div>
                            </td>
                            <td><?= $row['DT_WANT']; ?></td>
                            <td><?= $row['COM_NAME']; ?></td>
                            <td><?= $row['REPAIR_DETAIL_BEGIN']; ?></td>
                            <td><?= $row['ARTICLE_NUM']; ?></td>
                            <td><?= $row['ARTICLE_NAME']; ?></td>
                            <td><?= $row['PRIORITY_NAME']; ?></td>
                            <td><?= $row['USER_SENDER']; ?></td>
                            <td><?= $row['LOCATION_NAME']; ?></td>
                            <td><?= $row['RECEIVE_BY_NAME']; ?></td>
                            <td>
                                <!-- <a class="btn btn-primary " href="#" target="_blank">ใบแจ้งซ่อม</a>  -->
                                <!-- <a class="btn btn-primary " href="http://192.168.2.13/hosoffice/documents/notifyrepair/<?php echo $row['REPAIR_ID']; ?>.pdf" target="_blank">ใบแจ้งซ่อม</a> -->
                            </td>

                        </tr>
                    <?php
                    }

                    if ($row['REPAIR_STATUS'] == 'REPAIR_OUT') {
                    ?>
                        <tr class="cusrow">
                            <td><?= $row['REPAIR_ID']; ?></td>
                            <td>
                                <div class='color_repair_out'><?= $row['REPAIR_STATUS']; ?></div>
                            </td>
                            <td><?= $row['DT_WANT']; ?></td>
                            <td><?= $row['COM_NAME']; ?></td>
                            <td><?= $row['REPAIR_DETAIL_BEGIN']; ?></td>
                            <td><?= $row['ARTICLE_NUM']; ?></td>
                            <td><?= $row['ARTICLE_NAME']; ?></td>
                            <td><?= $row['PRIORITY_NAME']; ?></td>
                            <td><?= $row['USER_SENDER']; ?></td>
                            <td><?= $row['LOCATION_NAME']; ?></td>
                            <td><?= $row['RECEIVE_BY_NAME']; ?></td>
                            <td>
                                <!-- <a class="btn btn-primary " href="#" target="_blank">ใบแจ้งซ่อม</a>  -->
                                <!-- <a class="btn btn-primary " href="http://192.168.2.13/hosoffice/documents/notifyrepair/<?php echo $row['REPAIR_ID']; ?>.pdf" target="_blank">ใบแจ้งซ่อม</a> -->
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


    <?php // include 'footer.php'; 
    ?>
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