<?php defined('LIBRARY') or die('No direct script access allowed');

	if(!$Auth->loggedIn()) redirect('/login');
	
	if($Input->post('action'))
    {
		$Error->blank($Input->post('name'), 'Name');
		$Error->blank($Input->post('gender'), 'Gender');
		$Error->blank($Input->post('stance'), 'Stance');
		
		if($Error->ok())
		{
			$_SESSION['profile'] = json_encode($_POST);			
			redirect('/profile/' . $_POST['action'] . '/');
		}
    }
    
	unset($_SESSION['profile']);
	unset($_SESSION['user']);
	
	$page_title = '&raquo; New Profile';
	require_once DIR_VIEW . '/devbox/_header.php'; 
	require_once DIR_VIEW . '/devbox/_navigation.php'; 
?>

<div class="wrapper">		
	<div class="container">
		<div class="row">
			<div class="span12">
			
				<?php if (!$Error->ok()): ?>
					<div class="row">
						<div style="margin-left: 40px;">
							<div class="alert-message _block-message error">
								<a class="close" href="#">×</a>
								<?php foreach ($Error->errors as $k => $v): ?>
									<p><?= $v[0]; ?></p>
								<?php endforeach ?>
						    </div>
						</div>
					</div>
				<?php endif ?>
			
				<form action="/profile/new/" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-stacked" id="profile">
					<input type="hidden" name="action" value="preview" id="action">
					
					<fieldset>
						<legend><h2>Create Your Profile</h2></legend>
						<div class="well">	
							<div class="clearfix">
								<label>Name</label>
								<div class="input">
									<input type="text" name="name" class="xxlarge validate" rel="required">
									<span class="help-block">
										Please include your full name.
									</span>
								</div>
							</div>
							
							<div class="clearfix">	
								<label>
									What is your age?
									<input type="text" id="age" name="age" style="background-color: transparent; border: 0; box-shadow: none; color:#f6931f; font-weight:bold;" />
								</label>
								<div class="input" style="width: 540px;">
									<div id="age_slider"></div>
								</div>
							</div>
							
							<div class="clearfix">		
								<label>
									How much do you weigh?
									<input type="text" id="weight" name="weight" style="background-color: transparent; border: 0; box-shadow: none; color:#f6931f; font-weight:bold;" />
								</label>
								<div class="input" style="width: 540px;">
									<div id="weight_slider"></div>
								</div>
							</div>
							
							<div class="clearfix">
								<label>Choose a soundtrack</label>
								<div class="input">
									<select name="sound">
										<?php for ($i = 1; $i <= 10; $i++): ?>
											<option value="<?=$i ?>"><?= $i ?></option>
										<?php endfor ?>
									</select>
								</div>
							</div>
							
							<div class="clearfix">
								<label>Choose a music genre</label>
								<div class="input">
									<select name="music">
										<?php for ($i = 1; $i <= 10; $i++): ?>
											<option value="<?=$i ?>"><?= $i ?></option>
										<?php endfor ?>
									</select>
								</div>
							</div>
						</div>
					</fieldset>
					
					<fieldset>
						<div class="well">
							<legend>Choose your gender</legend>
							<div class="clearfix">													
								<div class="floatleft" style="margin: 20px;">
									<label for="male">
										<img src="/assets/images/nexersys/male_icon.jpg"><br />
										Male
										<input type="radio" name="gender" value="1" id="male">
									</label>
								</div>					
						
								<div class="floatleft" style="margin: 20px;">
									<label for="female">
										<img src="/assets/images/nexersys/female_icon.jpg"><br />
										Female
										<input type="radio" name="gender" value="2" id="female">
									</label>
								</div>
							</div>
						</div>
					</fieldset>
					
					<fieldset>
						<div class="well">
							<legend>Choose your stance</legend>
							<div class="clearfix">													
								<div class="floatleft" style="margin: 20px;">
									<label for="orthodox">
										<img src="/assets/images/nexersys/stance_orthodox.jpg"><br />
										Orthodox
										<input type="radio" name="stance" value="1" id="orthodox">
									</label>
								</div>					
						
								<div class="floatleft" style="margin: 20px;">
									<label for="southpaw">
										<img src="/assets/images/nexersys/stance_southpaw.jpg"><br />
										Southpaw
										<input type="radio" name="stance" value="2" id="southpaw">
									</label>
								</div>
							</div>
						</div>
					</fieldset>
					
					<div class="actions">
						<input type="button" value="Add another user" class="btn primary add-profile"> 
						<input type="submit" value="Finish &amp; Preview" class="btn success"> 
					</div>
				</form>
			</div>
		</div>
	</div>

<?php require_once DIR_VIEW . '/devbox/_footer.php'; ?>