<?php
/**
 * Comment Model
 * 
 * @author Aotoki
 * @version 1.0
 */

class Comment extends ActiveMongo
{
	public $nickname = 'Unknow';
	public $content;
	public $timestamp;	
}
