<?php

class User extends CI_Model
{
//------- For user dashboard -------------
	function show_all_users()
	{
		return $this->db->query('SELECT * FROM users')->result_array();
	}

	function get_user_by_email($email)
	{
		return $this->db->query('SELECT * FROM users WHERE email = ?', array($email)) ->row_array();
	}

	function get_user($user_id)
	{
		return $this->db->query('SELECT * FROM users WHERE user_id = ?', array($user_id)) ->row_array();
	}
	function insert_new($user)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, userlevel, description, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, now(), now())";
		$values = array($user['first_name'], $user['last_name'], $user['email'], $user['password'], $user['userlevel'], $user['description']);
		return $this->db->query($query, $values);
	}

	function remove_user($user)
	{
		$query='DELETE FROM users WHERE id = ?';
		$value = array($user['id']);
		return $this->db->query($query, $value);
	}

	function update_user($user)
	{
		$query = "UPDATE users SET first_name = ?,
									last_name = ?,
									email = ?,
									userlevel = ?,
									updated_at = now()
								WHERE user_id = ?";
		$values = array($user['first_name'], $user['last_name'], $user['email'], $user['userlevel'], $user['user_id']);
		return $this->db->query($query, $values);
	}
	function update_password($user)
	{
		$query = "UPDATE users SET password = ?, updated_at = now() WHERE user_id = ?";
		$values = array($user['password'], $user['user_id']);
		return $this->db->query($query, $values);
	}
	function update_description($user)
	{
		$query = "UPDATE users SET description = ?, updated_at = now()
								WHERE user_id = ?";
		$values = array($user['description'], $user['user_id']);
		return $this->db->query($query, $values);
	}
}