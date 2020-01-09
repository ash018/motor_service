<?php
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="sample.xls"');
echo "
    <html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">
    <html>
        <head><meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" /></head>
        <body>
";

echo "
    <table>
      <tr>
        <th rowspan=\"2\" nowrap=\"nowrap\">เลขที่บัญชี</th>
        <th rowspan=\"2\" nowrap=\"nowrap\">ชื่อ-สกุล ลูกค้า</th>
        <th rowspan=\"2\" nowrap=\"nowrap\">OS/Balance</th>
        <th rowspan=\"2\" nowrap=\"nowrap\">วันที่</th>
        <th rowspan=\"2\" nowrap=\"nowrap\">เวลา</th>
        <th rowspan=\"2\" nowrap=\"nowrap\">Action Code</th>
        <th rowspan=\"2\" nowrap=\"nowrap\">Amount</th>
        <th colspan=\"5\" nowrap=\"nowrap\">ผลการติดตาม</th>
      </tr>
      <tr>
        <th nowrap=\"nowrap\">ที่อยู่บ้าน</th>
        <th nowrap=\"nowrap\">เบอร์โทรบ้าน</th>
        <th nowrap=\"nowrap\">เบอร์โทรมือถือ</th>
        <th nowrap=\"nowrap\">ที่อยู่ที่ทำงาน</th>
        <th nowrap=\"nowrap\">เบอร์โทรที่ทำงาน</th>
      </tr>
      <tr>
        <td>acc</td>
        <td>name</td>
        <td>balance</td>
        <td>date</td>
        <td>time</td>
        <td>code</td>
        <td>amount</td>
        <td>h-addr</td>
        <td>h-tel</td>
        <td>cell</td>
        <td>w-addr</td>
        <td>w-tel</td>
      </tr>
    </table>
";

echo "</body></html>";

?>