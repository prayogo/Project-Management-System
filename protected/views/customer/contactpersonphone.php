<div id="contact_person_phone_hdn" style="display:<?php echo!empty($display) ? $display : 'none'; ?>">
    <a style="cursor:pointer;text-decoration:none;" onclick="delPhne(this)"><i class="fi-minus"></i></a>
    <div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
            <?php echo CHtml::activelabelEx($model,'['.$index.']Phone', array('class'=>'control-label col-lg-1')); ?>
        </div>
        <div class="col-lg-3">
            <?php echo CHtml::activetextField($model,'['.$index.']Phone', array('class'=>'form-control')) ;?>            
        </div> 
        <div class="col-lg-2">
            <?php echo CHtml::activetextField($model,'['.$index.']PhoneTypeId', array('class'=>'form-control', 'id'=>'hdnPhoneType')) ;?>            
        </div> 
    </div>
</div>