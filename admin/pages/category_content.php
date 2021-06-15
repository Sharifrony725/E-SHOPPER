<?php 
if(isset($_POST['btn'])){
   $message = $ob_sub_admin->save_category_info($_POST);
    }
?>

	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category Form</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<h2 style="color:green"><?php if(isset($message)){echo $message;}?></h2>
					<div class="box-content">
						<form class="form-horizontal" action="" method="POST">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Category Name </label>
							  <div class="controls">
								<input name="category_name" type="text" placeholder="enter category name" class="s" id=""  data-provide="" data-items="">
							  </div>
							</div>
						

						          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Category Description</label>
							  <div class="controls">
								<textarea name="category_description" class="cleditor" id="textarea2" rows="3"></textarea>
							  </div>
							</div>

                            <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
								<select name="publication_status" id="">
                                <option value="">---Select Publication Status--</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                                </select>
							  </div>
							</div>

							<div class="form-actions">
							  <button name="btn" type="submit" name="" class="btn btn-primary">Save Category Info</button>
							  <button type="reset" class="btn">Reset</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->