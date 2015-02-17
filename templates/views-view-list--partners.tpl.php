<?php
	//$view->result[$delta]->_field_data['nid']['entity']->field_file['und']
?>

<div class="partners" style="padding-top:100px;">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<h1>
					Partners
				</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<ul class="list-inline">
					<?php foreach ($view->result as $delta => $item): ?>
						<li>
							<div class="partner">
								<!--<img src="./images/washington.jpg" class="img-responsive" alt="Partner" />-->
								
								<p>
									<a href="javascript: void(0);">
										<?php print $view->result[$delta]->_field_data['uid']['entity']->field_contact_email['und'][0]['value']; ?>
									</a>
								</p>
							</div>
						</li>
						
						<?php var_dump($view->result[$delta]->_field_data['uid']['entity']->uid); ?>
					<?php endforeach; ?>

				</ul>
			</div>
		</div>

	</div>

</div>
