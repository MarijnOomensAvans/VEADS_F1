<?php
namespace App;

class WizardDetails {
    /**
     * @var string  Name of the app/website
     */
    private $app_name = '';
    /**
     * @var string  Url of the app/website
     */
    private $app_url = '';

    /**
     * @var string  Database hostname
     */
    private $db_host = 'localhost';
    /**
     * @var string  Database port
     */
    private $db_port = '3306';
    /**
     * @var string  Database username
     */
    private $db_user = '';
    /**
     * @var string  Database password
     */
    private $db_pass = '';
    /**
     * @var string  Database name
     */
    private $db_name = '';

    /**
     * @var string  Mail driver (stmp, sendmail, etc.)
     */
    private $mail_driver = '';
    /**
     * @var string  Mail host
     */
    private $mail_host = '';
    /**
     * @var string  Mail port
     */
    private $mail_port = '';
    /**
     * @var string  Mail username
     */
    private $mail_username = '';
    /**
     * @var string  Mail password
     */
    private $mail_password = '';
    /**
     * @var string  Mail encryption
     */
    private $mail_encryption = '';
    /**
     * @var string  Mail from address
     */
    private $mail_from_address = '';
    /**
     * @var string  Mail from name
     */
    private $mail_from_name = '';

    /**
     * @var string  Facebook app id
     */
    private $fb_app_id = '';
    /**
     * @var string  Facebook app secret
     */
    private $fb_app_secret = '';

    /**
     * @var string  Instagram client id
     */
    private $insta_client_id = '';
    /**
     * @var string  Instagram client secret
     */
    private $insta_client_secret = '';

    /**
     * @var string  Mollie key
     */
    private $mollie_key = '';

    /**
     * @var string  Google Analytics tracking id
     */
    private $analytics_tracking_id = '';
    /**
     * @var string  Google Analytics view id
     */
    private $analytics_view_id = '';

    /**
     * WizardDetails constructor.
     */
    public function __construct() {
        if (!empty(config('facebook.app_id'))) {
            $this->fb_app_id = config('facebook.app_id');
        }

        if (!empty(config('facebook.app_secret'))) {
            $this->fb_app_secret = config('facebook.app_secret');
        }

        $this->app_name = 'VEADS';
        $this->app_url = url('/');
    }

    /**
     * Append data to the object
     *
     * @param array $data   Data to append
     */
    public function append(array $data) {
        foreach($data as $key => $value) {
            if (!property_exists($this, $key)) {
                continue;
            }

            if (is_null($value)) {
                $this->$key = '';
                continue;
            }

            $this->$key = $value;
        }
    }

    /**
     * @return string
     */
    public function getAppName(): string
    {
        return $this->app_name;
    }

    /**
     * @return string
     */
    public function getAppUrl(): string
    {
        return $this->app_url;
    }

    /**
     * @return string
     */
    public function getDbHost(): string
    {
        return $this->db_host;
    }

    /**
     * @return string
     */
    public function getDbPort(): string
    {
        return $this->db_port;
    }

    /**
     * @return string
     */
    public function getDbUser(): string
    {
        return $this->db_user;
    }

    /**
     * @return string
     */
    public function getDbPass(): string
    {
        return $this->db_pass;
    }

    /**
     * @return string
     */
    public function getDbName(): string
    {
        return $this->db_name;
    }

    /**
     * @return string
     */
    public function getMailDriver(): string
    {
        return $this->mail_driver;
    }

    /**
     * @return string
     */
    public function getMailHost(): string
    {
        return $this->mail_host;
    }

    /**
     * @return string
     */
    public function getMailPort(): string
    {
        return $this->mail_port;
    }

    /**
     * @return string
     */
    public function getMailUsername(): string
    {
        return $this->mail_username;
    }

    /**
     * @return string
     */
    public function getMailPassword(): string
    {
        return $this->mail_password;
    }

    /**
     * @return string
     */
    public function getMailEncryption(): string
    {
        return $this->mail_encryption;
    }

    /**
     * @return string
     */
    public function getMailFromAddress(): string
    {
        return $this->mail_from_address;
    }

    /**
     * @return string
     */
    public function getMailFromName(): string
    {
        return $this->mail_from_name;
    }

    /**
     * @return string
     */
    public function getFbAppId(): string
    {
        return $this->fb_app_id;
    }

    /**
     * @return string
     */
    public function getFbAppSecret(): string
    {
        return $this->fb_app_secret;
    }

    /**
     * @return string
     */
    public function getInstaClientId(): string
    {
        return $this->insta_client_id;
    }

    /**
     * @return string
     */
    public function getInstaClientSecret(): string
    {
        return $this->insta_client_secret;
    }

    /**
     * @return string
     */
    public function getMollieKey(): string
    {
        return $this->mollie_key;
    }

    /**
     * @return string
     */
    public function getAnalyticsTrackingId(): string
    {
        return $this->analytics_tracking_id;
    }

    /**
     * @return string
     */
    public function getAnalyticsViewId(): string
    {
        return $this->analytics_view_id;
    }
}
