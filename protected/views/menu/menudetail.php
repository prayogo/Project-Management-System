<?php $model=new ManageUserDetailForm; ?>
<div class="panel panel-default">
	<div class="panel-body">
	    <h3 class="tab"><span class="glyphicon glyphicon-edit"></span> Menu Detail</h3>
        <form class="form-horizontal" role="form">
        <?php echo CHtml::beginForm(); ?>
        
            <?php echo CHtml::errorSummary($model); ?>
            
            <div class="form-group">
				<div class="col-1"><span class="pull-right"></span></div>
                <label class="control-label col-lg-2">Enabled</label>
				<div class="col-lg-6" style="margin-top:5px">
					<label style="margin-right:20px"><input type="radio" name="enabled" checked="checked"/> Yes</label>
                    <label><input type="radio" name="enabled"/> No</label>
				</div>
			</div>
            
			<div class="form-group">
				<div class="col-1"><span class="pull-right"></span></div>
				<?php echo CHtml::activeLabel($model,'caption', array('class'=>'control-label col-lg-2')); ?>
				<div class="col-lg-6">
			    	<?php echo CHtml::activeTextField($model,'caption', array('class'=>'form-control')); ?>
				</div>
			</div>
            	
            <div class="form-group">
	            <div class="col-1"><span class="pull-right"></span></div>
                <?php echo CHtml::activeLabel($model,'link', array('class'=>'control-label col-lg-2')); ?>
                <div class="col-lg-6">
                    <div class="input-group">
                        <?php echo CHtml::activeTextField($model,'link', array('class'=>'form-control')); ?>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<div class="col-1"><span class="pull-right"></span></div>
                <?php echo CHtml::activeLabel($model,'iconcss',array('label'=>'Icon','class'=>'control-label col-lg-2')); ?>
                <div class="col-lg-6">
                	<?php echo CHtml::activeTextField($model,'iconcss', array('class'=>'form-control')); ?>
                </div>
            </div>
            
            <div class="form-group">
            	<div class="col-1"><span class="pull-right"></span></div>
                <?php echo CHtml::activeLabel($model,'description', array('value', 'Icon','class'=>'control-label col-lg-2')); ?>
                <div class="col-lg-6">
                	<?php echo CHtml::activeTextArea($model,'description', array('class'=>'form-control', 'rows'=>'5')); ?>
                </div>
            </div>
        </form>
	</div>
	<div class="panel-footer">
    	<div>
            <button type="submit" class="btn btn-default">
                <i class="glyphicon glyphicon-remove" style="display:block;font-size:26px;"></i>Cancel
            </button>
			<button type="submit" class="btn btn-default pull-right">
                <i class="glyphicon glyphicon-floppy-disk" style="display:block;font-size:26px;"></i>Save
            </button>
        </div>
    </div>
</div>