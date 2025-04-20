<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>{{ $mailer }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f5f6;
        }

        .container {
            width: 800px;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 10px;
        }

        h2 {
            text-align: center;
            color: red;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td,
        th {
            border: 1px solid #000;
            padding: 4px;
            font-size: 14px;
        }

        .no-border {
            border: none;
        }

        .highlight {
            font-weight: bold;
            color: blue;
        }

        .right {
            text-align: right;
        }

        .name {
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="container">
        <p><strong>CÔNG TY CỔ PHẦN VIETTRONICS THỦ ĐỨC</strong></p>
        <h2>{{ $email['title'] }}</h2>
        <div class="">
            <table>
                <tr>
                    <td colspan="5"><strong>Họ tên:</strong> <span class="name">{{ $data[0] }}</span></td>
                    <td><strong>Mã NV:</strong> {{ $data[1] }}</td>
                </tr>
            </table>

            <table>
                <tr>
                    <th colspan="4">Thông tin chính</th>
                    <th colspan="2">Các khoản khấu trừ</th>
                </tr>
                <tr>
                    <td>Ngày công</td>
                    <td class="right">{{ $data[3] }}</td>
                    <td>Tiền lương</td>
                    <td class="right">{{ $data[4] }}</td>
                    <td>Bảo hiểm xã hội</td>
                    <td class="right">{{ $data[10] }}</td>
                </tr>
                <tr>
                    <td>Ngày cơm</td>
                    <td class="right">{{ $data[5] }}</td>
                    <td>Tiền cơm</td>
                    <td class="right">{{ $data[6] }}</td>
                    <td>Thuế TNCN</td>
                    <td class="right">{{ $data[11] }}</td>
                </tr>
                <tr>
                    <td>Khác</td>
                    <td class="right">{{ $data[8] }}</td>
                    <td>Thù lao, phụ cấp</td>
                    <td class="right">{{ $data[7] }}</td>
                    <td>Công đoàn phí</td>
                    <td class="right">{{ $data[12] }}</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td>Đảng phí</td>
                    <td class="right">{{ $data[13] }}</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td>Khấu trừ khác</td>
                    <td class="right">{{ $data[14] }}</td>
                </tr>
            </table>

            <table>
                <tr>
                    <td><strong>Thực lĩnh lương (1)</strong></td>
                    <td class="highlight right">{{ $data[4] + $data[6] + $data[7] + $data[8] }}</td>
                </tr>
                <tr>
                    <td><strong>Các khoản khấu trừ (2)</strong></td>
                    <td class="right">{{ $data[10] + $data[11] + $data[12] + $data[13] + $data[14] }}</td>
                </tr>
                <tr>
                    <td><strong>Tổng cộng (1) - (2)</strong></td>
                    <td class="highlight right">{{ $data[15] }}</td>
                </tr>
                <tr>
                    <td><strong>Ghi chú</strong></td>
                    <td>{{ $data[16] }}</td>
                </tr>
            </table>
        </div>

    </div>
</body>

</html>
