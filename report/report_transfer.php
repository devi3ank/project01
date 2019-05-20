<?php
    include '../applications/connect_db.php';

    $id = $_GET['id'];

    $result = select_db("
        SELECT
            lot_tb.*,
            store_tb.*,
            products_tb.*
        FROM
            lot_tb
        INNER JOIN store_tb ON lot_tb.store_sale_id = store_tb.store_id
        INNER JOIN products_tb ON lot_tb.products_id = products_tb.products_id
        WHERE
            lot_tb.lot_id = '$id'
    ");

    $data = $result->fetch_assoc();
    //dieArray($data);

    require_once __DIR__ . '/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf([
        'default_font_size' => 14,
        'default_font' => 'thsarabun'
    ]);

    $html = '<div style="text-align:center; font-size: 28pt; font-weight: bold;">หจท. สืบ เกษตรไท</div>';
    $html .= '<div style="text-align:center;">เลขที่ 333/1 หมู่ที่ 2 ต.หนองจ๊อม อ.สันทราย จ.เชียงใหม่ 50210</div>';
    $html .= '<div style="text-align:center;">โทร. 052-000-666</div>';
    $html .= '<div style="text-align:center; font-size: 20pt; font-weight: bold;">ใบส่งสินค้า/ใบแจ้งหนี้</div>';

    $html .= '<div style="">ออกใช้ ณ สาขา: สำนักงานใหญ่ โทร. 052-000-666</div>';
    $html .= '<div style="">ผู้ขาย : '.$data['store_name'].'</div>';
    $html .= '<div style="">'.$data['store_address'].'</div>';
    $html .= '<table style="width:100%;"><tr><td style="width:70%;">โทร. '.$data['store_phone'].'</td><td>วันที่: '.date_format(date_create($data['lot_transfer_date']),"d/m/Y").'</td></tr></table>';
    $html .= '<table style="width:100%;"><tr><td style="width:70%;">รหัสลูกค้า: '.$data['store_id'].'</td><td>เลขที่ : '.sprintf("%05d", $data['lot_id']).'</td></tr></table>';
    $html .= '
        <table style="width:100%; border-collapse: collapse;">
            <tr>
                <th style="text-align:center; width: 50px; border: 1px solid black;">ลำดับ</th>
                <th style="text-align:center; width: 100px; border: 1px solid black;">รหัสสินค้า</th>
                <th style="text-align:center; border: 1px solid black;">รายการ</th>
                <th style="text-align:center; width: 80px; border: 1px solid black;">จำนวน</th>
                <th style="text-align:center; width: 50px; border: 1px solid black;">หน่วย</th>
                <th style="text-align:center; width: 80px; border: 1px solid black;">ราคา/หน่วย</th>
                <th style="text-align:center; width: 80px; border: 1px solid black;">จำนวนเงิน</th>
            </tr>
            <tr>
                <td style="text-align:center;">1</td>
                <td style="text-align:center;">'.$data['products_code'].'</td>
                <td style="padding-left: 5px;">'.$data['products_name'].'</td>
                <td style="text-align:right;">'.$data['lot_weight'].'</td>
                <td style="text-align:center;">กก.</td>
                <td style="text-align:right;">'.$data['lot_price_sale'].'</td>
                <td style="text-align:right;">'.number_format($data['lot_weight']*$data['lot_price_sale'],2).'</td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
            <tr>
                <td style="height: 16px;" colspan="7"></td>
            </tr>
        </table>
    ';
    $html .= '
        <table style="width:100%; border-collapse: collapse;">
            <tr>
                <th style="width:60%; border: 1px solid black;">('.convert($data['lot_weight']*$data['lot_price_sale']).')</th>
                <th style="width:20%; border: 1px solid black;">ยอดรวมสุทธิ</th>
                <th style="width:20%; border: 1px solid black; text-align:right;">'.number_format($data['lot_weight']*$data['lot_price_sale'],2).'</th>
            </tr>
        </table>
    ';
    $html .= '<div>หมายเหตุ: </div>';
    $html .= '
        <table style="width:100%; border-collapse: collapse;">
            <tr>
                <td style="width:33.33%; text-align:center; padding-top: 100px">
                ...............................<br/>
                ผู้รับสินค้า
                </td>
                <td style="width:33.33%; text-align:center; padding-top: 100px">
                ...............................<br/>
                ผู้ส่งสินค้า
                </td>
                <td style="width:33.33%; text-align:center; padding-top: 100px">
                ...............................<br/>
                ผู้มีอำนาจลงนาม
                </td>
            </tr>
        </table>
    ';
    $html .= '';

    $mpdf->WriteHTML($html);
    $mpdf->Output();