<?php

namespace AnalyticsCard\Classes;


use Exception;
use Google_Client;
use Google_Service_Analytics;
use Google_Auth_AssertionCredentials;


/**
 * Class APIHandler
 * Prepares API client for work
 *
 * @package AnalyticsCard\Classes
 */
class APIHandler {

    private $key_file_p12;
    private $service_account_email;
    private $appName = "AnalyticsCardRender";

    private $client;
    private $analytics;

    function __construct($key_file_path, $email)
    {
        $this->key_file_p12 = $key_file_path;
        $this->service_account_email = $email;
    }

    /**
     * Get analytics service to work with API
     * Prepare it
     *
     * @return Google_Service_Analytics
     */
    public function getService()
    {
        // Creates and returns the Analytics service object.

        // Use the developers console and replace the values with your
        // service account email, and relative location of your key file.

        // Create and configure a new client object.
        $this->client = new Google_Client();
        $this->client->setApplicationName($this->appName);

        $this->analytics = new Google_Service_Analytics($this->client);

        // Read the generated client_secrets.p12 key.
        $key = file_get_contents($this->key_file_p12);
        $cred = new Google_Auth_AssertionCredentials(
            $this->service_account_email,
            [Google_Service_Analytics::ANALYTICS_READONLY],
            $key
        );
        $this->client->setAssertionCredentials($cred);
        if ($this->client->getAuth()->isAccessTokenExpired()) {
            $this->client->getAuth()->refreshTokenWithAssertion($cred);
        }

        return $this->analytics;
    }

    /**
     * Get first available View
     *
     * @return mixed
     * @throws Exception
     */
    function getFirstprofileId($public_id="")
    {
        // Get the user's first view (profile) ID.

        // Get the list of accounts for the authorized user.
        $accounts = $this->analytics->management_accounts->listManagementAccounts();

        if (count($accounts->getItems()) > 0) {
            $items = $accounts->getItems();

            foreach($items as $account) {
                $firstAccountId = $account->getId();

                // Get the list of properties for the authorized user.
                $properties = $this->analytics->management_webproperties
                    ->listManagementWebproperties($firstAccountId);

                if (count($properties->getItems()) > 0) {
                    $items = $properties->getItems();

                    foreach($items as $property) {

                        $firstPropertyId = $property->getId();
                        if($firstPropertyId == $public_id) {

                            // Get the list of views (profiles) for the authorized user.
                            $profiles = $this->analytics->management_profiles
                                ->listManagementProfiles($firstAccountId, $firstPropertyId);

                            if (count($profiles->getItems()) > 0) {
                                $items = $profiles->getItems();

                                // Return the first view (profile) ID.
                                return $items[0]->getId();

                            } else {
                                throw new Exception('No views (profiles) found for this user.');
                            }
                        };
                    }

                } else {
                    throw new Exception('No properties found for this user.');
                }
            }

            // if not good property found
            throw new Exception('No accounts found with TRACKING ID: '.$public_id);

        } else {
            throw new Exception('No accounts found for this user.');
        }
    }

}