
<div class="form-horizontal" >
    <div id='contact_person' style="display:<?php echo!empty($display) ? $display : 'none'; ?>" >
        <a style="cursor:pointer;text-decoration:none;" onclick="delContact(this)"><i class="fi-minus"></i></a>
        <div id="contact_person_group">
            <div class="form-group" id="contact_person_detail">
                <div class="col-1"><span class="pull-right"></span>
                    <?php echo CHtml::activelabelEx($model,'['.$index.']Name', array('class'=>'control-label col-lg-1')); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo CHtml::activetextField($model,'['.$index.']Name', array('class'=>'form-control')) ;?>            
                </div>
                <div class="col-1"><span class="pull-right"></span>
                    <?php echo CHtml::activelabelEx($model,'['.$index.']Email', array('class'=>'control-label col-lg-1')); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo CHtml::activetextField($model,'['.$index.']Email', array('class'=>'form-control')) ;?>            
                </div>
                <div class="col-1"><span class="pull-right"></span>
                    <?php echo CHtml::activelabelEx($model,'['.$index.']Job', array('class'=>'control-label col-lg-1')); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo CHtml::activetextField($model,'['.$index.']Job', array('class'=>'form-control')) ;?>            
                </div>         
            </div>            
            
            <a style="cursor:pointer;text-decoration:none;" onclick="addPhone(this)"><i class="fi-plus"></i> Add New Phone</a>
            <div id="contact_person_phone_group">                
            </div>
            <hr>
        </div>
    </div>    
</div>