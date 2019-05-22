<?php
	/**
	 * 
	 */
	abstract class NewsManager
	{
		
		abstract function add(News $news);
		abstract function update(News $news);
		abstract function getList($offset, $limit);
		abstract function getNews($id);

		function save(News $news){
			if($news->isNew())
			{
				$this->add($news);
			}
			else
			{
				$this->update($news);
			}
		}

	}
?>