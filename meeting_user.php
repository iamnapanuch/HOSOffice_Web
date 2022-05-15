<?php include 'connection.php';
include 'check_user.php';
?>
<?php include 'menu_user.php'; ?>
<?php include 'head.php'; ?>
<!DOCTYPE html>
<html lang="en">



<head>
    <style>
        @import 'https://fonts.googleapis.com/css?family=Kanit|Noto Serif Thai|Pridi|Taviraj|Maitree|Noto Serif Thai';

        div.SUCCESS {
            color: white;
            background-color: #38B429;
            /* color: green; */
        }

        div.CANCEL {
            color: white;
            background-color: #DA2828;
            /* color: red; */
        }

        div.REQUEST {
            color: white;
            background-color: #CDC261;
            /* color: #CDC261; */
        }




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
    </style>
    <br>
    <div class="A"> <a href="home.php">      Home </a> | ระบบจองห้องประชุม </div>

    <div class="mb-4">
    </div>



</head>

<body>
    <?php
    $sql = "SELECT room_ser.*,room_i.ROOM_NAME
FROM room_service as room_ser
INNER JOIN room_index  AS room_i ON room_i.ROOM_ID = room_ser.ROOM_ID
";
    $result = mysqli_query($con, $sql);


    ?>
    <div class="table-responsive">
        <div class="row">

            <table id="dataTables_filter" class="table ">
                <thead class="thead-light">
                    <tr style="font-size:14px">
                        <th>ลำดับ</th>
                        <th>สถานะ</th>
                        <th>วันที่ประชุม</th>
                        <th>ผู้แจ้ง</th>
                        <th>หัวข้อ</th>
                        <th>สถานที่จอง</th>
                        <th>เวลาที่เริ่มประชุม</th>
                        <th>เวลาสิ้นสุดประชุม</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        if ($row['STATUS'] == 'SUCCESS') {
                    ?>
                            <tr class="cusrow">
                                <td><?= $row['ID']; ?></td>
                                <td>
                                    <div class='SUCCESS'><?= $row['STATUS']; ?></div>
                                </td>
                                <td><?= $row['DATE_TIME_REQUEST']; ?></td>
                                <td><?= $row['PERSON_REQUEST_NAME']; ?></td>
                                <td><?= $row['SERVICE_STORY']; ?></td>
                                <td><?= $row['ROOM_NAME']; ?></td>
                                <td><?= $row['TIME_BEGIN']; ?></td>
                                <td><?= $row['TIME_END']; ?></td>

                            </tr>
                        <?php
                        }


                        if ($row['STATUS'] == 'CANCEL') {

                        ?>
                            <tr class="cusrow">
                                <td><?= $row['ID']; ?></td>
                                <td>
                                    <div class='CANCEL'><?= $row['STATUS']; ?></div>
                                </td>
                                <td><?= $row['DATE_TIME_REQUEST']; ?></td>
                                <td><?= $row['PERSON_REQUEST_NAME']; ?></td>
                                <td><?= $row['SERVICE_STORY']; ?></td>
                                <td><?= $row['ROOM_NAME']; ?></td>
                                <td><?= $row['TIME_BEGIN']; ?></td>
                                <td><?= $row['TIME_END']; ?></td>

                            </tr>
                        <?php
                        }



                        if ($row['STATUS'] == 'REQUEST') {

                        ?>
                            <tr class="cusrow">
                                <td><?= $row['ID']; ?></td>
                                <td>
                                    <div class='REQUEST'><?= $row['STATUS']; ?></div>
                                </td>
                                <td><?= $row['DATE_TIME_REQUEST']; ?></td>
                                <td><?= $row['PERSON_REQUEST_NAME']; ?></td>
                                <td><?= $row['SERVICE_STORY']; ?></td>
                                <td><?= $row['ROOM_NAME']; ?></td>
                                <td><?= $row['TIME_BEGIN']; ?></td>
                                <td><?= $row['TIME_END']; ?></td>

                            </tr>
                    <?php
                        }
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
                columnDefs: [{
                    targets: 2,
                    render: function(data) {
                        return moment(data).format('DD/MM/YYYY h:mm:ss');
                    }
                }],
                rowReorder: {
                    selector: 'td:nth-child(0)'
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



</html>