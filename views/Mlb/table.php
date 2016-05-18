<?php
use yii\web\View;
$this->registerJsFile(Yii::$app->request->baseUrl . '/js/schedule.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>


        <div class='alert alert-info text-center'> Table is loading, plase wait  (30 sec)</div> 


<div >

    <table id="gameList" class="table">
        <thead>
            <tr>
                <td> Game ID </td>
                <td> Date\Time </td>
                <td> Home Team </td> 
                <td> Away Team </td> 
				<td> Stadium   </td> 
 				
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td> Game ID </td>
                <td> Date\Time </td>
                <td> Home Team </td> 
                <td> Away Team </td> 
				<td> Stadium   </td> 
            </tr>
        </tfoot>
        <tbody> 
        </tbody>
    </table>
</div>
