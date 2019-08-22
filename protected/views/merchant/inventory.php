
<form id="frm_table_list" method="POST" >
    <input type="hidden" name="action" id="action" value="Inventory">
    <input type="hidden" name="tbl" id="tbl" value="item">
    <input type="hidden" name="clear_tbl"  id="clear_tbl" value="clear_tbl">
    <input type="hidden" name="whereid"  id="whereid" value="item_id">
    <input type="hidden" name="slug" id="slug" value="Inventory/Do/Edit">
    <table id="table_list" class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
        <caption>Inventory</caption>
        <thead>
            <tr>
                <th width="2%"><input type="checkbox" id="chk_all" class="chk_all"></th>
                <th width="5%"><?php echo Yii::t('default',"Item")?></th>
                <th width="4%"><?php echo Yii::t('default',"Quantity")?></th>
            </tr>
        </thead>
        <tbody> 
        </tbody>
    </table
    <div class="clear"></div>
</form>