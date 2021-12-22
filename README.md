"Bespoke" custom OOP API Framework with JWT
Tom McCaffrey, tommc@realhelp.net
May 28, 2021

This is an example of a minimal custom API framework I created over a weekend.  It pulls data from a database which is currently deployed on my server (to get access details, contact me directly).

The endpoints are as follows:

GET /events/list/{bandname} – Retrieves the current list of events for a band in the database, or error if the band doesn’t exist.

GET /merch/list/{bandname} – Retrieves the current list of merch links for a band in the database, or error if the band doesn’t exist.

GET /settings/list/{bandname} – Retrieves the current list of social media links and other settings for a band in the database, or error if the band doesn’t exist.

GET /beers/list/{bandname} – The list of beers offered is unique to a specific band; this endpoint retrieves the specific beers for that band.

POST /donations/create/{bandname} – This API allows a donation to be posted to the database.  It requires a JSON payload as follows and returns success or failure:
{
	"AppID": "BandName",  // The name of the band the donation is for
	"emailaddr": "EmailAddr",  // The email address of the donor
	"donation": "integer"  // The integer dollar amount of the donation
}

POST /jwtusers/login – This requires a posted URL encoded form with two parameters – “email” and “password”.  It returns a JWT token to be used for authorization requests.

POST /jwtusers/ authorization – This requires a valid JWT token to be sent in as the Bearer of the Authorization header field.  It returns success if OK, or a JWT error if the token is malformed or expired.  This endpoint would serve as the basis for other endpoints that require authorization and processing, such as posting private data to the database, etc.
