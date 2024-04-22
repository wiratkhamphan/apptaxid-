<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="branch.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Branch (Tax ID)</title>
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

        .button-container {
            margin-top: 10px;
            display: inline-block;

        }

        .button-container button {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div>
        <div class="">
            <fieldset style="background-color: #0D47A1; color: #fff;">
                <h1>Branch (Tax ID)</h1>
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
                <button type="button" class="selectTax">Search</button>
                <!-- Button trigger modal -->
                <div class="button-container">
                    <button type="button" class="appTaxid" data-bs-toggle="modal" data-bs-target="#exampleModal">+
                        เพิ่มคำร้อง</button>
                </div>
            </div>
        </fieldset>

        <div>
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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ร้องขอเพิ่ม Tax ID</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="content">
                                    <fieldset>
                                        <label>ชื่อลูกค้า</label>
                                        <input type="text">
                                        <label>Tax ID</label>
                                        <input type="int" id="taxID" maxlength="13">
                                        <label>UP file</label>
                                        <input type="file" id="fileInput">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="Save" onclick="uploadFile()">Save</button>
                                <button type="button" class="cancel" data-bs-dismiss="modal">Close</button>
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
        <script>
    function uploadFile() {
        const fileInput = document.getElementById('fileInput');
        const file = fileInput.files[0];
        if (!file) {
            alert('Please select a file');
            return;
        }

        const formData = new FormData();
        formData.append('file', file);

        fetch('http://localhost:8080/upload', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error uploading file');
            }
            return response.text();
        })
        .then(data => {
            alert(data);
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while uploading the file');
        });
    }
</script>

</body>

</html>