<?php

// ด่านบน php ห้ามว่างป่าว
$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับ JSON ที่ส่งมาจาก JavaScript
    $data = json_decode(file_get_contents('php://input'), true);

    // ประมวลผลข้อมูล
    $response = [
        'message' => 'ข้อมูลได้รับเรียบร้อยแล้ว',
        'data' => $data
    ];

    // ส่ง JSON กลับไปยัง JavaScript
    header('Content-Type: application/json');
    // echo json_encode($response);
    $result = json_encode($response);

    echo $result;
    exit;
}



?>


<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ส่ง JSON ไป PHP</title>
</head>

<body>
    <h1>ส่ง JSON จาก JavaScript ไปยัง PHP</h1>
    <button id="sendData">ส่งข้อมูล</button>
    <div id="response"></div>

    <script>

        // document.getElementById('sendData').addEventListener('click', async () => {
        //     // ข้อมูลที่ต้องการส่งไป PHP
        //     const dataToSend = {
        //         name: "John Doe",
        //         age: 25,
        //         job: "Developer"
        //     };

        //     try {
        //         // ส่งข้อมูล JSON ไปยัง PHP ด้วย fetch
        //         const response = await fetch('index.php', {
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json'
        //             },
        //             body: JSON.stringify(dataToSend)
        //         });

        //         // รับผลลัพธ์ที่ PHP ส่งกลับมา
        //         const result = await response.json();
        //         console.log(result);
        //         document.getElementById('response').innerText = JSON.stringify(result, null, 2);
        //     } catch (error) {
        //         console.error('Error:', error);
        //     }
        // });


        document.addEventListener('DOMContentLoaded', async () => {
            // ข้อมูลที่ต้องการส่งไป PHP
            const dataToSend = {
                name: "John Doe",
                age: 25,
                job: "Developer"
            };

            try {
                // ส่งข้อมูล JSON ไปยัง PHP ด้วย fetch
                const response = await fetch('index.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(dataToSend)
                });

                // รับผลลัพธ์ที่ PHP ส่งกลับมา
                const result = await response.json();
                console.log(result);
                document.getElementById('response').innerText = JSON.stringify(result, null, 2);
            } catch (error) {
                console.error('Error:', error);
            }
        });

    </script>
</body>

</html>