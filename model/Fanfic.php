<?php
/**
 * Класс, отвечающий за фанфики
 */
class Fanfic {
	/**
	 * Получение списка из 3 последних фанфиков
     * отсортирован по дате публикации
	 * @param $link ресурс подключения к БД
	 * @return [] массив фанфиков
	 */
	static function getList($link) {
		$query = "SELECT * FROM `fanfics` order by `date-publish` DESC LIMIT 3";
        return run_query($link, $query);
	}
    
    /**
	 * Получение списка всех фанфиков
     * отсортирован по дате написания
	 * @param $link ресурс подключения к БД
	 * @return [] массив фанфиков
	 */
	static function getAllList($link) {
		$query = "SELECT * FROM `fanfics` order by `year` DESC";
        return run_query($link, $query);
	}
}