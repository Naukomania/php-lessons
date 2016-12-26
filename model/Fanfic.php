<?php
/**
 * Класс, отвечающий за фанфики
 */
class Fanfic {
	/**
	 * Получение списка из 3 последних фанфиков
	 * @param $link ресурс подключения к БД
	 * @return [] массив фанфиков
	 */
	static function getList($link) {
		$query = "SELECT * FROM `fanfics` order by `date-publish` DESC LIMIT 3";
        return run_query($link, $query);
	}
}