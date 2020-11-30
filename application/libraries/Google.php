<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Google
{
	public function __construct()
	{
		require 'public/vendor/autoload.php';
		$scope = array(
			"https://www.googleapis.com/auth/drive",
			"https://www.googleapis.com/auth/drive.file",
			"https://www.googleapis.com/auth/drive.readonly",
			"https://www.googleapis.com/auth/drive.metadata.readonly",
			"https://www.googleapis.com/auth/drive.appdata",
			"https://www.googleapis.com/auth/drive.apps.readonly",
			"https://www.googleapis.com/auth/drive.metadata",
			"https://www.googleapis.com/auth/drive.photos.readonly"
		);
		$this->client = new Google_Client();
		$this->client->setAuthConfig(APPPATH . "libraries/oauth-credential.json");
		$this->client->addScope($scope);
		$this->service = new Google_Service_Drive($this->client);
		$this->file = new Google_Service_Drive_DriveFile();
	}

	public function authURL()
	{
		return $this->client->createAuthUrl();
	}

	public function setAccessToken($token)
	{
		return $this->client->setAccessToken($token);
	}

	public function fetchAccessTokenWithAuthCode($code)
	{
		return $this->client->fetchAccessTokenWithAuthCode($code);
	}

	public function getAccessToken()
	{
		return $this->client->getAccessToken();
	}

	public function file_set_name($nama_file)
	{
		return $this->file->setName($nama_file);
	}

	public function proses_upload_file($config_upload = array())
	{
		$result = $this->service->files->create($this->file, $config_upload);
		return $result;
	}

	public function parent_folder($parent_id)
	{
		if ($parent_id != null) {
			$this->file->setParents(array($parent_id));
		}
	}

	public function revokeToken($token = null)
	{
		return $this->client->revokeToken($token);
	}

	public function getAllFiles()
	{
		// Print the names and IDs for up to 10 files.
		// $parameters = array(
		// 	$parameters['pageToken'] = $pageToken;
		// );

		// $results = $this->service->files->listFiles($parameters);
		// $pageToken = $results->getNextPageToken();
		// if (count($results->getItems()) == 0) {
		// 	echo "No files are stored in your Google Drive.\n";
		// } else {

		// 	echo "<br />Files:<br />";

		// 	foreach ($results->getItems() as $file) {
		// 		echo "File ID => " . $file->getId() . " , Title => " . $file->getTitle() . '<br /><br />';
		// 	}
		// }
		$result = array();
		$pageToken = NULL;

		do {
			try {
				$parameters = array();
				if ($pageToken) {
					$parameters['pageToken'] = $pageToken;
				}
				$files = $this->service->files->listFiles($parameters);

				$result = array_push($result, $files->getItems());
				$pageToken = $files->getNextPageToken();
			} catch (Exception $e) {
				print "An error occurred: " . $e->getMessage();
				$pageToken = NULL;
			}
		} while ($pageToken);
		return $pageToken;
	}
}

/* End of file Google.php */
/* Location: .//C/Users/aiman/AppData/Local/Temp/fz3temp-2/Google.php */