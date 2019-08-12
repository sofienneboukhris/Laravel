<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as HttpController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use DB;
/**
 * @OA\Info(
 *   version="1.0.2",
 *   title="Documentation des services Web",
 *   description="Documentation pour le projet de développement de services Web. 
 *   Tutoriels sur Atomrace.com",
 *   @OA\License(
 *     name="Apache 2.0",
 *     url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *   )
 * )
 * 
 * @OA\Server(
 *   url=L5_SWAGGER_CONST_HOST,
 *   description="Serveur"
 * )
 * 
 * @OA\SecurityScheme(
 *   type="oauth2",
 *   securityScheme="Oauth2Password",
 *   name="Password Based",
 *   scheme="bearer",
 *   description="Utilisez client_id / client_secret et 
 *                votre courriel / mot de passe pour 
 *                obtenir un jeton d'authentification.",
 *   in="header",
 *   @OA\Flow(
 *     flow="password",
 *     authorizationUrl="/oauth/authorize",
 *     tokenUrl="/oauth/token",
 *     refreshUrl="/oauth/token/refresh",
 *     scopes={}
 *   )
 * ),
 * @OA\PathItem(path="/")
 */

class ApiController extends HttpController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        public function __construct ()
        {
            auth()->shouldUse('api');
        }

/* @OAS\GET(
     *     path="/events/byDate"
     *     summary="Get a list of events on the specified date"
     *     operationId="listEventsByDate"
     *      @OAS\Parameter(
     *          name="date",
     *          required="true",
     *          in="query"
     *          description="The date to filter the events by."
     *      )
     * )
     *
     * @return \Illuminate\Http\Response
     */
function test(){
	return true;
}

}
