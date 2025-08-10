<?php defined('SYSPATH') OR die('No direct script access.');
class Media_Storage_GarbageCollector implements IGarbageCollector {
	public static function checkRun(){
		if (date('H') > 0 && date('H') < 7) return true;
		return false;
	}
	
	public static function Run($log){
		
		$model = ORM::factory('Media_Storage_File');
		$modelTbl = $model->table_name();
		
		$modelExtra = ORM::factory('Media_Storage_FileExtra');
		$modelExtraTbl = $modelExtra->table_name();
		
		$currentTime = time();
		$oldDays = 1;
		$limit = 100;
		
		$oldTime = mktime(
				date("H", $currentTime),
				date("i", $currentTime),
				date("s", $currentTime),
				date("m", $currentTime),
				date("d", $currentTime) - $oldDays,
				date("Y", $currentTime)
		);
		$oldDateTime = date('Y-m-d H:i:s', $oldTime);
		
		$totalRecords = 0;
		
		do {
			
			$query = DB::select('*')->from($modelTbl)
				->where('status', '=', Model_Media_Storage_File::FILE_STATUS_TEMP)
				->and_where('created_at', '<=', $oldDateTime)
				->limit($limit);
			//$log($query);
			$records = $query->as_assoc()->execute()->as_array();
				
			$ids = array();
			$lst = array();
			foreach ($records as $record){
				$ids[] = $record['id'];
				$lst[] = array('id' => $record['id'], 'path_data' => $record['path_data'], 'file_name' => $record['file_name']);
				
				$dataStorage = Media_Storage_Data::findByCode($record['data_code']);
					
				$rpath = $record['path_data'] . DIRECTORY_SEPARATOR . $record['file_name'];
				$rpathThumb = $record['path_data'] . DIRECTORY_SEPARATOR . 'th_' .$record['file_name'];
					
				$fullpath = $dataStorage->getRootPath() . DIRECTORY_SEPARATOR . $rpath;
				$fullpathThumb = $dataStorage->getRootPath() . DIRECTORY_SEPARATOR . $rpathThumb;
					
				if ($dataStorage->isFileExist($rpathThumb)){
					$dataStorage->deleteFile($fullpathThumb);
				}
					
				$dataStorage->deleteFile($fullpath);
				
				$queryUpd = DB::update($modelTbl)->where('id', '=', $record['id'])->set(array('status'=> Model_Media_Storage_File::FILE_STATUS_DELETED));
				$queryUpd->execute();
				
			}			

			$totalRecords += count($records);
		} while(count($records)>0);
				
		$log("Media temp files cleaning records: {$totalRecords}");
		
		//delete records with status deleted
		$limit = 1000;
		$totalRecords = 0;
		
		do {
			$query = DB::select('*')->from($modelTbl)
				->where('status', '=', Model_Media_Storage_File::FILE_STATUS_DELETED)				
				->limit($limit);
			//$log($query);
			
			$records = $query->as_assoc()->execute()->as_array();
			//$log(print_r($records, true));
			$ids = array();
			foreach ($records as $record){
				$ids[] = $record['id'];
			}	
			
			if (count($ids)){
				DB::delete($modelExtraTbl)->where('file_id', 'in', $ids)->execute();
				DB::delete($modelTbl)->where('id', 'in', $ids)->execute();
			}
			
			$totalRecords += count($records);
			
		} while(count($records)>0);
		
		$log("Media deleted files cleaning records: {$totalRecords}");
	}
}