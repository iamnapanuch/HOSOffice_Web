<?php include 'connection.php';
include 'check_user.php';
?>
<?php include 'menu.php'; ?>
<?php include 'head.php'; ?>
<!DOCTYPE html>
<html lang="en">



<head>
    <style>
        @import 'https://fonts.googleapis.com/css?family=Kanit|Noto Serif Thai|Pridi|Taviraj|Maitree|Noto Serif Thai';

        .dataTables_filter {
            float: right !important;
            font-family: 'Kanit', sans-serif;
        }

        .dataTables_wrapper .dataTables_length {
            float: left
        }


        @media screen and (max-width: 600px) {
            .dataTables_filter {
                float: left !important;
                font-family: 'Kanit', sans-serif;

            }
        }

        #dataTables_filter {
            font-family: 'Kanit', sans-serif;
            border-collapse: collapse;
            width: 1250px;
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
            background-color: #229954;
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
        <div class="A"> <a href="home.php">      Home </a> | ระบบสารบรรณ </div>
        <div class="mb-4">
        </div>
    </left>




</head>

<body>
    <?php

    $rs = $con->query("SELECT person.*,prefix.HR_PREFIX_NAME,department.HR_DEPARTMENT_NAME
FROM hr_person as person 
INNER JOIN  hr_prefix as prefix ON prefix.HR_PREFIX_ID = person.HR_PREFIX_ID
INNER JOIN  hr_department as department  ON department.HR_DEPARTMENT_ID = person.HR_DEPARTMENT_ID");

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

                "order": [
                    [0, 'desc']
                ],
                pageLength: 5,
                lengthMenu:

                    [
                        [5, 25, 50, -1],
                        [5, 25, 50, 'ทั้งหมด        '],

                    ],
            });
        });
    </script>



</html>