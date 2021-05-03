<?php
/**
* @package block_testblock
* @author vimlesh
* @license https://webii.in
**/

/**
 * Block HTML
 */
class block_testblock extends block_base
{
	
	function init(){
		$this->title = get_string('pluginname','block_testblock');
	}
	function has_config(){
		return true;
	}
	function get_content(){
		global $DB;
		if($this->content!==NULL){
			return $this->content;
		}

		$showourses = get_config('block_testblock','showcourses');
		if($showourses){
			$cources = $DB->get_records('course');
			$content='<h2>Courses</h2>';
			foreach ($cources as $key => $cource) {
				$content.= $cource->fullname.'<br>';
			}

		}else{
			$users = $DB->get_records('user');
			$content='<h2>Users</h2>';
			foreach ($users as $key => $user) {
				$content.= $user->firstname.' '.$user->lastname . '<br>';
			}
		}
		$this->content = new stdClass;
		$this->content->text = $content;
		$this->content->footer = 'this in footer';
		return $this->content;
	}
	
}