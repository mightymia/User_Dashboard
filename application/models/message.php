<?php
class Message extends CI_model
{
	function create_message($message)
	{
		$query= "INSERT INTO messages (message, created_at, updated_at, user_id, sender_id) VALUES (?, now(), now(), ?, ?)";
		$values= array($message['message'], $message['user_id'], $message['sender_id']);
		return $this->db->query($query, $values);
	}
	function show_user_messages($user_id)
	{
		$query = "SELECT first_name, last_name, messages.created_at, message, message_id, sender_id, messages.user_id FROM messages
					LEFT JOIN users
					ON messages.sender_id = users.user_id
					WHERE messages.user_id = ?
					ORDER BY messages.updated_at DESC";
		$value = $user_id;
		return $this->db->query($query, $value)->result_array();
	}
	function create_comment($comment)
	{
		$query= "INSERT INTO comments (comment, created_at, updated_at, user_id, message_id, sender_id) VALUES (?, now(), now(), ?, ?, ?)";
		$values= array($comment['comment'], $comment['user_id'], $comment['message_id'], $comment['sender_id']);
		return $this->db->query($query, $values);
	}

	function show_comments($message_id)
	{
		$query = "SELECT first_name, last_name, comments.created_at, comment, comments.message_id, comments.sender_id FROM comments
					LEFT JOIN messages
					ON comments.message_id = messages.message_id
					LEFT JOIN users
					ON comments.sender_id = users.user_id
					WHERE comments.message_id = ?
					ORDER BY comments.updated_at ASC";
		$value = $message_id;
		return $this->db->query($query, $value)->result_array();
	}
}