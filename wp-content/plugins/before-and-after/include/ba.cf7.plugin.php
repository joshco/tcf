<?php
class BA_CF7_Plugin
{
	var $root;
	
	public function __construct(&$root)
	{
		$this->root = $root;
		add_action("wpcf7_before_send_mail", array( $this, "capture_form_submissions") );
		
		// this filter only needs to be run when a goal was posted 
		// (not when CF7 forms are submitted outside of a goal context)
		if( isset($_REQUEST['_before_after_goal_id']) ) {
			add_action("wpcf7_ajax_json_echo", array( $this, "add_page_refresh_code") );	
		}
	}
	
	// Looks for Goals that are hooked to this form. If any are found, marks them as complete
	function capture_form_submissions ($WPCF7_ContactForm)
	{
		$form_id = $WPCF7_ContactForm->id();
		$submission = WPCF7_Submission::get_instance();
		$goal_complete_url = $submission ? trim( $submission->get_meta('url') ) : '';

		/* 
		 * If a single goal is indicated (by its ID being passed in the request, complete it
		 * Else, complete all goals associated with this form id 
		 */
		if( isset($_REQUEST['_before_after_goal_id']) ) {
			// goal ID found, so complete only the single goal
			$goal_id = intval($_REQUEST['_before_after_goal_id']);
			if ($goal_id > 0) {
				$completed = $this->root->Goal->completeGoalById($goal_id, $goal_complete_url);
			}
		}
		else {
			// no goal ID found, so complete all goals associated with this form
			$goals = $this->find_all_goals_by_form_id($form_id);
			if ( !empty($goals) ) {
				foreach ($goals as $goal) {
					$completed = $this->root->Goal->completeGoalById($goal->ID, $goal_complete_url);
				}
			}
		}
	}
	/* Adds a snippet of Javascript to the on_sent_ok setting of Contact Form 7,
	 * which will automatically refresh the page, causing the "after" of our goal to show
	 *
	 * Note: no code will be added if on_sent_ok already contains data
	 */	
	function add_page_refresh_code($items, $result = null)
	{
		$options = get_option( 'b_a_options' );
		$add_reload_code = isset( $options['reload_page_on_submit'] ) ? intval($options['reload_page_on_submit']) : 1;
		if( isset($_REQUEST['_before_after_goal_id']) && empty($items['onSentOk']) && $add_reload_code ) {
			$items['onSentOk'][] = "location.reload();";
		}
		return $items;
	}
	
	function find_all_goals_by_form_id($form_id)
	{
		$goal_selector = 'cf7_' . intval($form_id);
		$conditions = array('post_type' => 'b_a_goal', 
							'meta_key' => '_goal_selector',
							'meta_value' => $goal_selector,
							);
		$posts = get_posts($conditions);
		if ($posts) {
			return $posts;
		} else {
			return false;
		}
	}

	function find_goal_by_form_id($form_id)
	{
		$goal_selector = 'cf7_' . intval($form_id);
		$conditions = array('post_type' => 'b_a_goal', 
							'meta_key' => '_goal_selector',
							'meta_value' => $goal_selector,
							);
		$posts = get_posts($conditions);
		if ($posts) {
			return $posts[0];
		} else {
			return FALSE;
		}
	}

	
}