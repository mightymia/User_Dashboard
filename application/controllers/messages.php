<?php
class Messages extends CI_Controller 
{
	//----------- User Info page ---------
	function user_info_page($user_id)
	{
		$this->load->model('user');
		$user = $this->user->get_user($user_id);
		$this->load->model('message');
		$list = $this->message->show_user_messages($user_id);
		$comments = array();
		foreach ($list as $message) 
		{
			$message_id = $message['message_id'];
			$comment = $this->message->show_comments($message_id);
			$comments[$message_id] = $comment;
		}
		$this->load->view('user_info_page', array('user' => $user, 'list' => $list, 'comments' => $comments));
	}

	function insert_message()
	{
		if(!$this->input->post('message'))
		{
			$this->session->set_flashdata('input error', "Message can not be blank");
		}
		else
		{
			$this->load->model('message');
			$message_details = array('message' => $this->input->post('message', TRUE), 'user_id' => $this->input->post('recipent_id'),'sender_id' => $this->session->userdata('user_id'));
			$this->message->create_message($message_details);
		}
		$recip_profile = $this->input->post('recipent_id');
		redirect('/user_profile/'.$recip_profile);
	}
	function insert_comment()
	{
		if(!$this->input->post('comment'))
		{
			$this->session->set_flashdata('input error', "Comment can not be blank");
		}
		else
		{
			$this->load->model('message');
			$comment_details = array('comment' => $this->input->post('comment', TRUE), "message_id" => $this->input->post('message_id'),'sender_id' => $this->input->post('sender_id'), 'user_id' =>$this->input->post('user_id'));
			$this->message->create_comment($comment_details);
		}
		$user_id = $this->input->post('user_id');
		redirect('/user_profile/'.$user_id);

	}

}