<?
/**
 * Block Name: Accordion
 *
 * This is the template that displays the Accordion block.
 */

// get image field (array)
$rows = get_field('twp-accordion');

if( $rows ) {?>
	<div class="twp-accord">
		<?foreach( $rows as $key=>$row ) {?>
			<div id="twp-accord-<? echo $key; ?>" class="twp-accord__item">
				<div class="twp-accord-title">
					<h3 class="twp-accord-title__text"><? echo $row['twp-accordion--title']; ?></h3>
					<img class="twp-accord-title__plus" src="/testwp/wp-content/themes/twentytwentythree-child-2/img/twp-plus.svg"/>
				</div>
				<div class="twp-accord-desc"><? echo $row['twp-accordion--desc']; ?></div>
			</div>
		<?}?>
	</div>
<?}?>

<style>
	.twp-accord__item {
		height: 84px;
		overflow: hidden;
		background-color: #fff;
	}
	
	.twp-accord__item--active {
		height: auto;
	}
	
	.twp-accord__item:not(:last-child) {
		margin-bottom: 33px;
	}
	
	.twp-accord-title {
		display: flex;
		justify-content: space-between;
		align-items: center;
		background-color: #fff;
		padding: 27px 20px 27px 36px;
	}
	
	.twp-accord-title h3 {
		font-family: 'GT Eesti Pro Text';
		font-style: normal;
		font-weight: 400;
		font-size: 28px;
		line-height: 30px;
		margin: 0;
		cursor: pointer;
	}
	
	.twp-accord-title__plus {
		width: 24px;
		height: 24px;
		cursor: pointer;
	}
	
	.twp-accord-desc {
		font-family: 'GT Eesti Pro Display';
		font-style: normal;
		font-weight: 300;
		font-size: 20px;
		line-height: 28px;
		padding: 0px 77px 48px 39px;
	}
</style>

<script>
	jQuery(document).ready(function ($) {
		$('.twp-accord-title__text').click(function () {
			let current = $(this).parents('.twp-accord__item');
			if (current.hasClass('twp-accord__item--active')) {
				current.removeClass('twp-accord__item--active');
				current.find('.twp-accord-title__plus').attr('src','/testwp/wp-content/themes/twentytwentythree-child-2/img/twp-plus.svg');
			}else{
				current.addClass('twp-accord__item--active');
				current.find('.twp-accord-title__plus').attr('src','/testwp/wp-content/themes/twentytwentythree-child-2/img/twp-minus.svg');
			}
		});
		
		$('.twp-accord-title__plus').click(function () {
			let current = $(this).parents('.twp-accord__item');
			if (current.hasClass('twp-accord__item--active')) {
				current.removeClass('twp-accord__item--active');
				$(this).attr('src','/testwp/wp-content/themes/twentytwentythree-child-2/img/twp-plus.svg');
			}else{
				current.addClass('twp-accord__item--active');
				$(this).attr('src','/testwp/wp-content/themes/twentytwentythree-child-2/img/twp-minus.svg');
			}
		});
	});
</script>