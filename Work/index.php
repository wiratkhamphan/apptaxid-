<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>โปรแกรมร้องขอเพิ่มฐานข้อมูลหมายเลขประจำตัวผู้เสียภาษี (Tax ID)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        fieldset {
            border: 1px solid #ddd;
            margin: 20px;
            padding: 10px;
        }

        label {
            margin-right: 5px;
        }

        input[type="text"],
        select {
            margin-right: 10px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .selectTax {
            padding: 7px 20px;
            border: none;
            border-radius: 3px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .selectTax:hover {
            background-color: #0056b3;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #0D47A1;
            color: white;
        }

        .mt-3 {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .modal-body {
            text-align: center;
        }

        .content {
            margin: 0 auto;
            max-width: 350px;
        }

        .modal-body input[type="text"] {
            width: 100%;
        }
    </style>
</head>

<body>
    <div>
        <div>
            <fieldset style=" background-color: #0D47A1; color: #fff">
                <h1>โปรแกรมร้องขอเพิ่มฐานข้อมูลหมายเลขประจำตัวผู้เสียภาษี (Tax ID)</h1>
            </fieldset>
        </div>
        <fieldset>
            <legend>ค้นหาเลขที่ร้องขอ</legend>
            <div class="form-group">
                <label for="start">วันที่ :</label>
                <input type="text" id="start">
                <label for="end">-</label>
                <input type="text" id="end">
                <label for="doc_st">สถานะ :</label>
                <select id="doc_st">
                    <option value="0">ทั้งหมด</option>
                    <option value='002'>อนุมัติ</option>
                    <option value='004'>ไม่อนุมัติ</option>
                    <option value='006'>ยกเลิก</option>
                    <option value='007'>COMPLETE</option>
                </select>
                <label for="cuscode">บัตรประชาชนหรือเลขที่ผู้เสียภาษี :</label>
                <input type="text" id="cuscode">
                <button type="button" class="selectTax" onclick="search_data()">Search</button>
            </div>
        </fieldset>

        <div class="mt-3">
            <div>
                <fieldset>
                    <legend>รายการเพิ่ม Tax-id</legend>
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th><input type="checkbox" disabled></th>
                                    <th>Request No.</th>
                                    <th>วันที่ </th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>Tax ID </th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>สถานะ</th>
                                    <th>ผู้บันทึก</th>
                                    <th>ผู้ตรวจสอบ</th>
                                    <th>เอกสารแนบ</th>
                                    <th>หมายเหตุ</th>
                                </tr>
                            </thead>
                            <tbody id="main-list">

                            </tbody>
                        </table>
                    </div>
                </fieldset>
                <!-- Button trigger modal -->
                <div class="">
                    <div class="" style="border-color:#000;	font-size:14px;">
                        <fieldset>
                            <div class="button-container">
                                <button type="button" class="approve" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" onclick="save_st('001')" id="">อนุมัติ</button>
                                <button type="button" class="Not_approved" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" onclick="save_st('002')" id="">ไม่อนุมัติ</button>
                                <button type="button" class="cancel" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" onclick="save_st('003')" id="">ยกเลิก</button>

                            </div>
                        </fieldset>


                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="content">
                                    <?php

                                    echo "<img src=\"img/pupmaass.jpg\" alt=\"\" width=\"140\" height=\"150\"\>";
                                    ?>
                                </div>

                                <!-- <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div> -->
                                <div class="modal-body">
                                    <div class="content">
                                        <a>แจ้งเตือน</a><br>
                                        <a>กรุณาระบุหมายเหตุ ไม่อนุมัติ ตรวจสอบ เพิ่ม Tax-id</a>
                                        <input type="text" placeholder="ระบุหมายเหตุ">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="approve">Save</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


</body>

</html>