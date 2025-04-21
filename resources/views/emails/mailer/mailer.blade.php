<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Phiếu Lương Tháng 12/2020</title>
  <style>
    body {
      font-family: Arial, sans-serif;
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
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    td, th {
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
  </style>
</head>
<body>
  <div class="container">
    <p><strong>CÔNG TY CỔ PHẦN VIETTRONICS THỦ ĐỨC</strong></p>
    <h2>{{ $email['title'] }}</h2>

    <table>
      <tr>
        <td width="33%"><strong>Họ tên:</strong> {{ $data[0] }}</td>
        <td width="33%"><strong>Mã NV:</strong> {{ $data[1] }}</td>
        <td><strong>Chức danh:</strong> {{ $data[2] }}</td>
      </tr>
      <tr>
        <td><strong>MST:</strong> {{ $data[3] }}</td>
        <td><strong>Số người phụ thuộc:</strong> {{ $data[4] }}</td>
        <td><strong>Ngày công tháng:</strong> {{ $data[25] }}</td>
      </tr>
    </table>

    <table>
      <tr>
        <th colspan="2" width="33%">Công</th>
        <th colspan="2" width="33%">Thu nhập</th>
        <th colspan="2">Các khoản khấu trừ</th>
      </tr>
      <tr>
        <td>Công đi làm</td><td class="right">{{ $data[6] }}</td>
        <td>Lương chính</td><td class="right">{{ convertToVND($data[11]) }}</td>
        <td>BHXH</td><td class="right">{{ convertToVND($data[18]) }}</td>
      </tr>
      <tr>
        <td>Ngày cơm</td><td class="right">{{ $data[9] }}</td>
        <td>Tiền cơm</td><td class="right">{{ convertToVND($data[13]) }}</td>
        <td>Đoàn phí</td><td class="right">{{ convertToVND($data[20]) }}</td>
      </tr>
      <tr>
        <td>Công làm thêm</td><td class="right">{{ $data[8] }}</td>
        <td>Lương làm thêm</td><td class="right">{{ convertToVND($data[12]) }}</td>
        <td>Đảng phí</td><td class="right">{{ convertToVND($data[21]) }}</td>
      </tr>
      <tr>
        <td>Công phép</td><td class="right">{{ $data[7] }}</td>
        <td>Thù lao, phụ cấp</td><td class="right">{{ convertToVND($data[13]) }}</td>
        <td>Thuế TNCN</td><td class="right">{{ convertToVND($data[18]) }}</td>
      </tr>
      <tr>
        <td>Công khoán</td><td class="right">{{ $data[10] }}</td>
        <td>Khác</td><td class="right">{{ convertToVND($data[14]) }}</td>
        <td>Khác</td><td class="right">{{ convertToVND($data[22]) }}</td>
      </tr>
    </table>

    <table>
      <tr>
        <td width="66%"><strong>Tổng Thu nhập (1)</strong></td>
        <td class="highlight right">{{ convertToVND($data[16]) }}</td>
      </tr>
      <tr>
        <td><strong> Tổng các khoản khấu trừ (2)</strong></td>
        <td class="right">{{ convertToVND($data[17]) }}</td>
      </tr>
      <tr>
        <td><strong>Còn được nhận (1) - (2)</strong></td>
        <td class="highlight right">{{ convertToVND($data[23]) }}</td>
      </tr>
      <tr>
        <td><strong>Ghi chú</strong></td>
        <td class="right">{{ $data[24] }}</td>
      </tr>
    </table>
  </div>
</body>
</html>
