<?php
/* @var $this MsMainController */
?>

<?php

$this->pageTitle = 'Manage - ' . Yii::app()->name;

$this->breadcrumbs =
		[
			'Admin',
		];
?>

<div class="container">
	<?php echo MsHtml::pageHeader("Adminstration", "mikescher.de"); ?>

	<div class="row">
		<div class="span3">
			<?php
			echo MsHtml::lead('Logs');

			echo MsHtml::stackedTabs(
				[
					['label' => 'Show',    'url' => '/log'],
					['label' => 'Manage',  'url' => '/log/admin'],
					['label' => 'Create',  'url' => '/log/create'],
				]
			); ?>
		</div>

		<div class="span3">
			<?php
			echo MsHtml::lead('Programs');

			echo MsHtml::stackedTabs(
				[
					['label' => 'Show',    'url' => '/programs'],
					['label' => 'Manage',  'url' => '/programs/admin'],
					['label' => 'Create',  'url' => '/programs/create'],
				]
			); ?>
		</div>

		<div class="span3">
			<?php
			echo MsHtml::lead('ProgramUpdates');

			echo MsHtml::stackedTabs(
				[
					['label' => 'Show',     'url' => '/programupdates'],
					['label' => 'Manage',  'url' => '/programupdates/admin'],
					['label' => 'Create', 'url' => '/programupdates/create'],
				]
			); ?>
		</div>

		<div class="span3" style="display: none">
			<?php
			echo MsHtml::lead('Programs');

			echo MsHtml::stackedTabs(
				[
					['label' => 'Home',     'url' => '#'],
					['label' => 'Profile',  'url' => '#'],
					['label' => 'Messages', 'url' => '#'],
				]
			); ?>
		</div>
	</div>

	<div class="well well-small">
		<?php
		$egh =  $egh = (new ExtendedGitGraph('Mikescher'))->loadFinishedData();
		?>

		<h2>ExtendedGitGraph</h2>
		<hr>

		<strong>Last Update: </strong> <?php echo $egh['creation']->format('d.m.Y H:i'); ?> <br>
		<strong>Repositories: </strong> <?php echo $egh['repos']; ?> <br>
		<strong>Commits: </strong> <?php echo $egh['total']; ?> <br>

		<br><br>

		<a class="btn btn-primary" href="?do_egh_update=1"> Update </a>

	</div>
</div>