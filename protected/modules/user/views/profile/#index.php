<?php
$this->breadcrumbs=array(
	Yii::t('user','Administration')=>array('/user'),
	Yii::t('user','User'),
);

$this->menu=array(
    array('label'=>Yii::t('user','Create User'), 'url'=>array('create')),
    array('label'=>Yii::t('user','Manage Users'), 'url'=>array('admin')),
    array('label'=>Yii::t('user','List User'), 'url'=>array('/user')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});	
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");



//echo $test->company;?>
    <script type="text/javascript">
        $(document).ready(function(){

            var show_per_page = 10;
            var number_of_items = $('#content').children().size();
            var number_of_pages = Math.ceil(number_of_items/show_per_page);
            //alert(number_of_items)

            $('#current_page').val(0);
            $('#show_per_page').val(show_per_page);

            var navigation_html = '<ul><li ><a href="javascript:previous();"><span class="icon-arrow-left"></span></a></li>';
            var current_link = 0;
            while(number_of_pages > current_link){
                $('.pagination').css('display', 'table-row');
                navigation_html += '<li class="page_link" longdesc="' + current_link +'" ><a  href="javascript:go_to_page(' + current_link +')" >'+ (current_link + 1) +'</a></li>';
                current_link++;
            }
            navigation_html += '<li><a href="javascript:next();"><span class="icon-arrow-right"></span></a></li></ul>';

            $('.pagination').html(navigation_html);

            $('.pagination .page_link:first').addClass('active');

            $('#content').children().css('display', 'none');

            $('#content').children().slice(0, show_per_page).css('display', 'table-row');

        });

        function next(){
            new_page = parseInt($('#current_page').val()) + 1;
            if($('.active').next('.page_link').length==true){
                go_to_page(new_page);
            }

        }

        function previous(){

            new_page = parseInt($('#current_page').val()) - 1;
            if($('.active').prev('.page_link').length==true){
                go_to_page(new_page);
            }

        }


        function go_to_page(page_num){
            var show_per_page = parseInt($('#show_per_page').val());

            start_from = page_num * show_per_page;

            end_on = start_from + show_per_page;



            $('#content').children().css('display', 'none').slice(start_from, end_on).css('display', 'table-row');

            $('.page_link[longdesc=' + page_num +']').addClass('active').siblings('.active').removeClass('active');

            $('#current_page').val(page_num);
        }
    </script><!--For pagination  End-->

    <style>
        .page_link{ }

        .page_link.active {
            font-size: 12px;
            font-weight: bold;

        }


    </style>




	<!-- Right (content) side -->
			<div class="content-block" role="main">
			

				
					<!-- Data block -->
					<article class="data-block">
						<div class="data-container">
						
							
		
								<!-- Tab #static -->
								<div class="tab-pane active" id="static">
								
									
									
									
									<table class="table table-hover" >

                                    </table>
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th>Date of Birth</th>
                                            <th>Gender</th>
                                            <th>Role</th>

                                            <th></th>
                                        </tr>
                                        </thead>
										<tbody id='content' >


                                        <?php foreach($model as $data):?>

											<tr>

												<td><?php echo $data->first_name.' '.$data->last_name;?></td>
												<td><?php echo $data->email;?></td>
												<td><?php echo $data->dob;?></td>
												<td><?php echo $data->gender;?></td>
                                                <td><?php echo $data->role;?></td>
                                                
                                                <td class="toolbar">
													<div class="btn-group">

														<a href="<?php echo yii::app()->request->baseUrl;?>/index.php/user/admin/update/id/<?php echo $data->id;?>"><button class="btn"><span class="icon-edit"></span></button></a>
														<a href="<?php echo yii::app()->request->baseUrl;?>/index.php/user/admin/delete/id/<?php echo $data->id;?>"><button class="btn"><span class="icon-trash"></span></button></a>
													</div>
												</td>

											</tr>
											<?php  endforeach; ?>
                                        </tbody>

											

									</table>


                                 <!--   <div id='content'>


                                    </div>-->

                                    <!--<div id='page_navigation' style="display:none; text-align:center;"></div>-->


								</div>
								<!-- /Tab #static -->
                           
								
							</section>



					</article>
					<!-- /Data block -->
					
				</div>
				<!-- /Grid row -->

                <div class="data-container" style="margin-top:30px;">





                    <div class="pull-right ">


                        <input type='hidden' id='current_page' />
                        <input type='hidden' id='show_per_page' />

                        <div class="pagination"></div>

                    </div>

                </div>

    <div class="data-container">

        <div class="span3 "><a href="<?php echo yii::app()->request->baseUrl;?>/index.php/user/admin/create">Add Family Member</a></div>



    </div>


				

</div>
			<!-- /Right (content) side -->
<?php /*?>
			<div class="content-block" role="main">

				<!-- Page header -->
				<article class="page-header">
					<h1>Admin</h1>


				</article>
				<!-- /Page header -->

				<!-- Grid row -->
				<div class="row">

					<!-- Data block -->
					<article class="span12 data-block">


							<section class="tab-content">

								<!-- Tab #static -->
								<div class="tab-pane active" id="static">

<!--<h1><?php echo Yii::t('user',"Manage Users"); ?></h1>

<p><?php echo Yii::t('user',"You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done."); ?></p>

<?php echo CHtml::link(Yii::t('user','Advanced Search'),'#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'id',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
		),
		array(
			'name' => 'company',
			'type'=>'raw',
			'value' => 'CHtml::link(UHtml::markSearch($data,"company"),array("admin/view","id"=>$data->id))',
		),
		array(
			'name'=>'email',
			'type'=>'raw',
			'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
		),
		'create_at',
		'lastvisit_at',
		array(
			'name'=>'superuser',
			'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
			'filter'=>User::itemAlias("AdminStatus"),
		),
		array(
			'name'=>'status',
			'value'=>'User::itemAlias("UserStatus",$data->status)',
			'filter' => User::itemAlias("UserStatus"),
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


								</div>
								<!-- /Tab #static -->


							</section>

					</article>
					<!-- /Data block -->

				</div>
				<!-- /Grid row -->
			*/ ?>


			</div>
