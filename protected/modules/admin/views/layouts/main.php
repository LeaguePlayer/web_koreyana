<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <title><?php echo CHtml::encode(Yii::app()->config->get('app.name')).' | Admin';?></title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>

        <?php
            $menuItems = array(
                array('label'=>'Разделы сайта', 'url'=>array('/admin/structure')),
                array('label'=>'Меню сайта', 'url'=>array('/admin/menu')),
                array('label'=>'Заявки', 'items'=>array(
                    array('label'=>'Звонки', 'url'=>'/admin/calls/list'),
                    array('label'=>'Записи на сервис', 'url'=>array('/admin/record')),
                    array('label'=>'Резюме', 'url'=>array('/admin/Resume')),
                    ),
                ),
                array('label'=>'Настройки', 'url'=>array('/admin/config')),
                array('label'=>'Бот', 'url'=>array('/admin/requestsBot')),
            );
        ?>
        <?php
            $userlogin = Yii::app()->user->name ? Yii::app()->user->name : Yii::app()->user->email;

            $langs_avail = array();
            $select_lang = null;
            foreach(RequestsBot::getOffices() as $id_office => $lang)
                {
                    // var_dump($lang);
                    if($id_office == Yii::app()->request->cookies['office']->value) $select_lang = RequestsBot::getOffices($id_office);

                    // var_dump( $select_lang);
                    $langs_avail[] = array('label'=>RequestsBot::getOffices($id_office), 'url'=>array('/admin/config/changeLang', 'lang'=>$id_office));
                }
// die();
            $this->widget('bootstrap.widgets.TbNavbar', array(
                'color'=>'inverse', // null or 'inverse'
                'brandLabel'=> CHtml::encode(Yii::app()->name),
                'brandUrl'=>'/',
                'collapse'=>true, // requires bootstrap-responsive.css
                'items'=>array(
                    array(
                        'class'=>'bootstrap.widgets.TbNav',
                        'items'=>$menuItems,
                    ),
                    array(
                        'class'=>'bootstrap.widgets.TbNav',
                        'htmlOptions'=>array('class'=>'pull-right'),
                        'items'=>array(
                            array('label'=>'Выбран '.$select_lang, 'url'=>array('/admin/orders'), 'items'=>$langs_avail),
                            array('label'=>'Выйти ('.$userlogin.')', 'url'=>'/user/logout'),
                        ),
                    ),
                ),
            ));
        ?>

        <?php echo $content;?>

	</body>
</html>
