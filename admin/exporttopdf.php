<?php
require_once "../connection/connection.php";
include_once "Common.php";
$common = new Common();
$records = $common->getAllRecords($conn);
$dataTable = '';
$dataTable .='<table class="table">
                   <thead>
                       <tr>
                       <th>Member ID </th>
                       <th>Name</th>
                       <th>ID number</th>
                       <th>Phone number</th>
                       <th>KRA PIN</th>
                       <th>Gender</th>
                       <th>Date of Birth</th>
                       <th>Joining Date</th>
                       <th>County</th>
                        </tr>
                    </thead>
                    <tbody>';
    if ($records->num_rows>0) {
        $sr = 1;
        while ($record = $records->fetch_object()) {
            $$member_id = $record->id;
            $first_name = $record->first_name;
            $id_number = $record->id_number;
            $phone_number = $record->phone_number;
            $kra_pin = $record->kra_pin;
            $gender = $record->gender;
            $dataTable .='
            <tr>
                <td>'.$member_id.'</td>
                <td>'.$first_name.'</td>
                <td>'.$id_number.'</td>
                <td>'.$phone_number.'</td>
                <td>'.$id_number.'</td>
                <td>'.$gender.'</td>
            </tr>';

            $sr++;
        }
    }
    $dataTable .= '  </tbody>
                    </table>';
    $filename = "exported-data-".date('d-m-Y H:i:s').".xls";
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename='.$filename);
    echo $dataTable;


