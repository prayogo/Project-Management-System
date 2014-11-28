<?php
/* @var $this UserDetailFormController */
/* @var $model_detail UserDetailForm */
/* @var $form CActiveForm */
?>

<div class="panel panel-default" id="customer-detail">

<div class="panel-body">
    <div class="form-horizontal" role="form">    
    
    <div id="customer-detail-form">
        
        <?php echo $form->hiddenField($model_detail,'CustomerId') ?>
        <?php echo $form->hiddenField($model_detail,'isChange') ?>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model_detail,'Company', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model_detail,'Company', array('class'=>'form-control')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model_detail,'CompanyTypeId', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model_detail,'CompanyTypeId', array('class'=>'form-control CompanyTypeId')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model_detail,'Address', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model_detail,'Address', array('class'=>'form-control')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model_detail,'City', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model_detail,'City', array('class'=>'form-control')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model_detail,'State', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model_detail,'State', array('class'=>'form-control')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model_detail,'CountryId', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model_detail,'CountryId', array('class'=>'form-control CountryId')); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model_detail,'DayOfJoin', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model_detail,'DayOfJoin', array('class'=>'form-control Date')) ;?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model_detail,'Phone', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model_detail,'Phone', array('class'=>'form-control')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model_detail,'Fax', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model_detail,'Fax', array('class'=>'form-control')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model_detail,'NPWP', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model_detail,'NPWP', array('class'=>'form-control')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model_detail,'Webpage', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model_detail,'Webpage', array('class'=>'form-control')) ;?>            
            </div>
        </div>
        <hr>            
    </div>

    <a class="" style="cursor:pointer;text-decoration:none;" id="btnAddContact"><i class="fi-plus"></i> Add New Contact Person</a>    
    <?php
        $index = 0;        
        foreach ($list as $id => $HContactPerson):
            $this->renderPartial('contactperson', array(
                'model_hcontact' => $HContactPerson,
                'index' => $id,
                'display' => 'block'
            ));
            $index++;
        endforeach;
    ?>

<!-- 
    <a class="" style="cursor:pointer;text-decoration:none;" id="btnAddContact"><i class="fi-plus"></i> Add New Contact Person</a>
    <div id="customer-contact-form">
        <?php echo $form->hiddenField($model_detail,'CustomerId') ?>
        <div id='contact_person'>
            <a style="cursor:pointer;text-decoration:none;" onclick="delContact(this)"><i class="fi-minus"></i></a>
            <div id="contact_person_group">
                <div class="form-group" id="contact_person_detail">
                    <div class="col-1"><span class="pull-right"></span>
                        <?php //echo $form->labelEx($model_hcontact,'Name', array('class'=>'control-label col-lg-1')); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php //echo $form->textField($model_hcontact,'Name', array('class'=>'form-control')) ;?>            
                    </div>
                    <div class="col-1"><span class="pull-right"></span>
                        <?php //echo $form->labelEx($model_hcontact,'Email', array('class'=>'control-label col-lg-1')); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php //echo $form->textField($model_hcontact,'Email', array('class'=>'form-control')) ;?>            
                    </div>
                    <div class="col-1"><span class="pull-right"></span>
                        <?php// echo $form->labelEx($model_hcontact,'Job', array('class'=>'control-label col-lg-1')); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php// echo $form->textField($model_hcontact,'Job', array('class'=>'form-control')) ;?>            
                    </div>         
                </div>

                <a style="cursor:pointer;text-decoration:none;" onclick="addPhone(this)"><i class="fi-plus"></i> Add New Phone</a>
                <div id="contact_person_phone_field">
                    <div id="contact_person_phone">
                        <a style="cursor:pointer;text-decoration:none;" onclick="delPhone(this)"><i class="fi-minus"></i></a>
                        <div class="form-group">
                            <div class="col-1"><span class="pull-right"></span>
                                <?php //echo $form->labelEx($model_dcontact,'Phone', array('class'=>'control-label col-lg-1')); ?>
                            </div>
                            <div class="col-lg-3">
                                <?php //echo $form->textField($model_dcontact,'Phone', array('class'=>'form-control')) ;?>            
                            </div> 
                            <div class="col-lg-2">
                                <?php //echo $form->textField($model_dcontact,'PhoneTypeId', array('class'=>'form-control PhoneType')) ;?>            
                            </div> 
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div> -->
    
    <div class="panel-footer">
        <div>
            <a class="btn btn-default" href="<?php echo Yii::app()->createUrl('um/customer') ?>">
               <i class="glyphicon glyphicon-remove" style="display:block;font-size:26px;"></i>Cancel
            </a>
            <button type="submit" class="btn btn-default pull-right">
               <i class="glyphicon glyphicon-floppy-disk" style="display:block;font-size:26px;"></i>Save
            </button>
            <!-- <a class="btn btn-default pull-right" id = "btnSave">
               <i class="glyphicon glyphicon-floppy-disk" style="display:block;font-size:26px;"></i>Save
            </a> -->
        </div>
    </div>
    

        </div><!-- form -->
    </div>
</div>

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/jquery-ui.min.css">  
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2-bootstrap.css" />

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/jquery-ui.min.js"></script>

<script>
    $('.Date').datepicker();    

    $('#btnSave1').click(function(e){

        $HContactPerson = $('input[name*="HContactPersonForm"]');
        $DContactPerson = $('input[name*="DContactPersonForm"]');
        $CustomerDetail = $('input[name*="CustomerForm"]');

        //var Customer = {};
        var CustomerForm = {};

        $.each($CustomerDetail, function(index, obj){
            CustomerForm[obj.name.replace('CustomerForm','').replace('[','').replace(']','')] = obj.value;
        });        
        //Customer["CustomerForm"] = CustomerForm;        

        $HContactPerson = $('input[name*="HContactPersonForm"]').parent().parent();

        var HContactPerson = {};
        //var HContactPerson2 = {};

        $.each($HContactPerson, function(index, obj){
            $HContactPersonForm = $(obj).find('input[name*="HContactPersonForm"]');

            var HContactPersonForm = {};

            $.each($HContactPersonForm, function(index2, obj2){
                HContactPersonForm[obj2.name.replace('HContactPersonForm','').replace('[','').replace(']','')] = obj2.value;                
            });

            $DContactPerson = $(obj).next().next().find('input[name*="DContactPersonForm"]').parent().parent();

            var DContactPerson = {};        
            var DContactPerson2 = {};

            $.each($DContactPerson, function(index3, obj3){
                $DContactPersonForm = $(obj3).find('input[name*="DContactPersonForm"]');
                
                var DContactPersonForm = {};
                
                $.each($DContactPersonForm, function(index4, obj4){
                    DContactPersonForm[obj4.name.replace('DContactPersonForm','').replace('[','').replace(']','')] = obj4.value;                    
                });
                DContactPerson2[index3] = DContactPersonForm;
            });
            
            HContactPersonForm["DContactPersonForm"] = DContactPerson2;
            //HContactPerson2[index] = HContactPersonForm;
            HContactPerson[index] = HContactPersonForm;
            
        });

        //HContactPerson["HContactPersonForm"] = HContactPerson2;
        //HContactPerson["HContactPersonForm"] = HContactPerson;
        
        $.ajax({
            type:"POST",
            url: "<?php echo Yii::app()->request->baseUrl;?>/customer/ValidateForm",
            data: { CustomerForm: CustomerForm, HContactPersonForm: HContactPerson},
            success : function(response){
                console.log(response);
              }
        })
    });
    
    $(".CountryId").select2({
        placeholder: '',
        query: function(query) {
            $.ajax({
                url: "<?php echo Yii::app()->request->baseUrl;?>/customer/GetCountryList", 
                data: { ajax: 1, },
                dataType: 'json',
                type: "POST",
                success: function(data) {
                    var data1 = $.map(data, function (item) {
                        return {
                            text: item.Country,
                            id: item.CountryId
                        }
                    });
                    query.callback({results: data1});
                }
            })
        },
        initSelection: function(element, callback) {
            var id = $(element).val();
            if(id !== "") {
                $.ajax("<?php echo Yii::app()->request->baseUrl;?>/customer/GetCountryList", {
                    data: {id: id, ajax: 1, },
                    dataType: "json", type: "POST"
                }).done(function(data) {
                    if (data.length > 0){
                        callback({"text":data[0].Country});
                    }
                });
            }
        }
    });

    $(".CompanyTypeId").select2({
        placeholder: '',
        query: function(query) {
            $.ajax({
                url: "<?php echo Yii::app()->request->baseUrl;?>/customer/GetCompanyTypeList", 
                data: { ajax: 1, },
                dataType: 'json',
                type: "POST",
                success: function(data) {
                    var data1 = $.map(data, function (item) {
                        return {
                            text: item.CompanyType,
                            id: item.CompanyTypeId
                        }
                    });
                    query.callback({results: data1});
                }
            })
        },
        initSelection: function(element, callback) {
            var id = $(element).val();
            if(id !== "") {
                $.ajax("<?php echo Yii::app()->request->baseUrl;?>/customer/GetCompanyTypeList", {
                    data: {id: id, ajax: 1, },
                    dataType: "json", type: "POST"
                }).done(function(data) {
                    if (data.length > 0){
                        callback({"text":data[0].CompanyType});
                    }
                });
            }
        }
    });

    function PhoneTypeSelect2(e){        
        $(e).find(".PhoneType:last").select2({
            placeholder: '',
            query: function(query) {
                $.ajax({
                    url: "<?php echo Yii::app()->request->baseUrl;?>/customer/GetPhoneTypeList", 
                    data: { ajax: 1, },
                    dataType: 'json',
                    type: "POST",
                    success: function(data) {
                        var data1 = $.map(data, function (item) {
                            return {
                                text: item.PhoneType,
                                id: item.PhoneTypeId
                            }
                        });
                        query.callback({results: data1});
                    }
                })
            },
            initSelection: function(element, callback) {
                var id = $(element).val();
                if(id !== "") {
                    $.ajax("<?php echo Yii::app()->request->baseUrl;?>/customer/GetPhoneTypeList", {
                        data: {id: id, ajax: 1, },
                        dataType: "json", type: "POST"
                    }).done(function(data) {
                        if (data.length > 0){
                            callback({"text":data[0].PhoneType});
                        }
                    });
                }
            }
        });
    }

    PhoneTypeSelect2($('body'));

    <?php        
        Yii::app()->clientScript->registerScript('loadContact', '
        var _index = ' . $index . ';
        $("#btnAddContact").click(function(e){
            e.preventDefault();            
            $.ajax({
                url: "'. Yii::app()->request->baseUrl . '/customer/addNewContact",
                data: { "index" : _index },
                dataType : "html",
                success:function(response){                    
                    $contact_person_clone =  $(response).find("#contact_person").clone().attr("id", "").attr("style","");
                    $contact_person_clone.appendTo("#contact_person");
                    console.log($contact_person_clone);
                }
            });
            _index++;
        });
    ', CClientScript::POS_END);
    ?>

    $("#btnAddContact").click(function(e){        

        // $.ajax({
        //     type:"POST",            
        //     url: "<?php echo Yii::app()->request->baseUrl;?>/customer/addNewForm",
        //     data: {'form':"<?php $form ?>"},
        //     dataType : "html"
        //     success : function(response){
                
        //         $contact_person_clone =  $(response).find('#contact_person_hdn').clone().attr('id', '').attr('style','');
        //         $contact_person_clone.find('#hdnPhoneType').attr('id','').attr('class', 'PhoneType');      
        //         $contact_person_clone.appendTo('#contact_person');
        //         PhoneTypeSelect2('#contact_person');                 
        //       } 
        // })
        /*
        $contact_person_clone =  $('#contact_person_hdn').clone().attr('id', '').attr('style','');
        $contact_person_clone.find('#hdnPhoneType').attr('id','').attr('class', 'PhoneType');
        $contact_person_clone.appendTo('#contact_person');
        PhoneTypeSelect2('#contact_person');
        */
        
    });

    

    function addPhone(e){

        $.ajax({
            type:"POST",            
            url: "<?php echo Yii::app()->request->baseUrl;?>/customer/addNewForm",
            data: {'form':"<?php $form ?>"},
            dataType : "html",
            success : function(response){                
                $phoneclone =  $(response).find('#contact_person_phone_hdn').clone().attr('id', '').attr('style','');                
                $phoneclone.find('#hdnPhoneType').attr('id','').attr('class', 'PhoneType');
                $phoneclone.appendTo($(e).next());
                PhoneTypeSelect2($(e).next());
              } 
        })
        /*
        $phoneclone = $('#contact_person_phone_hdn').clone().attr('id', '').attr('style','');
        $phoneType = $phoneclone.find('#hdnPhoneType').attr('id','').attr('class', 'PhoneType');

        $phoneclone.appendTo($(e).next());
        
        PhoneTypeSelect2($(e).next());
        */
    }

    function delContact(e){
        $(e).next().remove();
        $(e).remove();
    }

    function delPhone(e){
        $(e).next().remove();
        $(e).remove();
    }
</script>