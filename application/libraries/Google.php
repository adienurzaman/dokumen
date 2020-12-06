<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Google
{
	public function __construct()
	{
		require './vendor/autoload.php';
		$scope = array(
			"https://www.googleapis.com/auth/drive",
			"https://www.googleapis.com/auth/drive.file",
			"https://www.googleapis.com/auth/drive.readonly",
			"https://www.googleapis.com/auth/drive.metadata.readonly",
			"https://www.googleapis.com/auth/drive.appdata",
			"https://www.googleapis.com/auth/drive.apps.readonly",
			"https://www.googleapis.com/auth/drive.metadata",
			"https://www.googleapis.com/auth/drive.photos.readonly",
			
			"https://www.googleapis.com/auth/plus.login",
			"https://www.googleapis.com/auth/plus.me",
			"https://www.googleapis.com/auth/userinfo.email",
			"https://www.googleapis.com/auth/userinfo.profile"
		);
		$this->client = new Google_Client();
		$this->client->setAuthConfig(APPPATH . "libraries/oauth-credential.json");
		$this->client->addScope($scope);
		$this->service = new Google_Service_Drive($this->client);
		$this->oauth2 = new Google_Service_Oauth2($this->client);
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

	public function isAccessTokenExpired()
	{
		return $this->client->isAccessTokenExpired();
	}

	public function getUserInfo() {
		return $this->oauth2->userinfo->get();
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
		$id = "1N0cKQ7rnANbCTIBiOQL9Y0pEznrOd43C";
		$parameter = array(
			'q' => "'" . $id . "' in parents"
		);
		$files = $this->service->files->listFiles($parameter);
		return $files->getFiles();
	}

	public function get_file($fileId)
	{
		try {
			$file = $this->service->files->get($fileId);

			print "Title: " . $file->getName();
			print "<br>Url: " . $file->getWebContentLink();
			print "<br> Description: " . $file->getDescription();
			print "<br> MIME type: " . $file->getMimeType();
		} catch (Exception $e) {
			print "An error occurred: " . $e->getMessage();
		}
	}

	public function delete_file($fileId)
	{
		try {
			$file = $this->service->files->delete($fileId);
			if ($file) {
				return true;
			} else {
				return false;
			}
		} catch (Exception $e) {
			print "An error occurred: " . $e->getMessage();
		}
	}

	public function download_file($fileId)
	{
		try {
			$file = $this->service->files->delete($fileId);
			if ($file) {
				return true;
			} else {
				return false;
			}
		} catch (Exception $e) {
			print "An error occurred: " . $e->getMessage();
		}
	}
}

/* End of file Google.php */
/* Location: .//C/Users/aiman/AppData/Local/Temp/fz3temp-2/Google.php */