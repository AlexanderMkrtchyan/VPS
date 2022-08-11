<?php
/**
 * Template Name: Payment
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */
get_header();
?>

<div id="family_name"></div>
<div id="given_name"></div>
<div id="email_address"></div>

<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/dating/vendor/autoload.php');

use Square\SquareClient;
use Square\LocationsApi;
use Square\Exceptions\ApiException;
use Square\Http\ApiResponse;
use Square\Models\ListLocationsResponse;
use Square\Environment;


$client = new SquareClient([
    'accessToken' => 'EAAAEDuizAb5TSHuhO-7btMV86ZAGLk11MgJ7fGNUth5epWmuvLEgtFnxBYRckFI',
    'environment' => Environment::SANDBOX,
]);

try {
    $locationsApi = $client->getLocationsApi();
    $apiResponse = $locationsApi->listLocations();

    if ($apiResponse->isSuccess()) {
        $listLocationsResponse = $apiResponse->getResult();
        $locationsList = $listLocationsResponse->getLocations();
        foreach ($locationsList as $location) {
        print_r($location);
        }
    } else {
        print_r($apiResponse->getErrors());
    }
} catch (ApiException $e) {
    print_r("Recieved error while calling Square: " . $e->getMessage());
} 
printf(uniqid(), true);
get_footer();