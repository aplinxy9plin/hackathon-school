<?php
	require_once 'dropbox.class.php';
	$dropb = new dropbox_neatek_class('QGmzUUaJWMAAAAAAAAAKky699yWe3_uqs9AV3UXY5Q4');

	$params = array(
   'cursor'=> $cursor, // you can get cursor - get_lastest_cursor($folder = '', $params = array())
   'sdk_dp_save'=>true
	);
	$data = $dropb->request('files', 'list_folder', $params);
	foreach ($dropb->get_entries() as $key => $value) {
	   $dropb->entry($key);
	   if($dropb->entry_is_file() && !$dropb->entry_deleted()) {
	   	var_dump($dropb->entry_filepath());
	   	var_dump($dropb->heavy_share_path($dropb->entry_filepath(),true));
	   }
	}