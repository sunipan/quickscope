<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST')
  exit(json_encode(['status' => 'request_error', 'message' => 'Request method must be POST!']));
if (!$_POST['comment'])
  exit(json_encode(['status' => 'input_error', 'message' => 'Comment cannot be empty!']));

$comment = $_POST['comment'];


require('db_connect.php');
if ($error)
  exit(json_encode(['status' => 'db_error', 'message' => 'Something went wrong, please try again']));
