<ul>
<?

	foreach ($model->education as $simple) {
		$attributes = array(
			$simple->getAttributeLabel('institution').' : '.$simple->institution,
			$simple->getAttributeLabel('faculty').' : '.$simple->faculty,
			$simple->getAttributeLabel('speciality').' : '.$simple->speciality,
			$simple->getAttributeLabel('study_form').' : '.$simple->study_form,
		);

		?><li><?=implode($attributes, ', ' )?></li><?
	}
?>
</ul>