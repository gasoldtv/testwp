<?
/**
 * Block Name: Person
 *
 * This is the template that displays the Person block.
 */

// get image field (array)
$avatar = get_the_post_thumbnail_url(get_the_ID(), 'full');
$position = get_field('twp-position');
$mail = get_field('twp-mail');

?>
<div class="twp-person">
	<img class="twp-person__avatar" src="<? echo $avatar; ?>"/>
	<h3 class="twp-person__position"><? echo $position;?></h3>
	<a class="twp-person__mail" href="mailto:<?echo $mail;?>"><? echo $mail;?></a>
</div>
<style>
	.twp-person {
		width: 100%;
		display: flex;
		flex-direction: column;
	}
	
	.twp-person__avatar {
		width: 100%;
		height: auto;
		border-radius: 50%;
		margin-bottom: 24px;
	}
	
	.twp-person__position {
		font-family: 'Ruberoid';
		font-weight: 400;
		font-size: 26px;
		line-height: 32px;
		text-align: center;
		padding-bottom: 10px;
		border-bottom: 1px solid #E0E2EE;
		margin: 0;
		margin-bottom: 6px;
	}
	
	a.twp-person__mail {
		font-family: 'Ruberoid';
		font-weight: 400;
		font-size: 24px;
		line-height: 50px;
		text-align: center;
		color: #EF823F;
		text-decoration: none;
	}
</style>