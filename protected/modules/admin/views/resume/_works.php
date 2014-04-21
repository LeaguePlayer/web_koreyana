<ul>
<?

	foreach ($model->works as $simple) {
		$attributes = array(
			$simple->getAttributeLabel('wrok_duration').' : '.$simple->wrok_duration,
			$simple->getAttributeLabel('company_name').' : '.$simple->company_name,
			$simple->getAttributeLabel('company_sphere').' : '.$simple->company_sphere,
			$simple->getAttributeLabel('post').' : '.$simple->post,
			$simple->getAttributeLabel('timetable').' : '.$simple->timetable,
			$simple->getAttributeLabel('work_duties').' : '.$simple->work_duties,
		);

		?><li><?=implode($attributes, ', ' )?></li><?
	}
?>
</ul>